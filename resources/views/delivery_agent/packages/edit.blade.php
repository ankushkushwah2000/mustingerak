@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Package : {{ $package->package_number }}</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('delivery_agent.packages.update', $package) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        @php
                        $hub = $package->order->hub[0] ?? [];
                        @endphp
                        <div class="row">
                            <div class="col-sm mb-2 col-md-6">
                                <div>
                                    <strong>HUB :</strong>
                                    <span>{{ $hub->hub_number }}-{{
                                        $hub->state->name
                                        }}-{{
                                        $hub->city }}-{{ $hub->postcode }}</span>
                                    <span>, {{ $hub->manager->phone }}</span>
                                </div>

                            </div>
                            <div class="col-sm mb-2 col-md-6">
                                <div>
                                    <strong>Delevery Agent :</strong>
                                    <span>{{ $package->delivery_agent->name }},</span>
                                    <span>{{ $package->delivery_agent->phone }},</span>
                                    <span>{{ $package->delivery_agent->profile->alt_phone }},</span>
                                </div>

                            </div>
                            <div class="col-sm mb-2 col-md-6">
                                <strong>Pickup Address : </strong>
                                <div>{{ $package->pickup_address }}</div>
                            </div>
                            <div class="col-sm mb-2 col-md-6">
                                <strong>Shipping Address : </strong>
                                <div>{{ $package->shipping_address }}</div>
                            </div>
                            <div class="col-sm mb-2 col-md-6">
                                <p><strong>Order Note : </strong>{{ $order->note ?? "none" }}</p>
                            </div>

                            <div class="col-sm mb-2 col-md-6">
                                <p><strong>Payment Status : </strong>{{ $package->payment_status }}</p>
                            </div>
                            <div class="col-sm mb-2 col-md-6">
                                <p><strong>Fragile : </strong>{{ $package->is_fragile ? "Yes" : "No" }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label" for="is_picked_up"><strong>Delivery OTP</strong></label>
                                <input type="text" name="otp" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_picked_up"
                                            value="checked" name="is_picked_up" @if ($package->is_picked_up)
                                        checked
                                        @endif >
                                        <label class="form-check-label" for="is_picked_up">is_picked_up</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_delivered"
                                            value="checked" name="is_delivered" @if ($package->is_delivered)
                                        checked
                                        @endif >
                                        <label class="form-check-label" for="is_delivered">is_delivered</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection