@extends('layouts.app')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@php
$frontend = frontendSetting();
@endphp

@section('page-content')
<div class="content-wrapper">
    <div class="content-body">
        <section class="invoice-preview-wrapper">
            <div class="row invoice-preview">
                <div class="col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body invoice-padding pb-0">
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                <div>
                                    <div class="logo-wrapper">
                                        <img src="{{ imgSrc($frontend->favicon) }}" alt="logo" width="50">
                                        <h3 class="text-primary invoice-logo">
                                            {{ $frontend->title }}
                                        </h3>
                                    </div>
                                    <p class="card-text mb-25">

                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $frontend->address_line }},
                                        {{ $frontend->postcode }}
                                    </p>
                                    <p class="card-text mb-0">
                                        {{ $frontend->phone }}, {{ $frontend->alt_phone }}
                                    </p>
                                    <p class="card-text mb-0">
                                        {{ $frontend->email }}
                                    </p>
                                    <p class="card-text mb-0">
                                        GST : {{ $frontend->gst_number }}
                                    </p>
                                </div>
                                <div class="mt-md-0 mt-2">
                                    <h4 class="invoice-title">
                                        Invoice
                                        <span class="invoice-number">#{{ $invoice->invoice_number}}</span>
                                    </h4>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title">
                                            Date Issued:
                                        </p>
                                        <p class="invoice-date">
                                            {{ $invoice->created_at }}
                                        </p>
                                    </div>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title">
                                            Due Date:
                                        </p>
                                        <p class="invoice-date">
                                            {{ $invoice->due ?? "NA" }}
                                        </p>
                                    </div>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title">
                                            Order:
                                        </p>
                                        <p class="invoice-date">
                                            {{ $order->order_number }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="invoice-spacing">
                        <div class="card-body invoice-padding pt-0">


                            <div class="row invoice-spacing">
                                <div class="p-0 col-xl-4 col-12">
                                    <h6 class="mb-2">
                                        Sold By:
                                    </h6>
                                    <h6 class="mb-25">
                                        {{ $seller->name }}
                                    </h6>
                                    <p class="card-text mb-25">
                                        {{ $seller->profile->address ?? "" }},
                                        {{ $seller->profile->country->name ?? "" }},
                                        {{ $seller->profile->state->name ?? "" }},
                                        {{ $seller->profile->postcode ?? "" }}.
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $seller->phone }}
                                    </p>
                                    <p class="card-text mb-0">
                                        {{ $seller->email }}
                                    </p>
                                    <p class="card-text mb-25">
                                        GST : {{ $seller->profile->gst_number }}
                                    </p>
                                </div>

                                <div class="p-0 col-xl-4 col-12 ">
                                    <h6 class="mb-2">
                                        Billing Address:
                                    </h6>
                                    <h6 class="mb-25">
                                        {{ $order->b_first_name. " ".$order->b_last_name }}
                                    </h6>
                                    <p class="card-text mb-25">
                                        {{ $order->b_address_line }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->b_address_line_2 }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->b_country->name }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->b_state->name }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->b_phone }}
                                    </p>
                                    <p class="card-text mb-0">
                                        {{ $order->b_email }}
                                    </p>
                                </div>

                                <div class="p-0 col-xl-4 col-12">
                                    <h6 class="mb-2">
                                        Shipping Address:
                                    </h6>
                                    <h6 class="mb-25">
                                        {{ $order->s_first_name. " ".$order->s_last_name }}
                                    </h6>
                                    <p class="card-text mb-25">
                                        {{ $order->s_address_line }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->s_address_line_2 }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->s_country->name }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->s_state->name }}
                                    </p>
                                    <p class="card-text mb-25">
                                        {{ $order->s_phone }}
                                    </p>
                                    <p class="card-text mb-0">
                                        {{ $order->s_email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table role="table" aria-busy="false" aria-colcount="4" class="table b-table"
                                id="__BVID__1399">


                                <thead role="rowgroup" class="">

                                    <tr role="row" class="">
                                        <th role="columnheader" scope="col" aria-colindex="1" class="">
                                            <div>Item</div>
                                        </th>
                                        <th role="columnheader" scope="col" aria-colindex="2" class="">
                                            <div>Price</div>
                                        </th>
                                        <th role="columnheader" scope="col" aria-colindex="3" class="">
                                            <div>Qty</div>
                                        </th>
                                        <th role="columnheader" scope="col" aria-colindex="4" class="">
                                            <div>Total</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody role="rowgroup">

                                    <tr role="row" class="">
                                        <td aria-colindex="1" role="cell" class="">
                                            <p class="card-text font-weight-bold mb-25">
                                                {{ $product->title }}
                                            </p>
                                            {{-- text-nowrap --}}
                                            <p class="card-text">
                                                {{ $product->summary }}
                                            </p>
                                        </td>
                                        <td aria-colindex="2" role="cell" class="">₹{{ $product->selling_price }}</td>
                                        <td aria-colindex="3" role="cell" class="">{{ $product->pivot->quantity }}</td>
                                        <td aria-colindex="4" role="cell" class="">₹{{ $invoice->total_amount }}</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                        <hr class="invoice-spacing">
                        <div class="card-body invoice-padding pb-0">
                            <div class="row">
                                <div class="mt-md-0 mt-3 col-md-6 order-md-1 col-12 order-2">
                                    <p class="card-text mb-0"><span class="font-weight-bold"></p>
                                </div>
                                <div class="mt-md-6 d-flex justify-content-end col-md-6 order-md-2 col-12 order-1">
                                    <div class="invoice-total-wrapper">
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">
                                                Subtotal:
                                            </p>
                                            <p class="invoice-total-amount">
                                                ₹{{ $invoice->total_amount }}
                                            </p>
                                        </div>
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">
                                                Discount:
                                            </p>
                                            <p class="invoice-total-amount">
                                                ₹{{ $invoice->discount }}
                                            </p>
                                        </div>
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">
                                                Shipping:
                                            </p>

                                            <p class="invoice-total-amount">
                                                {{ $invoice->shipping_charges ? '₹'.$invoice->shipping_charges : 'free'
                                                }}
                                            </p>
                                        </div>
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">
                                                Tax:
                                            </p>
                                            <p class="invoice-total-amount">
                                                {{ $product->gst }}%
                                            </p>
                                        </div>
                                        <hr class="my-50">
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">
                                                Total:
                                            </p>
                                            <p class="invoice-total-amount">
                                                ₹{{ $invoice->total_amount - $invoice->discount +
                                                $invoice->shipping_charges}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="invoice-spacing">
                        <div class="card-body invoice-padding pt-0">
                            <span class="font-weight-bold">Note: </span> <span>Thank You!</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection