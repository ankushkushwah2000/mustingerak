<?php

namespace App\Http\Controllers\FranchiseStore;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Franchise;
use App\Models\FranchiseCart;
use App\Models\FranchiseOrder;
use App\Models\FranchiseOrderProduct;
use App\Models\FranchiseProduct;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class StoreController extends Controller
{
    public function index()
    {

        $franchise = auth()->user()->franchise();
        if (!$franchise) {
            session()->flash('danger', 'Please Setup Franchise');
            return back();
        }
        $data['products'] = $franchise->products;
        $data['cart_details'] = cart_details();
        return view('franchise_store.index', $data);
    }

    /* products */
    public function product(Product $product)
    {
        $data['product'] = $product;
        $data['cart_details'] = cart_details();
        return view('franchise_store.product', $data);
    }

    /* Cart */
    public function cart()
    {
        $franchise = auth()->user()->franchise();
        $data['cart_items'] = FranchiseCart::where('franchise_id', $franchise->id)->where('franchise_buyer_id', auth()->id())->get();
        $data['cart_details'] = cart_details();
        return view('franchise_store.cart', $data);
    }


    function addToCart(Request $request, Product $product)
    {
        $franchise = auth()->user()->franchise();
        $franchise_product = FranchiseProduct::select('id', 'quantity')->where('franchise_id', $franchise->id)->where('product_id', $product->id)->first();
        /* Check if item is in stock and required qty is available */
        // $in_stock = $product->in_stock;
        $in_qty = $request->quantity <= $franchise_product->quantity;
        if (!$in_qty) /* if either of false */ {
            // if (!$in_stock) {
            //     session()->flash("error", $product->title . " is out of stock");
            // }
            if (!$in_qty) {
                session()->flash("danger", $product->title . " Required quantity is out of stock");
            }
            return back();
        }
        /* /Check if item is in stock and required qty is available */

        $cart_item = FranchiseCart::firstOrCreate([
            "franchise_id" => $franchise->id,
            "product_id" => $product->id,
            "franchise_buyer_id" => auth()->id(),
            "customer_id" => auth()->id(),
        ], [
            "quantity" => $request->quantity ?? 1,
        ]);

        if ($cart_item->wasRecentlyCreated) {
            session()->flash("success", "item added to cart");
        } else {
            session()->flash("info", "item already in cart");
        }

        return back();
    }

    function removeFromCart(FranchiseCart $franchiseCart)
    {
        // dd($product);
        $franchiseCart->delete();
        session()->flash("success", "item removed from cart");
        return back();
    }

    /* Order */
    public function orderCreate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $customer = User::where('email', $request->email)->first();
        if (!$customer) {
            session()->flash("danger", "Customer not registered");
            return back();
        }
        $data['cart_details'] = cart_details();
        $data['customer'] = $customer;
        $data["countries"] = Country::all();
        $data["states"] = State::all();
        return view('franchise_store.orders.create', $data);
    }

    public function orderStore(Request $request)
    {
        /* Show 500 if cart is empty */
        abort_if(cart_details()->isEmpty, 500, "Cart is empty");

        // dd($request->all());

        $request->validate([
            "billing_first_name" => ["required"],
            "billing_last_name" => ["required"],
            "billing_company_name" => ["required"],
            "billing_address_line" => ["required"],
            "billing_country" => ["required"],
            "billing_state" => ["required"],
            "billing_city" => ["required"],
            "billing_postcode" => ["required"],
            "billing_phone" => ["required"],
            "billing_email" => ["required"],
        ]);

        $customer = User::where('email', $request->billing_email)->first();
        $payment_method = $request->payment_option;

        if (!$customer) {
            session()->flash("danger", "Customer not registered");
            return back();
        }

        $cart_details = cart_details();
        $franchise = auth()->user()->franchise();

        foreach ($cart_details->items as $item) {
            /* Each Product */
            $product = $item->product;

            $franchise_product = FranchiseProduct::select('id', 'quantity')->where('franchise_id', $franchise->id)->where('product_id', $product->id)->first();
            /* Check if item is in stock and required qty is available */
            $in_qty = $request->quantity <= $franchise_product->quantity;
            if (!$in_qty) /* if either of false */ {
                if (!$in_qty) {
                    session()->flash("danger", $product->title . " Required quantity is out of stock");
                }
                return back();
            }
            /* /Check if item is in stock and required qty is available */
        }

        $total_amount = ($cart_details->subtotal - $cart_details->total_discount);

        DB::transaction(function () use ($customer, $request, $total_amount, $cart_details) {
            /* Create new order */
            $franchise_order = FranchiseOrder::create([
                "franchise_id" => auth()->user()->franchise()->id,
                "customer_id" => $customer->id,
                "order_number" => strtoupper("FODR-" . Str::random(7)),
                "b_first_name" => $request->billing_first_name,
                "b_last_name" => $request->billing_last_name,
                "b_company_name" => $request->billing_company_name,
                "b_address_line" => $request->billing_address_line,
                "b_address_line_2" => $request->billing_address_line_2,
                "b_country_id" => $request->billing_country,

                "b_state_id" => $request->billing_state,
                "b_city" => $request->billing_city,
                "b_postcode" => $request->billing_postcode,
                "b_phone" => $request->billing_phone,
                "b_email" => $request->billing_email,

                "payment_method" => "NA",
                "payment_status" => "unpaid",
                "total_amount" => $total_amount,
            ]);

            if ($franchise_order) {
                session()->put("franchise_order_number", $franchise_order->order_number);
            };

            /* Create order for each order item */
            foreach ($cart_details->items as $item) {
                /* Each Product */
                $product = $item->product;

                /* store ordered products */
                FranchiseOrderProduct::create([
                    "franchise_order_id" => $franchise_order->id,
                    "product_id" => $product->id,
                    "quantity" => $item->quantity,
                    "discount" => $item->discount,
                ]);
            }
        });

        // make cart clean
        cart_clear();

        /* Forget coupon_code */
        // Session::forget("coupon_code");
        $order = FranchiseOrder::select("id", "order_number", "b_first_name", "b_last_name", "b_email")->where("order_number", session()->get("franchise_order_number"))->first();
        $place_order_success = 1;

        switch ($payment_method) {

            case 'cash':
                // OrderServices::createSellerWalletTransaction($order);
                $order->payment_method = "cash";
                $order->payment_status = "paid";
                /* set order complete to true */
                $order->complete = 1;

                /* Decrease product qty */
                foreach ($order->products as $product) {

                    $in_stock = $product->in_stock;
                    $franchise_product = FranchiseProduct::select('id', 'quantity')->where('franchise_id', $franchise->id)->where('product_id', $product->id)->first();
                    $in_qty = $product->pivot->quantity <= $franchise_product->quantity;

                    if (!$in_qty) {
                        if (!$in_qty) {
                            $place_order_success = 0;
                            session()->flash("error", $product->title . " Required quantity is out of stock");
                        }
                        return back();
                    }

                    if (!$in_qty) {
                        $place_order_success = 0;
                        // $franchise_product->in_stock = 0;
                    } else {
                        $franchise_product->quantity = ($franchise_product->quantity - $product->pivot->quantity);
                    }

                    $franchise_product->save();
                }
                /* /Decrese product qty */

                if ($place_order_success) /* Save order only when placing order is success */ {
                    $order->save();
                }

                session()->flash("success", "Order Placed Successfully");

                $data['cart_details'] = cart_details();
                return view('franchise_store.order_complete', $data);
                break;

            case 'razorpay':

                // dd($order);
                $razorpay = \App\Models\RazorpayConfig::first();
                $api = new Api($razorpay->key, $razorpay->secret);
                $razorpay_total_amount = ($cart_details->subtotal - $cart_details->total_discount) * 100;
                $res = $api->order->create(array('receipt' => strtoupper("rcptid-" . Str::random(7)), 'amount' => $razorpay_total_amount, 'currency' => 'INR', 'notes' => array('key1' => 'value3', 'key2' => 'value2')));

                return view("franchise_store.razorpay", [
                    "customer_name" => $order->b_first_name . " " . $order->b_last_name,
                    "customer_email" => $order->b_email,
                    "razorpay_total_amount" => $razorpay_total_amount,
                    "razorpay_order_id" => $res->id,
                    "razorpay" => $razorpay
                ]);

                // return "razorpay not available yet";
                break;

            default:
                dd("Woops!!, Somthing Went Wrong");
                break;
        }
    }
}
