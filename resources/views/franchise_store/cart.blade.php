@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Store / Cart</h4>
                    <div class="d-flex gap-1 align-items-center">
                        <a href="{{ route('franchise_store.store.cart') }}" class="fs-2"><i data-feather="shopping-cart"
                                style="width:22px; height:22px"></i>
                            {{ count($cart_details->items) }}</a>
                        <p>₹ {{ $cart_details->subtotal }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price (₹)</th>
                                <th>Qty</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart_items as $item)
                            <tr>
                                <td>{{ $item->product->title }}</td>
                                <td>₹ {{ $item->product->selling_price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <form action="{{ route('franchise_store.store.removefromcart', $item) }}"
                                        method="post">
                                        @csrf
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-danger btn-sm">Remove</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    No data found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Discount : </strong>₹ {{ $cart_details->total_discount }}</p>
                    <p><strong>Subtotal : </strong>₹ {{ $cart_details->subtotal }}</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('franchise_store.store.order.create') }}" method="get">
                        @csrf
                        <div class="d-flex gap-1">
                            <input type="text" name="email" placeholder="Customer email address" class="form-control"
                                value="Xcustomer@example.com">
                            <button class="btn btn-primary">Create Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection