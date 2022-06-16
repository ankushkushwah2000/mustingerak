@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Store / Order / Complete</h4>
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
                    <h1>Order Complete successfully</h1>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection