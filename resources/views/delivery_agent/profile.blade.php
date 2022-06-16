@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Delivery Agent : {{ $user->name }}</h4>
          <h4 class="card-title">Account Status : {!! $user->status ? "<span class='text-success'>Active</span>" :
            "<span class='text-danger'>Inactive</span>" !!}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="#">
            <div class="row">
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">Profile image</label>
                  <div class="">
                    <img src="{{ $user->profile?->imgSrc($user->profile->image) }}" alt="image" width="100" height="100"
                      class="border rounded">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <label class="form-label" for="id_proof">id_proof</label>
                  <div>
                    <img src="{{ $user->profile?->imgSrc($user->profile->id_proof) }}" alt="id_proof" width="200"
                      class="border rounded">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                  <label class="form-label" for="driving_licence">driving_licence</label>
                  <div>
                    <img src="{{ $user->profile?->imgSrc($user->profile->driving_licence) }}" alt="id_proof" width="200"
                      class="border rounded">
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="name">name</label>
                  <input type="text" readonly id="name" class="form-control" name="name" value="{{ $user->name }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="email">email</label>
                  <input type="text" readonly id="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="phone">phone</label>
                  <input type="text" readonly id="phone" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="alt_phone">alt_phone</label>
                  <input type="text" readonly id="alt_phone" class="form-control" name="alt_phone"
                    value="{{ $user->profile->alt_phone }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="country">country</label>
                  <select readonly name="country" id="" class="form-control">
                    <option value="" selected>{{ $user->profile->country->name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="state">state</label>
                  <select readonly name="state" id="" class="form-control">
                    <option value="" selected>{{ $user->profile->state->name }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="city">city</label>
                  <input type="text" readonly id="city" class="form-control" name="city"
                    value="{{ $user->profile->city }}">
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="address">address</label>
                  <textarea readonly id="address" class="form-control" name="address"
                    rows="5">{{ $user->profile->address }}</textarea>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="postcode">postcode</label>
                  <input type="text" readonly id="postcode" class="form-control" name="postcode"
                    value="{{ $user->profile->postcode }}">

                </div>

                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="aadhar_number">aadhar_number</label>
                    <input type="text" readonly id="aadhar_number" class="form-control" name="aadhar_number"
                      value="{{ $user->profile->aadhar_number }}">
                  </div>
                </div>

                <div class="col-md-12 col-12">
                  <div class="mb-1">
                    <label class="form-check-label" for="inlineCheckbox1">Account Status : {!! $user->status ? "<span
                        class='text-success'>Active</span>" :
                      "<span class='text-danger'>Inactive</span>" !!} </label>
                  </div>
                </div>
                {{-- <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="password">password</label>
                    <input type="text" readonly id="password" class="form-control" name="password" autocomplete="off">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div> --}}
                {{-- <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="password_confirmation">password_confirmation</label>
                    <input type="text" readonly id="password_confirmation" class="form-control"
                      name="password_confirmation" autocomplete="off">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div> --}}
                {{-- <div class="col-12">
                  <button type="submit"
                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                  <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                </div> --}}
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection