@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title ">
                        <p>Franchise : {{ $franchise->name() }}</p>
                        <div class="fs-6">
                            <p>Franchise Manager : {{ $franchise->manager->name }}</p>
                            <p>Phone : {{ $franchise->manager->phone }}</p>
                            <p>Email : {{ $franchise->manager->email }}</p>
                        </div>
                    </h4>
                </div>
                <hr>
                <div class="card-body">
                    @forelse ($orders as $order)
                    <div class="mb-2 border rounded p-2">
                        <div class="mb-1">
                            <strong>Order No. :</strong> {{ $order->order_number }}
                        </div>
                        <div class="mb-1">
                            <strong>Postcode :</strong> {{ $order->s_postcode }}
                        </div>
                        <div class="mb-1">
                            <strong>State :</strong> {{ $order->s_state->name }}
                        </div>
                        <div class="mb-1">
                            <strong>Tacking Status :</strong> <span class="badge rounded-pill badge-light-info me-1">{{
                                $order->status->title }}</span>
                        </div>
                        <div class="mb-1">
                            <strong>Payment Status :</strong> {{ $order->payment_status }}
                        </div>
                        <div class="mb-1">
                            <strong>Total Products :</strong> {{ $order->products->count() }}
                        </div>
                        <div class="mb-1">
                            <strong>Total Amount :</strong> ₹{{ $order->total_amount }}
                        </div>
                    </div>
                    @empty
                    <div class="p-2 fs-4">
                        No data found
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection