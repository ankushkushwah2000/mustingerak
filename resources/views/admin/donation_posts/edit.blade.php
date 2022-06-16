@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Banner : {{ $donation_post->name }}</h4>
        </div>
        <div class="card-body">
          <x-alerts />
          <form class="form" action="{{ route('admin.donation_posts.update', $donation_post) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="title">title</label>
                  <input type="text" id="title" class="form-control" name="title" value="{{ $donation_post->title
                                                                                }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="image">image</label>
                  <input type="file" id="image" class="form-control" name="image" value="{{ $donation_post->image }}">
                </div>
              </div>

              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="excerpt">excerpt</label>
                  <input type="text" id="excerpt" class="form-control" name="excerpt" value="{{ $donation_post->excerpt
                                                    }}">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="amount">amount</label>
                  <input type="text" id="amount" class="form-control" name="amount" value="{{ $donation_post->amount
                                                    }}">
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="link">link</label>
                  <input type="text" id="link" class="form-control" name="link" value="{{ $donation_post->link
                                                    }}">
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-1">
                  <label class="form-label" for="content">content</label>
                  <textarea name="content" class="form-control" id="" cols="30"
                    rows="10">{!! $donation_post->content !!}</textarea>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" name="status"
                      @if ($donation_post->status)
                    checked
                    @endif

                    >
                    <label class="form-check-label" for="inlineCheckbox1">Status</label>
                  </div>
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