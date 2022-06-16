@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Return Request</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.return_requests.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="request_number">request_number</label>
                                    <input readonly type="text" id="request_number" class="form-control"
                                        name="request_number" value="{{ strtoupper(" RR-" . Str::random(6)) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="status">status</label>
                                    <select name="status" id="status" class="form-control">
                                        @foreach (["pending","processing","declined","processed"] as $item)
                                        <option value="pending">{{ ucfirst($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="user">user</label>
                                    <select name="user" id="user" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->email }} | {{
                                            $user->phone
                                            }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="order">order</label>
                                    <select name="order" id="order" class="form-control">
                                        @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="message">message</label>
                                    <textarea rows="5" type="text" id="message" name="message"
                                        class="form-control">{{ old('message') }}</textarea>
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