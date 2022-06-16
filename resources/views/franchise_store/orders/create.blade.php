@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Store / Order / Create</h4>
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
                    <form action="{{ route('franchise_store.store.order.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first_name">first_name</label>
                                    <input type="text" id="first_name" class="form-control" name="billing_first_name"
                                        value="{{ old('billing_first_name') ?? $customer->name}}">
                                    @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="last_name">last_name</label>
                                    <input type="text" id="last_name" class="form-control" name="billing_last_name"
                                        value="{{ old('billing_last_name')}}">
                                    @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="company_name">company_name (if any)</label>
                                    <input type="text" id="company_name" class="form-control"
                                        name="billing_company_name" value="{{ old('billing_company_name') ?? 'self'}}">
                                    @error('company_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="email">email</label>
                                    <input type="text" id="email" class="form-control" name="billing_email"
                                        value="{{ old('billing_email') ?? $customer->email }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone">phone</label>
                                    <input type="text" id="phone" class="form-control" name="billing_phone"
                                        value="{{ old('billing_phone') ?? $customer->phone }}">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country">country</label>
                                    <select name="billing_country" id="" class="form-control">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="state">state</label>
                                    <select name="billing_state" id="" class="form-control">
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="city">city</label>
                                    <input type="text" id="city" class="form-control" name="billing_city"
                                        value="{{ old('billing_city') }}">
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="gst_number">gst_number (if any)</label>
                                    <input type="text" id="gst_number" class="form-control" name="billing_gst_number"
                                        value="{{ old('billing_gst_number') }}">
                                    @error('gst_number')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="postcode">postcode</label>
                                    <input type="text" id="postcode" class="form-control" name="billing_postcode"
                                        value="{{ old('billing_postcode') }}">
                                    @error('postcode')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address_line">address_line</label>
                                    <textarea id="address_line" class="form-control" name="billing_address_line"
                                        rows="5">{{ old('billing_address_line') }}</textarea>
                                    @error('address_line')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <br>
                                <div class="mb-1">
                                    <input class="form-check-input" type="radio" name="payment_option"
                                        id="exampleRadios6" value="cash">
                                    <label class="form-check-label" for="exampleRadios6">Cash</label>
                                </div>
                                <div class="mb-1">
                                    <input class="form-check-input" type="radio" name="payment_option"
                                        id="exampleRadios4" value="razorpay">
                                    <label class="form-check-label" for="exampleRadios4">Razorpay
                                        Card</label>
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