@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Sub Sub Category : {{ $subsubcategory->title }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route("admin.subsubcategories.update", $subsubcategory) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">title</label>
                  <input type="text" id="title" class="form-control" name="title" value="{{ $subsubcategory->title }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">image</label>
                  
                  <input type="file" id="image" class="form-control" name="image" value="{{ $subsubcategory->image }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"
                    placeholder="Textarea">{{ $subsubcategory->description }}</textarea>
                </div>
              </div>
              <div class="col-md-6 col-12">
                @livewire('categories-select')
                <!-- <label class="form-label" for="title">select Sub category</label>
                  <select name="sub_category_id" id="" class="form-control">
                      @foreach ($subcategories as $subcategory)
                          <option value="{{ $subcategory->id }}" 
                           @if ($subcategory->id == $subsubcategory->sub_category_id)
                                selected
                            @endif
                            >{{ $subcategory->title }}</option>
                      @endforeach
                  </select>
                  <br>
                  <label class="form-label" for="title">select Sub category</label>
                  <select name="sub_category_id" id="" class="form-control">
                      @foreach ($subcategories as $subcategory)
                          <option value="{{ $subcategory->id }}" 
                           @if ($subcategory->id == $subsubcategory->sub_category_id)
                                selected
                            @endif
                            >{{ $subcategory->title }}</option>
                      @endforeach
                  </select>
                  <br> -->
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                    @if ($subsubcategory->status)
                        checked
                    @endif
                    >
                      <label class="form-check-label"
                      for="inlineCheckbox1">Status</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="closing_fee">closing_fee</label>
                        <input type="number" id="closing_fee" class="form-control" name="closing_fee" value="{{ $subsubcategory->closing_fee }}">
                  </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="referral_fee">referral_fee (%)</label>
                        <input type="number" id="referral_fee" class="form-control" name="referral_fee" value="{{ $subsubcategory->referral_fee }}">
                  </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="pv">pv (%)</label>
                        <input type="number" id="pv" class="form-control" name="pv" value="{{ $subsubcategory->pv }}">
                  </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">image preview</label>
                  <br>
                  <img
                    src="{{ asset("/storage/".$subsubcategory->image) }}"
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