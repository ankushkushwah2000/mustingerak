@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Package : {{ $package->package_number }}</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('hub_manager.packages.update', $package) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="delivery_agent">Delivery_agent</label>
                                    <select name="delivery_agent" id="" class="form-control">
                                        @foreach ($delivery_agents as $delivery_agent)
                                        <option value="{{ $delivery_agent->id }}" @if ($delivery_agent->id ==
                                            $package->delivery_agent_id)
                                            selected
                                            @endif
                                            >Name : {{ $delivery_agent->name }} |
                                            Postcode: {{
                                            $delivery_agent->profile->postcode }} | Phone: {{
                                            $delivery_agent->phone }}</option>
                                        @endforeach
                                    </select>
                                    @error('delivery_agent')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="payment_status">payment_status</label>
                                    <input type="text" value="{{ $package->payment_status }}" name="payment_status"
                                        class="form-control">
                                    @error('payment_status')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pickup_address">pickup_address</label>
                                    <textarea rows="6" type="text" class="form-control"
                                        name="pickup_address">{{ $package->pickup_address }}</textarea>
                                    @error('pickup_address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="shipping_address">shipping_address</label>
                                    <textarea rows="6" type="text" class="form-control"
                                        name="shipping_address">{{ $package->shipping_address }}</textarea>
                                    @error('shipping_address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_fragile" value="checked"
                                            name="is_fragile" @if ($package->is_fragile)
                                        checked
                                        @endif >
                                        <label class="form-check-label" for="is_fragile">is_fragile</label>
                                    </div>
                                </div>
                            </div>
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