@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Team Member</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.teams.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">image</label>
                                    <input type="file" id="image" class="form-control" name="image" value="{{ old("
                                        image") }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ old(" name")
                                        }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="role">role</label>
                                    <input type="text" id="role" class="form-control" name="role" value="{{ old(" role")
                                        }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="facebook">facebook</label>
                                    <input type="text" id="facebook" class="form-control" name="facebook"
                                        value="{{ old('facebook') }}">
                                    @error('facebook')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="twitter">twitter</label>
                                    <input type="text" id="twitter" class="form-control" name="twitter"
                                        value="{{ old('twitter') }}">
                                    @error('twitter')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="instagram">instagram</label>
                                    <input type="text" id="instagram" class="form-control" name="instagram"
                                        value="{{ old('instagram') }}">
                                    @error('instagram')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="google_plus">google_plus</label>
                                    <input type="text" id="google_plus" class="form-control" name="google_plus"
                                        value="{{ old('google_plus') }}">
                                    @error('google_plus')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="checked" name="status">
                                        <label class="form-check-label" for="inlineCheckbox1">Status</label>
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