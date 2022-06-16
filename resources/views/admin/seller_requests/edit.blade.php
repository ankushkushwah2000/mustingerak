@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Seller Request From : {{ $sellerRequest->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.seller_requests.update', $sellerRequest) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="request_number">request_number</label>
                  <input type="text" readonly id="request_number" class="form-control" name="request_number"
                    value="{{ $sellerRequest->request_number }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="name">name</label>
                  <input type="text" readonly id="name" class="form-control" name="name"
                    value="{{ $sellerRequest->name }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="email">email</label>
                  <input type="text" readonly id="email" class="form-control" name="email"
                    value="{{ $sellerRequest->email }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="phone">phone</label>
                  <input type="text" readonly id="phone" class="form-control" name="phone"
                    value="{{ $sellerRequest->phone }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="status">status</label>
                  <select name="status" id="status" class="form-control">
                    @foreach (["pending","processing","declined","processed"] as $item)
                    <option value="{{ $item }}" @if ($sellerRequest->status == ucfirst($item))
                      selected
                      @endif
                      >{{ ucfirst($item) }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="message">message</label>
                  <textarea rows="5" readonly type="text" id="message" name="message"
                    class="form-control">{{ $sellerRequest->message }}</textarea>
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