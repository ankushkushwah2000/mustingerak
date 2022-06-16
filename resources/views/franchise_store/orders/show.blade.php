@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title capitalize">franchise orders / {{ $order->order_number }}</h4>
                </div>
            </div>
            <div class="Xcard">
                <div class="Xcard-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="">
                                        <div class="d-flex gap-2">
                                            @if ($order->invoice)
                                            <form action="{{ route('franchises_invoice.show', $order) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-info">Show Invoice</button>
                                            </form>
                                            @endif

                                            @if (!$order->invoice)
                                            <form action="{{ route('franchises_invoice.genrate', $order) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-primary">Genrate Invoice</button>
                                            </form>
                                            @endif

                                            @if ($order->invoice)
                                            <form action="{{ route('franchises_invoice.delete', $order) }}"
                                                method="POST">
                                                @csrf
                                                @method("delete")
                                                <button class="btn btn-danger">Delete Invoice</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm mb-2 col-md-4">
                                            <p><strong>Billing Address :</strong></p>
                                            <p class="Xmb-0">first_name : {{ $order->b_first_name }}</p>
                                            <p class="Xmb-0">last_name : {{ $order->b_last_name }}</p>
                                            <p class="Xmb-0">email : {{ $order->b_email }}</p>
                                            <p class="Xmb-0">phone : {{ $order->b_phone }}</p>
                                            <p class="Xmb-0">country : {{ $order->b_country->name }}</p>
                                            <p class="Xmb-0">state : {{ $order->b_state->name }}</p>
                                            <p class="Xmb-0">city : {{ $order->b_city }}</p>
                                            <p class="Xmb-0">address : {{ $order->b_address_line }}</p>
                                            @if ($order->b_address_line_2)
                                            <p class="Xmb-0">address_2 : {{ $order->b_address_line_2 }}</p>
                                            @endif
                                            <p class="Xmb-0">postcode : {{ $order->b_postcode }}</p>
                                        </div>
                                        <div class="col-sm mb-2 col-md-4 ">
                                            <p><strong>Seller Address :</strong></p>
                                            <p class="Xmb-0">name : {{ $order->franchise->name }}</p>
                                            <p class="Xmb-0">email : {{ $order->franchise->email }}</p>
                                            <p class="Xmb-0">phone : {{ $order->franchise->phone }}</p>
                                            <p class="Xmb-0">country : {{ $order->franchise->country->name }}</p>
                                            <p class="Xmb-0">state : {{ $order->franchise->state->name }}</p>
                                            <p class="Xmb-0">city : {{ $order->franchise->city }}</p>
                                            <p class="Xmb-0">address : {{ $order->franchise->address }}</p>
                                            <p class="Xmb-0">postcode : {{ $order->franchise->postcode }}</p>
                                        </div>
                                        <div class="col-sm mb-2 col-md-4">
                                            <p><strong>Purchase details :</strong></p>
                                            <p class="Xmb-0">payment_method : {{ $order->payment_method }}</p>
                                            <p class="Xmb-0">payment_status : {{ $order->payment_status }}</p>
                                            <p class="Xmb-0">total_amount : ₹ {{ $order->total_amount }}</p>
                                            <p class="Xmb-0">order complete : {{ $order->complete ? "true" : "false" }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">

                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-2">Order items</h4>
                                    <div class="table mb-2">
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
                                                @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>
                                                        <img src="{{ asset('/storage/'.$product->image) }}"
                                                            class="me-75" height="20" width="20" alt="image" />
                                                        <span class="fw-bold">{{ $product->title }}</span>
                                                    </td>
                                                    <td>₹{{ $product->selling_price }}</td>
                                                    <td>{{ $product->pivot->quantity }}</td>
                                                    <td>₹{{ number_format($product->selling_price *
                                                        $product->pivot->quantity,2) }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection