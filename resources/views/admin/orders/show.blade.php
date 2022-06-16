@extends('layouts.app')
@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order No : {{ $order->order_number }}</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Invoice Actions</h4>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="d-flex gap-2">
                            @if ($order->invoice)
                            <form action="{{ route('invoice.show', $order) }}" method="POST">
                                @csrf
                                <button class="btn btn-info">Show Invoice</button>
                            </form>
                            @endif

                            @if (!$order->invoice)
                            <form action="{{ route('invoice.genrate', $order) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary">Genrate Invoice</button>
                            </form>
                            @endif

                            @if ($order->invoice)
                            <form action="{{ route('invoice.delete', $order) }}" method="POST">
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
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @php
                    $hub = $order->hub[0] ?? [];
                    @endphp
                    @if ($hub)
                    <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary mb-0">
                        <div class="alert-body"><span><strong>Assiged HUB : </strong> {{ $hub->hub_number }}-{{
                                $hub->state->name
                                }}-{{
                                $hub->city }}-{{ $hub->postcode }}</span>
                        </div>
                    </div>
                    @else
                    <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger mb-0">
                        <div class="alert-body"><span><strong>Assiged HUB : </strong> None</span>
                        </div>
                    </div>
                    @endif
                    @if ($order->package)
                    <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-info mt-2 mb-0">
                        <div class="alert-body"><span><strong>Package Assigned : </strong> {{
                                $order->package->package_number }}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm mb-2 col-md-6">
                            <strong>Billing Address :</strong>
                            <div>first_name : {{ $order->b_first_name }}</div>
                            <div>last_name : {{ $order->b_last_name }}</div>
                            <div>email : {{ $order->b_email }}</div>
                            <div>phone : {{ $order->b_phone }}</div>
                            <div>country : {{ $order->b_country->name }}</div>
                            <div>state : {{ $order->b_state->name }}</div>
                            <div>city : {{ $order->b_city }}</div>
                            <div>address_line : {{ $order->b_address_line }}</div>
                            <div>address_line_2 : {{ $order->b_address_line_2 }}</div>
                            <div>postcode : {{ $order->b_postcode }}</div>
                        </div>
                        <div class="col-sm mb-2 col-md-6">
                            <strong>Shipping Address : </strong>
                            <div>first_name : {{ $order->s_first_name }}</div>
                            <div>last_name : {{ $order->s_last_name }}</div>
                            <div>email : {{ $order->s_email }}</div>
                            <div>phone : {{ $order->s_phone }}</div>
                            <div>country : {{ $order->s_country->name }}</div>
                            <div>state : {{ $order->s_state->name }}</div>
                            <div>city : {{ $order->s_city }}</div>
                            <div>address_line : {{ $order->s_address_line }}</div>
                            <div>address_line_2 : {{ $order->s_address_line_2 }}</div>
                            <div>postcode : {{ $order->s_postcode }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm col-md-6">
                            <p><strong>Payment status : </strong>{{ $order->payment_status }}</p>
                        </div>
                        <div class="col-sm col-md-6">
                            <p><strong>Note : </strong>{{ $order->note ?? "none" }}</p>
                        </div>
                        <div class="col-sm col-md-6">
                            <p><strong>OTP : </strong>{{ $order->otp ?? "none" }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <p><strong>Current status : </strong>{{ $currentStatus->title }}</p>
                        <form action="{{ route('order.status.update', $order) }}" method="POST">
                            @csrf
                            @method("put")
                            <div class="mb-2">
                                <label class="form-label" for="status_id">Available status :</label>
                                <select name="status_id" id="status_id" class="form-control">
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" @if ($currentStatus->id == $status->id)
                                        selected
                                        @endif
                                        >{{ $status->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2"><button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <div style="max-height: 200px;overflow: auto;">
                        <p><strong>Tracking History (latest first)</strong></p>
                        @foreach ($orderStatuses as $status)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $status->title }}</span>
                            <span>{{
                                \Carbon\Carbon::parse($status->pivot->getRawOriginal("created_at"))->toDayDateTimeString()
                                }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header"><b>Pass order to hub</b></div>
                <div class="card-body">
                    <form action="{{ route('admin.hub_orders.store') }}" method="POST">
                        @csrf
                        {{-- order id --}}
                        <div class="mb-2">
                            <input type="number" value="{{ $order->id }}" name="order_id" hidden />
                        </div>
                        <div class="mb-2">
                            <select name="hub_id" id="" class="form-control">
                                @foreach ($hubs as $hub)
                                <option value="{{ $hub->id }}">{{ $hub->hub_number }}-{{ $hub->state->name
                                    }}-{{
                                    $hub->city }}-{{ $hub->postcode }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class=""><button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($razorpay_payment)
        @php
        $json = json_decode($razorpay_payment->details);
        @endphp
        @if ($json->id ?? false)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-2">Payment Details</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>id: {{ $json->id ?? "NA" }}</li>
                        <li>currency: {{ $json->currency ?? "NA" }}</li>
                        <li>amount: {{ $json->amount/100 ?? "NA" }}</li>
                        <li>international: {{ $json->international??false ? "true" : "false" }}</li>
                        <li>status: {{ $json->status ?? "NA" }}</li>
                        <li>order_id: {{ $json->order_id ?? "NA" }}</li>
                        <li>method: {{ $json->method ?? "NA" }}</li>
                    </ul>
                    {{-- {{ $razorpay_payment->details }} --}}
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        @endif
        @endif
    </div>
</section>
{{-- <section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h3>Pass order to hub</h3>
                        <form action="{{ route('admin.hub_orders.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm mb-2 col-md-6">
                                    <div class="mb-2"><input type="number" value="{{ $order->id }}" name="order_id"
                                            hidden /></div>

                                    <div class="mb-2">
                                        <select name="hub_id" id="" class="form-control">
                                            @foreach ($hubs as $hub)
                                            <option value="{{ $hub->id }}">{{ $hub->hub_number }}-{{ $hub->state->name
                                                }}-{{
                                                $hub->city }}-{{ $hub->postcode }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=""><button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection