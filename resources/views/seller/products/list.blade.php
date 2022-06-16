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
          <h2 class="content-header-title float-start mb-0 capitalize">Products</h2>
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
            <h4 class="card-title">You have total {{ count($products) }} product</h4>
            <a href="{{ route('seller.products.create') }}" class="btn btn-primary">Create</a>
          </div>
          <div class="table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>title</th>
                  <th>Status</th>
                  <th>Stock</th>
                  <th>created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($products as $product)
                <tr>
                  <td>
                    <img src="{{ asset('/storage/'.$product->image) }}" class="me-75" height="20" width="20"
                      alt="image" />
                    <span class="fw-bold">{{ $product->title }}</span>
                  </td>

                  <td>
                    @if ($product->status)
                    <span class="badge rounded-pill badge-light-success me-1">Active</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">Inactive</span>
                    @endif
                  </td>
                  <td>
                    @if ($product->in_stock)
                    <span class="badge rounded-pill badge-light-success me-1">In stock</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">Out of Stock</span>
                    @endif
                  </td>
                  <td>{{ $product->created_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('seller.products.edit', $product) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a>
                        <form action="{{ route('seller.products.destroy', $product) }}" method="POST"
                          id="{{ $product->id }}">
                          @csrf
                          @method("delete")
                        </form>
                        <a onclick="event.preventDefault(); document.getElementById( {{ $product->id}} ).submit();"
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
                    no product found :(
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