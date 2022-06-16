@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Status</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <form class="form" action="{{ route('admin.statuses.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">title</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title')
                                        }}">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="description">description</label>
                                    <textarea rows="4" id="description" class="form-control" name="description">{{ old('description')
                                    }}</textarea>
                                </div>
                                <div class="mb-1">
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="checked" name="status">
                                        <label class="form-check-label" for="inlineCheckbox1">Status</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="Visible To">Visible To</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="admin" checked name="admin">
                                        <label class="form-check-label" for="admin">admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="seller" name="seller">
                                        <label class="form-check-label" for="seller">seller</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="agent" name="agent">
                                        <label class="form-check-label" for="agent">agent</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="hub_manager"
                                            name="hub_manager">
                                        <label class="form-check-label" for="hub_manager">hub_manager</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="customer" name="customer">
                                        <label class="form-check-label" for="customer">customer</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="delivery_agent"
                                            name="delivery_agent">
                                        <label class="form-check-label" for="delivery_agent">delivery_agent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

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