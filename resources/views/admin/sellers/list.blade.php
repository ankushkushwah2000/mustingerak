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
          <h2 class="content-header-title float-start mb-0 capitalize">Sellers</h2>
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
            <h4 class="card-title">You have total {{ count($sellers) }} seller</h4>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($sellers as $seller)
                <tr>
                  <td>
                    <img src="{{asset('images/icons/react.svg')}}" class="me-75" height="20" width="20" alt="React" />
                    <span class="fw-bold">{{ $seller->name }}</span>
                  </td>
                  <td>{{ $seller->email }}</td>
                  <td>
                    {{ $seller->phone ?? "none" }}
                  </td>
                  <td>
                    @if ($seller->status)
                    <span class="badge rounded-pill badge-light-success me-1">Active</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">Inactive</span>
                    @endif
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route(" admin.sellers.edit", $seller) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a>
                        <a class="dropdown-item" href="#">
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
                    no seller found :(
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