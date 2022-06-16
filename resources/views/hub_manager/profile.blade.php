@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('hub_manager.profile.save') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <img src="{{ $user->profile?->imgSrc($user->profile?->image) }}" alt="image"
                                        width="140" height="140" class="border rounded">
                                </div>
                            </div>
                            <div class="col-md-10 col-12">
                                <div class="">
                                    <div class="mb-1">
                                        <label class="form-label" for="name">name</label>
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ $user->name }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="">
                                    <div class="mb-1">
                                        <label class="form-label" for="email">email</label>
                                        <input type="text" id="email" class="form-control" name="email"
                                            value="{{ $user->email }}">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">Profile image</label>
                                    <div class="d-flex gap-1 align-items-start">
                                        <input type="file" id="image" class="form-control" name="image" value="">
                                    </div>
                                    @error('image') <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone">phone</label>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                        value="{{ $user->phone }}">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="alt_phone">alt_phone</label>
                                    <input type="text" id="alt_phone" class="form-control" name="alt_phone"
                                        value="{{ $user->profile?->alt_phone }}">
                                    @error('alt_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country">country</label>
                                    <select name="country" id="" class="form-control">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if ($user->profile &&
                                            $user->profile?->country_id
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
                                        <option value="{{ $state->id }}" @if ($user->profile &&
                                            $user->profile?->state_id
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
                                        value="{{ $user->profile?->city }}">
                                    @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address">address</label>
                                    <textarea id="address" class="form-control" name="address"
                                        rows="5">{{ $user->profile?->address }}</textarea>
                                    @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="postcode">postcode</label>
                                    <input type="text" id="postcode" class="form-control" name="postcode"
                                        value="{{ $user->profile?->postcode }}">
                                    @error('postcode')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="gst_number">gst_number</label>
                                    <input type="text" id="gst_number" class="form-control" name="gst_number"
                                        value="{{ $user->profile?->gst_number }}">
                                    @error('gst_number')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="current_password">current_password</label>
                                    <input type="password" id="current_password" class="form-control"
                                        name="current_password" autocomplete="off">
                                    @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="password">password</label>
                                    <input type="text" id="password" class="form-control" name="password"
                                        autocomplete="off">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="password_confirmation">password_confirmation</label>
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation" autocomplete="off">
                                    @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-check-label" for="inlineCheckbox1">Account Status : {!!
                                        $user->status ? "<span class='text-success'>Active</span>" :
                                        "<span class='text-danger'>Inactive</span>" !!} </label>
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