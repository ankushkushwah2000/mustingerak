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
          <h2 class="content-header-title float-start mb-0 capitalize">sub sub categories</h2>
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
            <h4 class="card-title">You have total {{ count($subsubcategories) }} sub sub category</h4>
            <a href="{{ route('admin.subsubcategories.create') }}" class="btn btn-primary">Create</a>
          </div>
          <div class="table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>title</th>
                  <th>sub category</th>
                  <th>category</th>
                  <th>Status</th>
                  <th>created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($subsubcategories as $subsubcategory)
                <tr>
                  <td>
                    <img src="{{ imgSrc($subsubcategory->image) }}" class="me-75" height="20" width="20" alt="image" />
                    <span class="fw-bold">{{ $subsubcategory->title }}</span>
                  </td>
                  <td>{{ $subsubcategory->subcategory->title }}</td>
                  <td>{{ $subsubcategory->category()->title ?? ""}}</td>          
                  <td>
                    @if ($subsubcategory->status)
                    <span class="badge rounded-pill badge-light-success me-1">Active</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">Inactive</span>
                    @endif
                  </td>
                  <td>{{ $subsubcategory->created_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('admin.subsubcategories.edit', $subsubcategory) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.subsubcategories.destroy', $subsubcategory) }}" method="POST"
                          id="{{ $subsubcategory->id }}">
                          @csrf
                          @method("delete")
                        </form>
                        <a onclick="event.preventDefault(); document.getElementById( {{ $subsubcategory->id}} ).submit();"
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
                    no category found :(
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