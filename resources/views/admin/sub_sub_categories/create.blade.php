@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Sub Sub Category</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route("admin.subsubcategories.store") }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">title</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old("title") }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">image</label>

                                    <input type="file" id="image" class="form-control" name="image" value="{{ old("
                                        image") }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                                    rows="3" placeholder="Textarea">{{ old("description") }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                            @livewire('categories-select')
     <!--                           <div class="mb-1">
                                    <label class="form-label" for="title">select category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label class="form-label" for="title">select sub category</label>
                                    <select name="sub_category_id" id="" class="form-control">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                        @endforeach
                                    </select>
                                    <br>   --> 
                            </div>
                            <div class="col-md-4 col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="checked" name="status">
                                        <label class="form-check-label" for="inlineCheckbox1">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="closing_fee">closing_fee</label>
                                     <input type="number" id="closing_fee" class="form-control" name="closing_fee" value="{{ old("closing_fee") }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="referral_fee">referral_fee (%)</label>
                                     <input type="number" id="referral_fee" class="form-control" name="referral_fee" value="{{ old("referral_fee") }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pv">pv (%)</label>
                                     <input type="number" id="pv" class="form-control" name="pv" value="{{ old("pv") }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
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