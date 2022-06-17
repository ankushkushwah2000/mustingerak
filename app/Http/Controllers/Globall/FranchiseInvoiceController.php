<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\FranchiseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FranchiseInvoiceController extends Controller
{
    function genrate(FranchiseOrder $order)
    {
        dd($order);
        $invoice = Invoice::firstOrNew([
            "order_id" => $order->id
        ]);

        if (!$invoice->exists) {
            $invoice->invoice_number = strtoupper("INV-" . Str::random(7));
            $invoice->order_id = $order->id;
            // $invoice->due = Carbon::now()->addDays(7);
            // $invoice->payment_date = Carbon::now()->addDays(7);
            $invoice->status = $order->payment_status;
            $invoice->total_amount = $order->total_amount;
            $invoice->tax = 0;
            $invoice->discount = $order->products[0]->pivot->discount ?? 0;
            $invoice->shipping_charges = 0;
            $invoice->save();
        }

        session()->flash('success', 'Invoice Genrated Successfully');
        return back();
    }

    public function show(FranchiseOrder $order)
    {
        dd($order);
        $invoice = Invoice::where("order_id", $order->id)->first();
        $product = $order->products[0];
        $seller = $product->seller;

        return view("global.invoices.show", [
            "invoice" => $invoice,
            "order" => $order,
            "product" => $product,
            "seller" => $seller
        ]);
    }

    public function delete(FranchiseOrder $order)
    {
        dd($order);
        $order->invoice->delete();
        session()->flash('success', 'Invoice Deleted Successfully');
        return back();
    }
}
