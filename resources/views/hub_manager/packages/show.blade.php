@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Package No : {{ $package->package_number }}</h4>
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                        <div class="fs-4 fw-medium ">
                            <span class="border-{{$package->is_picked_up ? " success" : "danger" }} border rounded-pill
                                bg-{{$package->is_picked_up ? "success" : "danger"}} text-white fs-6 ms-1"
                                style="padding-block: 0.6rem;padding-inline: 1rem">
                                {{$package->is_picked_up ? "Picked up" : "Not Picked up"}}
                            </span>
                            <span class="border-{{$package->is_delivered ? " success" : "danger" }} border rounded-pill
                                bg-{{$package->is_delivered ? "success" : "danger"}} text-white fs-6 ms-1"
                                style="padding-block: 0.6rem;padding-inline: 1rem">
                                {{$package->is_delivered ? "Delivered" : "Not Delivered"}}
                            </span>
                        </div>
                    </div>
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
                    {{-- <div class="table mb-2">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>product</th>
                                    <th>price</th>
                                    <th>quantity</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/'.$product->image) }}" class="me-75" height="20"
                                            width="20" alt="image" />
                                        <span class="fw-bold">{{ $product->title }}</span>
                                    </td>
                                    <td>₹{{ $product->selling_price }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>₹{{ number_format($product->selling_price * $product->pivot->quantity,2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        no product found :(
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> --}}
                    {{-- <div class="d-flex justify-content-end mb-2">
                        <div class="fs-4 fw-medium">Total Amount: <span class="fw-bold">₹{{
                                number_format($order->total_amount, 2) }}</span></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection