@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Enquiry From : {{ $enquiry->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="#" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="name">name</label>
                  <input type="text" id="name" class="form-control" name="name" value="{{ $enquiry->name }}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="email">email</label>
                  <input type="text" id="email" class="form-control" name="email" value="{{ $enquiry->email }}"
                    readonly>
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="message">message</label>
                  <textarea rows="5" id="message" class="form-control" name="message"
                    readonly>{{ $enquiry->message }}</textarea>
                </div>
              </div>
              {{-- <div class="col-12">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
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