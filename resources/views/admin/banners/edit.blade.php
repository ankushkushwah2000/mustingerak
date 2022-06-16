@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Banner : {{ $banner->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.banners.update', $banner) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">image</label>
                  <input type="file" id="image" class="form-control" name="image" value="{{ $banner->image }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">title</label>
                  <input type="text" id="title" class="form-control" name="title" value="{{ $banner->title }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="sub_title">sub_title</label>
                  <input type="text" id="sub_title" class="form-control" name="sub_title"
                    value="{{ $banner->sub_title }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="price">price</label>
                  <input type="text" id="price" class="form-control" name="price" value="{{ $banner->price }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="selling_price">selling_price</label>
                  <input type="text" id="selling_price" class="form-control" name="selling_price"
                    value="{{ $banner->selling_price }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
              <div class="mb-1">
                  <label class="form-label" for="category_id">select category</label>
                  <select name="category_id" id="" class="form-control">
                  <option value="">Select Category</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                      @endforeach
                  </select>
              </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                      @if ($banner->status)
                    checked
                    @endif>
                    <label class="form-check-label" for="inlineCheckbox1">Status</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">image preview</label>
                  <br>
                  <img src="{{ imgSrc($banner->image) }}" class="me-75 border" {{-- height="120" --}} width="120"
                    alt="image" />
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