@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Team Member : {{ $team->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.teams.update', $team) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">image</label>
                  <input type="file" id="image" class="form-control" name="image" value="{{ $team->image }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="name">name</label>
                  <input type="text" id="name" class="form-control" name="name" value="{{ $team->name }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="role">role</label>
                  <input type="text" id="role" class="form-control" name="role" value="{{ $team->role }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="facebook">facebook</label>
                  <input type="text" id="facebook" class="form-control" name="facebook" value="{{ $team->facebook }}">
                  @error('facebook')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="twitter">twitter</label>
                  <input type="text" id="twitter" class="form-control" name="twitter" value="{{ $team->twitter }}">
                  @error('twitter')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="instagram">instagram</label>
                  <input type="text" id="instagram" class="form-control" name="instagram"
                    value="{{ $team->instagram }}">
                  @error('instagram')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="google_plus">google_plus</label>
                  <input type="text" id="google_plus" class="form-control" name="google_plus"
                    value="{{ $team->google_plus }}">
                  @error('google_plus')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                      @if ($team->status)
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
                  <img src="{{ imgSrc($team->image) }}" class="me-75 border" {{-- height="120" --}} width="120"
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