@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Print Package Details</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    @php
                    $hub = $order->hub[0] ?? [];
                    @endphp
                    <div class="row">
                        <div class="col-md-6 border border-4 mx-auto" id="section-to-print"
                            style=" border-style:  dashed !important;">
                            <div class="row p-2 border border-dark ">
                                <div class="col-12 text-center mb-2"><strong>{{ $package->package_number }}</strong>
                                </div>
                                <div class="col-12 text-center mb-2"><strong>{{ $package->payment_status }}</strong>
                                </div>
                                <div class="col-6 mb-2">
                                    <strong>Sold by :</strong>
                                    <p>{{ $package->pickup_address }}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Delivery Address :</strong>
                                    <p>{{ $package->shipping_address }}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Hub :</strong>
                                    <p>{{ $hub->hub_number }}-{{
                                        $hub->state->name
                                        }}-{{
                                        $hub->city }}-{{ $hub->postcode }}
                                        <span>, {{ $hub->manager->phone }}</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <strong>Delivery Agent :</strong>
                                    <p><span>{{ $package->delivery_agent->name }},</span>
                                        <span>{{ $package->delivery_agent->phone }},</span>
                                        <span>{{ $package->delivery_agent->profile->alt_phone }},</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <strong>Note :</strong>
                                    <p>{{ $order->note ?? "none" }}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Fragile :</strong>
                                    <p>{{ $package->is_fragile ? "Yes" : "No" }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mx-auto text-center mt-2">
                            <button onclick="window.print()" class="btn btn-primary">Print</button>
                            <button onclick="printFunction('section-to-print')"
                                class="btn btn-outline-primary">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection