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
          <h2 class="content-header-title float-start mb-0 capitalize">packages</h2>
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
            @php
            $count = count($packages)
            @endphp
            <h4 class="card-title">You have total {{ $count }} {{ \Str::plural('package',
              $count) }}</h4>
            <a href="{{ route('hub_manager.packages.create') }}" class="btn btn-primary">Create</a>
          </div>
          <div class="table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Package no.</th>
                  <th>Order no.</th>
                  <th>Delivery Agent</th>
                  <th>Picked Up</th>
                  <th>Delivered</th>
                  <th>Fragile</th>
                  <th>created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($packages as $package)
                <tr>
                  <td>
                    <span class="fw-bold">{{ $package->package_number }}</span>
                  </td>
                  <td>
                    <span class="fw-bold">{{ $package->order->order_number }}</span>
                  </td>
                  <td>
                    <span class="fw-bold">{{ $package->delivery_agent->name }}</span>
                  </td>

                  <td>
                    @if ($package->is_picked_up)
                    <span class="badge rounded-pill badge-light-success me-1">Yes</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">No</span>
                    @endif
                  </td>
                  <td>
                    @if ($package->is_delivered)
                    <span class="badge rounded-pill badge-light-success me-1">Yes</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">No</span>
                    @endif
                  </td>
                  <td>
                    @if ($package->is_fragile)
                    <span class="badge rounded-pill badge-light-success me-1">Yes</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">No</span>
                    @endif
                  </td>
                  <td>{{ $package->created_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('hub_manager.packages.show', $package) }}">
                          <i data-feather="eye" class="me-50"></i>
                          <span>Show</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('hub_manager.packages.edit', $package) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a>
                        <form action="{{ route('hub_manager.packages.destroy', $package) }}" method="POST"
                          id="{{ $package->id }}">
                          @csrf
                          @method("delete")
                        </form>
                        <a onclick="event.preventDefault(); document.getElementById( {{ $package->id}} ).submit();"
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