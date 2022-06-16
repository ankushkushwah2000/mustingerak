@extends('layouts.app')

@section('page-content')
<!-- BEGIN: Header-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>

<div class="content-wrapper container-xxl p-0">

  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-start mb-0 capitalize">seller requests</h2>
        </div>
      </div>
    </div>
  </div>

  <x-alerts />

  <div class="content-body">
    {{-- basic DB table --}}
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">You have total {{ count($seller_requests) }} Seller request</h4>
            {{-- <a href="{{ route('admin.seller_requests.create') }}" class="btn btn-primary">Create</a> --}}
          </div>
          <div class="table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Status</th>
                  <th>created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($seller_requests as $sellerRequest)
                <tr>
                  <td>
                    <span class="fw-bold">{{ $sellerRequest->request_number }}</span>
                  </td>
                  <td>
                    <span class="">{{ $sellerRequest->status }}</span>
                  </td>
                  <td>{{ $sellerRequest->created_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('admin.seller_requests.edit', $sellerRequest) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.seller_requests.destroy', $sellerRequest) }}" method="POST"
                          id="{{ $sellerRequest->id }}">
                          @csrf
                          @method("delete")
                        </form>
                        <a onclick="event.preventDefault(); document.getElementById( {{ $sellerRequest->id}} ).submit();"
                          class="dropdown-item" href="#">
                          <i data-feather="trash" class="me-50"></i>
                          <span>Delete</span>
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td>
                    No data found
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- /basic DB table --}}
  </div>
</div>
@endsection