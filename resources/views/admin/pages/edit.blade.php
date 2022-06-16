@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Brand : {{ $page->title }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.pages.update', $page) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">title</label>
                  <input type="text" id="title" class="form-control" name="title" value="{{ $page->title }}">
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">content
                  </label>
                  <textarea class="form-control summernote" id="exampleFormControlTextarea1" name="content" rows="3"
                    placeholder="Textarea">{!! $page->content
                     !!}</textarea>
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