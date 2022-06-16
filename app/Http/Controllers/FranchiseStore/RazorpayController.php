<?php

namespace App\Http\Controllers\FranchiseStore;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderServices;
use App\Models\FranchiseOrder;
use App\Models\FranchiseProduct;
use App\Models\Order;
use App\Models\RazorpayConfig;
use App\Models\RazorpayPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index(Request $request)
    {
        $razorpay = RazorpayConfig::first();
        if (!$razorpay->status) {
            abort(500);
        }
        return view("razorpay");
    }

    public function payment(Request $request)
    {

        $razorpay = RazorpayConfig::first();
        if (!$razorpay->status) {
            abort(500);
        }
        // dd($request->all());

        $input = $request->all();

        $api = new Api($razorpay->key, $razorpay->secret);

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        $order = FranchiseOrder::select("id", "order_number")->where("order_number", session()->get("franchise_order_number"))->first();
        $place_order_success = 1;

        if (count($input)  && !empty($input['razorpay_payment_id'])) {

            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount'], 'currency' => 'INR'));

                $payment_details = json_encode($response->toArray());

                /* Store Razorpay res. */
                RazorpayPayment::create([
                    "bulk_order_number" => session()->get("franchise_order_number"),
                    "details" => $payment_details
                ]);


                // OrderServices::createSellerWalletTransaction($order);

                /* Change order payment_method and payment_status */
                $order->payment_method = "razorpay";
                $order->payment_status = "paid";
                /* set order complete to true */
                $order->complete = 1;

                $franchise = auth()->user()->franchise();

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

                /* Forget order_id */
                Session::forget("order_id");

                session()->flash("success", "Order Placed Successfully");

                $data['cart_details'] = cart_details();
                return view('franchise_store.order_complete', $data);
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::flash('error', $e->getMessage());

                return redirect()->route("/");
            }
        }

        Session::flash("danger", "Something Went Wrong");

        return redirect()->route("/");
    }
}
