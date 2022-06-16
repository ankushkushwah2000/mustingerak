@extends('layouts.app')

@section('page-content')
    <section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit {{ $seller->name }}</h4>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route("admin.sellers.update", $seller) }}" method="POST">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="name">name</label>
                  <input type="text" id="name" class="form-control" name="name" value="{{ $seller->name }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="email">email</label>
                  <input type="text" id="email" class="form-control" name="email" value="{{ $seller->email }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="phone">phone</label>
                  <input type="text" id="phone" class="form-control"  name="phone" value="{{ $seller->phone }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="referral_id">referral_id</label>
                  <input type="text" id="referral_id" class="form-control" name="referral_id"  value="{{ $seller->referral_id }}">
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