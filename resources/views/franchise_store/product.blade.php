@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Store / Product</h4>
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
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ imgSrc($product->image) }}" alt="" class=""
                                style="max-width: 100%; max-height:400px">
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                    <h3 class="">{{ $product->title }}</h3>
                                    <p class="text-muted">{{ $product->summary }}</p>
                                    <div class="capitalize mb-1">
                                        <strong>key_features :</strong> {!! $product->key_features !!}
                                    </div>
                                    <div class="capitalize mb-1">
                                        <strong>warranty :</strong> {{ $product->warranty }} months
                                    </div>
                                    <div class="capitalize mb-1">
                                        <strong>model :</strong> {{ $product->model }}
                                    </div>
                                    <div class="capitalize mb-1">
                                        <strong>sku :</strong> {{ $product->sku }}
                                    </div>
                                    <div class="capitalize mb-1">
                                        <strong>manufacture :</strong> {{ $product->manufacture }}
                                    </div>
                                    <div class="capitalize mb-1">
                                        <strong>country :</strong> {{ $product->country }}
                                    </div>
                                    <div class="capitalize mb-1">
                                        <strong>legal_disclaimer :</strong> {{ $product->legal_disclaimer }}
                                    </div>

                                    <div class="capitalize mb-1">
                                        <strong>box_content :</strong> {{ $product->box_content }}
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3 class="text-success fw-bold">₹{{ $product->selling_price }} <small
                                                    class="text-danger"><del>₹{{
                                                        $product->price
                                                        }}</del></small></h3>
                                        </div>
                                        <div>
                                            <form action="{{ route('franchise_store.store.addtocart', $product) }}"
                                                method="post">
                                                @csrf
                                                <div class="d-flex gap-1">
                                                    <input type="number" name="quantity" placeholder="Qty"
                                                        class="form-control" style="width:9rem">
                                                    <button class="btn btn-primary">Add to cart</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>

        </div>
    </div>
</section>
@endsection