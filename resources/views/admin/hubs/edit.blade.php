@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <x-alerts />
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Hub Setting</h4>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('admin.hubs.update', $hub) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
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
                  <input type="text" id="city" class="form-control" name="city" value="{{ $hub->city ?? ""}}">
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
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                      @if ($hub->status)
                    checked
                    @endif
                    >
                    <label class="form-check-label" for="inlineCheckbox1">Status</label>
                  </div>
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
                  <img src="{{ imgSrc($hub->image) ?? ""}}" alt="" width="100" height="100" class="border rounded">
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
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