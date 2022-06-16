@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Store / Products</h4>
                    <div class="d-flex gap-1 align-items-center">
                        <a href="{{ route('franchise_store.store.cart') }}" class="fs-2"><i data-feather="shopping-cart"
                                style="width:22px; height:22px"></i>
                            {{ count($cart_details->items) }}</a>
                        <p>₹ {{ $cart_details->subtotal }}</p>
                    </div>
                </div>
            </div>

            <div class="row gap-3 p-2">
                @forelse ($products as $product)
                <div class="col-md-3 card">
                    <div class="card-body">
                        <div class="w-full">
                            <img src="{{ imgSrc($product->image) }}" alt="" class="" style="max-width: 100%">
                        </div>
                        <h4><a href="{{ route('franchise_store.store.product', $product) }}">{{ $product->title
                                }}</a></h4>
                        <p class="text-muted">{{ $product->summary }}</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-success fw-bold">₹{{ $product->selling_price }} <small
                                        class="text-danger"><del>₹{{
                                            $product->price
                                            }}</del></small></p>
                            </div>
                            <div>
                                <form action="{{ route('franchise_store.store.addtocart', $product) }}" method="post">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 card">
                    <div class="card-body">
                        No data found
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection