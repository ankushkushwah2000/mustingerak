@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            @if ($hub)
            @if (!$hub->status)
            <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-3bcd05f2="">
                <div class="alert-body"><span><strong>Urgent ! </strong>Your hub is set to inactive. please contact
                        admin</span></div>
            </div>
            @else
            <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-success" data-v-3bcd05f2="">
                <div class="alert-body"><span><strong>Woha ! </strong>Your hub is active</span></div>
            </div>
            @endif
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hub Setting</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('hub_manager.hub.save') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="hub_number">HUB NO.</label>
                                    <input type="text" id="hub_number" class="form-control" name="hub_number"
                                        value="{{ $hub->hub_number ?? ""}}" readonly>
                                    @error('hub_number')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">Hub image</label>
                                    <input type="file" id="image" class="form-control" name="image" value="">
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country">country</label>
                                    <select name="country" id="" class="form-control">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if ($hub && $hub->country_id
                                            == $country->id )
                                            selected
                                            @endif

                                            >{{ $country->name }}</option>
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
                                    <select name="state" id="" class="form-control">
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}" @if ($hub && $hub->state_id
                                            == $state->id )
                                            selected
                                            @endif

                                            >{{ $state->name }}</option>
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
                                    <input type="text" id="city" class="form-control" name="city"
                                        value="{{ $hub->city ?? ""}}">
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="postcode">postcode</label>
                                    <input type="text" id="postcode" class="form-control" name="postcode"
                                        value="{{ $hub->postcode ?? ""}}">
                                    @error('postcode')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address">address</label>
                                    <textarea rows="5" id="address" class="form-control"
                                        name="address">{{ $hub->address ?? ""}}</textarea>
                                    @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address">Image Preview</label>
                                    <br>
                                    <img src="{{ imgSrc($hub->image ?? 'no-image') ?? ''}}" alt="" width="100"
                                        height="100" class="border rounded">
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