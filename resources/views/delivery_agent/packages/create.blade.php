@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Package</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('hub_manager.packages.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="order">order</label>
                                    <select name="order" id="" class="form-control">
                                        @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->order_number }} | Postcode: {{
                                            $order->s_postcode }}</option>
                                        @endforeach
                                    </select>
                                    @error('order')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="delivery_agent">delivery_agent</label>
                                    <select name="delivery_agent" id="" class="form-control">
                                        @foreach ($delivery_agents as $delivery_agent)
                                        <option value="{{ $delivery_agent->id }}">Name : {{ $delivery_agent->name }} |
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

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_fragile" value="checked"
                                            name="is_fragile">
                                        <label class="form-check-label" for="is_fragile">is_fragile</label>
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