@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <x-alerts />
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit franchise product </h4>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('admin.franchises_products.update', $franchises_product) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="franchise">franchise</label>
                  <input type="text" id="franchise" class="form-control" readonly name="franchise"
                    value="{{ $franchises_product->franchise->unique_name() ?? ""}}">
                  @error('franchise')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="product">product</label>
                  <input type="text" id="product" class="form-control" readonly name="product"
                    value="{{ $franchises_product->product->title ?? ""}}">
                  @error('product')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="quantity">quantity</label>
                  <input type="text" id="quantity" class="form-control" name="quantity"
                    value="{{ $franchises_product->quantity ?? ""}}">
                  @error('quantity')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="discount">discount</label>
                  <input type="text" id="discount" class="form-control" name="discount"
                    value="{{ $franchises_product->discount ?? ""}}">
                  @error('discount')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              {{-- <div class="col-md-6 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status">
                    <label class="form-check-label" for="inlineCheckbox1">Status</label>
                  </div>
                </div>
              </div> --}}

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