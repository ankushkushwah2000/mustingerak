@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product</h4>
                </div>
                <div class="card-body">
                    {{--
                    <x-alerts /> --}}
                    <form class="form" action="{{ route('admin.products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">title</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old("
                                        title") }}">
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">image</label>

                                    <input type="file" id="image" class="form-control" name="image" value="{{ old("
                                        image") }}">
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="multiple_images">multiple_image</label>
                                    <input type="file" multiple id="multiple_images" class="form-control"
                                        name="multiple_images[]" value="{{ old('multiple_images') }}">
                                    @error('multiple_images')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="multiple_image">Select Seller</label>
                                    <select name="seller" id="" class="form-control">
                                        @forelse ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                        <option value="" disabled>No data found</option>
                                        @endforelse
                                    </select>
                                    @error('multiple_image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="summary">summary</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="summary"
                                        rows="3" placeholder="Textarea">{{ old("summary") }}</textarea>
                                    @error('summary')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="box_content">box_content</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="box_content"
                                        rows="3" placeholder="Textarea">{{ old("box_content") }}</textarea>
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="checked" name="status">
                                        <label class="form-check-label" for="inlineCheckbox1">Status</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="checked" name="in_stock">
                                        <label class="form-check-label" for="inlineCheckbox2">in stock</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="checked" name="cod_enable">
                                        <label class="form-check-label" for="inlineCheckbox3">cod_enable</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_popular" value="checked"
                                            name="is_popular">
                                        <label class="form-check-label" for="is_popular">is_popular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_featured" value="checked"
                                            name="is_featured">
                                        <label class="form-check-label" for="is_featured">is_featured</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_gift_wrap_available"
                                            value="checked" name="is_gift_wrap_available">
                                        <label class="form-check-label"
                                            for="is_gift_wrap_available">is_gift_wrap_available</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">description</label>
                                    <textarea class="form-control summernote" id="exampleFormControlTextarea1"
                                        name="description" rows="3"
                                        placeholder="Textarea">{{ old("description") }}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="key_features">key_features</label>
                                    <textarea class="form-control summernote" id="exampleFormControlTextarea1"
                                        name="key_features" rows="3"
                                        placeholder="Textarea">{{ old("key_features") }}</textarea>
                                    @error('key_features')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="features">features</label>
                                    <textarea class="form-control summernote" id="exampleFormControlTextarea1"
                                        name="features" rows="3" placeholder="Textarea">{{ old("features") }}</textarea>
                                    @error('features')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            @livewire('allcategoriesselect')

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="mrp">mrp (rs)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="mrp" class="form-control"
                                        name="mrp" value="{{ old('mrp') }}">
                                    @error('mrp')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="price">price (rs)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="price" class="form-control"
                                        name="price" value="{{ old('price') }}">
                                    @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="selling_price">selling price (rs)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="selling_price"
                                        class="form-control" name="selling_price" value="{{ old('selling_price') }}">
                                    @error('selling_price')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="gst">gst (%)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="gst" class="form-control"
                                        name="gst" value="{{ old('gst') }}">
                                    @error('gst')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pin_code">pin_code</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="pin_code" class="form-control"
                                        name="pin_code" value="{{ old('pin_code') }}">
                                    @error('pin_code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="legal_disclaimer">legal_disclaimer</label>
                                    <input type="text" id="legal_disclaimer" class="form-control"
                                        name="legal_disclaimer" value="{{ old('legal_disclaimer') }}">
                                    @error('legal_disclaimer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="condition">condition</label>
                                    <input type="text" id="condition" class="form-control" name="condition"
                                        value="{{ old('condition') }}">
                                    @error('condition')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="condition_note">condition_note</label>
                                    <textarea id="condition_note" class="form-control" name="condition_note" cols="30"
                                        rows="1">{{ old('condition_note') }}</textarea>
                                    @error('condition_note')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="manufacture">manufacture</label>
                                    <input type="text" id="manufacture" class="form-control" name="manufacture"
                                        value="{{ old('manufacture') }}">
                                    @error('manufacture')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country">country</label>
                                    <input type="text" id="country" class="form-control" name="country"
                                        value="{{ old('country') }}">
                                    @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="quantity">quantity</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="quantity" class="form-control"
                                        name="quantity" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label"
                                        for="maximum_order_quantity">maximum_order_quantity</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="maximum_order_quantity"
                                        class="form-control" name="maximum_order_quantity"
                                        value="{{ old('maximum_order_quantity') }}" />
                                    <small>set 0 for none</small>
                                    @error('maximum_order_quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="brand">brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="model">model</label>
                                    <input type="text" id="model" class="form-control" name="model"
                                        value="{{ old('model') }}">
                                    @error('model')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="hsn">hsn</label>
                                    <input type="text" id="hsn" class="form-control" name="hsn" value="{{ old('hsn')
                                        }}">
                                    @error('hsn')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sku">sku</label>
                                    <input type="text" id="sku" class="form-control" name="sku" value="{{ old('sku')
                                        }}">
                                    @error('sku')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="warranty">warranty (in months)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="warranty" class="form-control"
                                        name="warranty" value="{{ old('warranty') }}">
                                    @error('warranty')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
@section('page-script')
<!-- Page js files -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Hello world',
            tabsize: 2,
            height: 300
        });
    });
</script>
@endsection