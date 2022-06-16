@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Sub Category : {{ $subcategory->title }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route("admin.subcategories.update", $subcategory) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">title</label>
                  <input type="text" id="title" class="form-control" name="title" value="{{ $subcategory->title }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">image</label>
                  
                  <input type="file" id="image" class="form-control" name="image" value="{{ $subcategory->image }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"
                    placeholder="Textarea">{{ $subcategory->description }}</textarea>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">select category</label>
                  <select name="category_id" id="" class="form-control">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}" 
                            @if ($category->id == $subcategory->category_id)
                                selected
                            @endif
                            >{{ $category->title }}</option>
                      @endforeach
                  </select>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                    @if ($subcategory->status)
                        checked
                    @endif
                    >
                      <label class="form-check-label"
                      for="inlineCheckbox1">Status</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">image preview</label>
                  <br>
                  <img
                    src="{{ asset("/storage/".$subcategory->image) }}"
                    class="me-75 border"
                    {{-- height="120"  --}}
                    width="120"
                    alt="image"
                  />
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