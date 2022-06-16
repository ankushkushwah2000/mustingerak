@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Coupon : {{ $coupon->code }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.coupons.update', $coupon) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="code">code</label>
                  <input type="text" id="code" class="form-control" name="code" value="{{ $coupon->code }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="expired_at">expired_at</label>
                  <input type="datetime-local" id="expired_at" class="form-control" name="expired_at"
                    value="{{ $coupon->getRawOriginal('expired_at') }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="type">type</label>
                  <select name="type" id="" class="form-control">
                    <option value="fixed" @if ($coupon->type === "fixed")
                      selected
                      @endif>Fixed</option>
                    <option value="percentage" @if ($coupon->type === "percentage")
                      selected
                      @endif
                      >Percentage</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="brand_id">brand</label>
                  <select name="brand_id" id="" class="form-control">
                    <option value="" selected> None </option>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @if ($coupon->brand_id == $brand->id)
                      selected
                      @endif
                      >{{ $brand->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="product_id">product</label>
                  <select name="product_id" id="" class="form-control">
                    <option value="" selected> None </option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" @if ($coupon->product_id == $product->id)
                      selected
                      @endif
                      >{{ $product->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="catgory_id">category</label>
                  <select name="category_id" id="" class="form-control">
                    <option value="" selected> None </option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($coupon->category_id == $category->id)
                      selected
                      @endif
                      >{{ $category->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="value">value</label>
                  <input type="text" id="value" class="form-control" name="value" value="{{ $coupon->value }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                      @if ($coupon->status)
                    checked
                    @endif
                    >
                    <label class="form-check-label" for="inlineCheckbox1">Status</label>
                  </div>
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