@extends('layouts.app')

@section('vendor-style')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset('vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/css/editors/quill/quill.bubble.css') }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link
    href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap"
    rel="stylesheet">
@endsection

@section('page-style')
@endsection

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Product : {{ $product->title }}</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.products.update', $product) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">title</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        value="{{ $product->title }}">
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">image</label>

                                    <input type="file" id="image" class="form-control" name="image"
                                        value="{{ $product->image }}">
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="multiple_image">multiple_image</label>
                                    <input type="file" multiple id="multiple_image" class="form-control"
                                        name="multiple_images[]" value="{{ old(" multiple_image") }}">
                                    @error('multiple_image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="multiple_image">Select Seller</label>
                                    <select name="seller" id="" class="form-control">
                                        @forelse ($users as $user)
                                        <option value="{{ $user->id }}" @if ($user->id == $product->seller_id)
                                            selected
                                            @endif
                                            >{{ $user->name }}</option>
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
                                    <label class="form-label" for="description">summary</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="summary"
                                        rows="3" placeholder="Textarea">{{ $product->summary }}</textarea>
                                    @error('summary')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="box_content">box_content</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="box_content"
                                        rows="3" placeholder="Textarea">{{ $product->box_content }}</textarea>
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="checked" name="status" @if ($product->status)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="inlineCheckbox1">Status</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="checked" name="in_stock" @if ($product->in_stock)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="inlineCheckbox2">in stock</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="checked" name="cod_enable" @if ($product->cod_enable)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="inlineCheckbox3">cod_enable</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_popular" value="checked"
                                            name="is_popular" @if ($product->is_popular)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="is_popular">is_popular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_featured" value="checked"
                                            name="is_featured" @if ($product->is_featured)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label" for="is_featured">is_featured</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="is_gift_wrap_available"
                                            value="checked" name="is_gift_wrap_available"
                                            @if($product->is_gift_wrap_available)
                                        checked
                                        @endif
                                        >
                                        <label class="form-check-label"
                                            for="is_gift_wrap_available">is_gift_wrap_available</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="restock_at">restock_at</label>
                                    <input type="datetime-local" id="restock_at" class="form-control" name="restock_at"
                                        value="{{$product->restock_at }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">description</label>
                                    <textarea class="summernote" name="description" rows="3"
                                        placeholder="Textarea">{!! $product->description  !!}</textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="key_features">key_features</label>
                                    <textarea class="form-control summernote" name="key_features" rows="3"
                                        placeholder="Textarea">{!! $product->key_features !!}</textarea>
                                    @error('key_features')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="features">features</label>
                                    <textarea class="form-control summernote" name="features" rows="3"
                                        placeholder="Textarea">{!! $product->features !!}</textarea>
                                    @error('features')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            @livewire('allcategoriesselect',['selectedCategory' =>
                            $product->category_id,'selectedSubCategory' =>
                            $product->sub_category_id,'selectedSubSubCategory' => $product->sub_sub_category_id])


                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="mrp">mrp (rs)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="mrp" class="form-control"
                                        name="mrp" value="{{ $product->mrp }}">
                                    @error('mrp')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="price">price (rs)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="price" class="form-control"
                                        name="price" value="{{ $product->price }}">
                                    @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="selling_price">selling price (rs)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="selling_price"
                                        class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="gst">gst (%)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="gst" class="form-control"
                                        name="gst" value="{{ $product->gst }}">
                                    @error('gst')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="pin_code">pin_code</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="pin_code" class="form-control"
                                        name="pin_code" value="{{ $product->pin_code }}">
                                    @error('pin_code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="legal_disclaimer">legal_disclaimer</label>
                                    <input type="text" id="legal_disclaimer" class="form-control"
                                        name="legal_disclaimer" value="{{ $product->legal_disclaimer }}">
                                    @error('legal_disclaimer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="condition">condition</label>
                                    <input type="text" id="condition" class="form-control" name="condition"
                                        value="{{ $product->condition }}">
                                    @error('condition')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="condition_note">condition_note</label>
                                    <textarea id="condition_note" class="form-control" name="condition_note" cols="30"
                                        rows="1">{{ $product->condition_note }}</textarea>
                                    @error('condition_note')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="manufacture">manufacture</label>
                                    <input type="text" id="manufacture" class="form-control" name="manufacture"
                                        value="{{ $product->manufacture }}">
                                    @error('manufacture')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country">country</label>
                                    <input type="text" id="country" class="form-control" name="country"
                                        value="{{ $product->country }}">
                                    @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="quantity">quantity</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="quantity" class="form-control"
                                        name="quantity" value="{{ $product->quantity }}">
                                    @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label"
                                        for="maximum_order_quantity">maximum_order_quantity</label>
                                    <input id="maximum_order_quantity" class="form-control"
                                        name="maximum_order_quantity" value="{{ $product->maximum_order_quantity }}" />
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
                                        <option value="{{ $brand->id }}" @if ($product->brand_id === $brand->id)
                                            selected
                                            @endif
                                            >{{ $brand->title }}</option>
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
                                        value="{{ $product->model }}">
                                    @error('model')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="hsn">hsn</label>
                                    <input type="text" id="hsn" class="form-control" name="hsn"
                                        value="{{ $product->hsn }}">
                                    @error('hsn')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="sku">sku</label>
                                    <input type="text" id="sku" class="form-control" name="sku"
                                        value="{{ $product->sku }}">
                                    @error('sku')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="warranty">warranty (in months)</label>
                                    <input type="number" onwheel="this.blur()" min=0 id="warranty" class="form-control"
                                        name="warranty" value="{{ $product->warranty }}">
                                    @error('warranty')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <button type="submit"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="">
                            <h4 class="card-title">Edit Images</h4>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="title">Thumbnail image preview</label>
                                <br>
                                <img src="{{ asset('/storage/'.$product->image) }}"
                                    class="border border-primary rounded" {{-- height="120" --}} width="120"
                                    alt="image" />
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <label class="form-label" for="title">multiple image preview</label>
                            <br>
                            <div class="row">
                                @forelse ($product->images as $image)
                                <div class="col-sm col-md-2">
                                    <img src="{{ $image->path }}" class="border border-primary rounded" height="120"
                                        alt="image" />
                                    <form action="{{ route('admin.product.images.delete', $image) }}" method="POST"
                                        id="image-remove-form-{{ $image->id }}">@csrf
                                    </form>
                                    <a class="text-danger" href="#" onclick="event.preventDefault();
                                                                    document.getElementById('image-remove-form-{{ $image->id }}').submit();
                                                                    ">delete</a>
                                </div>
                                @empty
                                <div class="py-2">
                                    No Image Found
                                </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('vendor-script')
<!-- vendor files -->
{{--
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}

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
