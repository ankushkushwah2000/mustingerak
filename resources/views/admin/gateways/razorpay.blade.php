@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">RazorPay Config.</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.gateway.razorpay.update', $gateway) }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="key">key</label>
                                    <input type="text" id="key" class="form-control" name="key"
                                        value="{{ $gateway->key }}">
                                    @error('key')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="secret">secret</label>
                                    <input type="text" id="secret" class="form-control" name="secret"
                                        value="{{ $gateway->secret }}">
                                    @error('secret')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-126 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="checked" name="status" @if ($gateway->status)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="inlineCheckbox1">Status</label>
                                    </div>
                                    @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
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