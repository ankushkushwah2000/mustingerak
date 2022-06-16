@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Frontend Setting</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.settings.frontend.update', $setting) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <img src="{{ imgSrc($setting->logo) }}" alt="logo" height="140"
                                        class="border rounded">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <img src="{{ imgSrc($setting->favicon) }}" alt="favicon" width="140" height="140"
                                        class="border rounded">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="logo">logo</label>
                                    <div class="d-flex gap-1 align-items-start">
                                        <input type="file" id="logo" class="form-control" name="logo">
                                    </div>
                                    @error('logo') <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="favicon">favicon</label>
                                    <div class="d-flex gap-1 align-items-start">
                                        <input type="file" id="favicon" class="form-control" name="favicon">
                                    </div>
                                    @error('favicon') <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">title</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        value="{{ $setting->title  }}">
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="meta_keywords">meta_keywords</label>
                                    <input type="text" id="meta_keywords" class="form-control" name="meta_keywords"
                                        value="{{ $setting->meta_keywords }}">
                                    @error('meta_keywords')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="meta_description">meta_description</label>
                                    <textarea rows="4" id="meta_description" class="form-control"
                                        name="meta_description">{{ $setting->meta_description }}</textarea>
                                    @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="address_line">address_line</label>
                                    <textarea rows="4" type="text" id="address_line" class="form-control"
                                        name="address_line">{{ $setting->address_line }}</textarea>
                                    @error('address_line')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="email">email</label>
                                    <input type="text" id="email" class="form-control" name="email"
                                        value="{{ $setting->email }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone">phone</label>
                                    <input type="text" id="phone" class="form-control" name="phone"
                                        value="{{ $setting->phone }}">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="alt_phone">alt_phone</label>
                                    <input type="text" id="alt_phone" class="form-control" name="alt_phone"
                                        value="{{ $setting->alt_phone }}">
                                    @error('alt_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="gst_number">gst_number</label>
                                    <input type="text" id="gst_number" class="form-control" name="gst_number"
                                        value="{{ $setting->gst_number }}">
                                    @error('gst_number')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="licence">licence</label>
                                    <input type="text" id="licence" class="form-control" name="licence"
                                        value="{{ $setting->licence }}">
                                    @error('licence')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="facebook">facebook</label>
                                    <input type="text" id="facebook" class="form-control" name="facebook"
                                        value="{{ $setting->facebook }}">
                                    @error('facebook')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="twitter">twitter</label>
                                    <input type="text" id="twitter" class="form-control" name="twitter"
                                        value="{{ $setting->twitter }}">
                                    @error('twitter')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="instagram">instagram</label>
                                    <input type="text" id="instagram" class="form-control" name="instagram"
                                        value="{{ $setting->instagram }}">
                                    @error('instagram')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="youtube">youtube</label>
                                    <input type="text" id="youtube" class="form-control" name="youtube"
                                        value="{{ $setting->youtube }}">
                                    @error('youtube')
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