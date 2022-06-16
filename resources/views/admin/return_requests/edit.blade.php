@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Return Request : {{ $returnRequest->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.return_requests.update', $returnRequest) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="request_number">request_number</label>
                  <input type="text" readonly id="request_number" class="form-control" name="request_number"
                    value="{{ $returnRequest->request_number }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="status">status</label>
                  <select name="status" id="status" class="form-control">
                    @foreach (["pending","processing","declined","processed"] as $item)
                    <option value="{{ $item }}" @if ($returnRequest->status == ucfirst($item))
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
                    class="form-control">{{ $returnRequest->message }}</textarea>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="message">Customer Details</label>
                  <p>
                    Name : {{ $returnRequest->customer->name }}
                  </p>
                  <p>
                    Email : {{ $returnRequest->customer->email }}
                  </p>
                  <p>
                    Phone : {{ $returnRequest->customer->phone }}
                  </p>

                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="message">Order Details</label>
                  <p>
                    Number
                    : {{ $returnRequest->order->order_number }}
                  </p>
                  <p>
                    Status
                    : {{ $returnRequest->order->status->title }}
                  </p>
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