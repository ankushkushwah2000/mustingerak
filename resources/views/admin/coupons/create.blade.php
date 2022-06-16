@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Coupon</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.coupons.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="brand_id">#1 brand condition</label>
                                    <select name="brand_id" id="" class="form-control">
                                        <option value="" selected> None </option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="product_id">#2 product condition</label>
                                    <select name="product_id" id="" class="form-control">
                                        <option value="" selected> None </option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="catgory_id">#3 category condition</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="" selected> None </option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="catgory_id">Note : Select only one condition for one
                                        coupon</label>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">title</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Winter Sale is here" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="code">code</label>
                                    <input type="text" id="code" class="form-control" name="code"
                                        placeholder="e.g. XMAS25" value="{{ old('code') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="started_at">started_at</label>
                                    <input type="datetime-local" id="started_at" class="form-control" name="started_at"
                                        value="{{ old('started_at') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="expired_at">expired_at</label>
                                    <input type="datetime-local" id="expired_at" class="form-control" name="expired_at"
                                        value="{{ old('expired_at') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="type">type</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="fixed" selected>Fixed (₹)</option>
                                        <option value="percentage">Percentage (%)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="value">value</label>
                                    <input type="text" id="value" class="form-control" name="value"
                                        value="{{ old('value') ?? '10' }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="maximum_discount">maximum_discount (₹)</label>
                                    <input type="text" id="maximum_discount" class="form-control"
                                        name="maximum_discount" value="{{ old('maximum_discount') ?? '199' }}">
                                    <p>
                                        <small>
                                            Set 0 for no limit
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="recurring">recurring</label>
                                    <input type="text" id="recurring" class="form-control" name="recurring"
                                        value="{{ old('recurring' ?? '0') }}">
                                    <p>
                                        <small>
                                            Set 0 for no limit
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="maximum_uses">maximum_uses</label>
                                    <input type="text" id="maximum_uses" class="form-control" name="maximum_uses"
                                        value="{{ old('maximum_uses') ?? '0' }}">
                                    <p>
                                        <small>
                                            Set 0 for unlimited uses
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="apply_once" value="checked"
                                            name="apply_once">
                                        <label class="form-check-label" for="apply_once">apply_once</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="status" value="checked"
                                            name="status">
                                        <label class="form-check-label" for="status">Status</label>
                                    </div>
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