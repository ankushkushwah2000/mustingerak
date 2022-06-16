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
          <h2 class="content-header-title float-start mb-0 capitalize">orders</h2>
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
            $count = count($orders)
            @endphp
            <h4 class="card-title">You have total {{ $count }} {{ \Str::plural('order',
              $count) }}</h4>
            {{-- <a href="{{ route('hub_manager.orders.create') }}" class="btn btn-primary">Create</a> --}}
          </div>
          <div class="table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Order no.</th>
                  <th>Tracking Status</th>
                  <th>Payment Status</th>
                  <th>Complete</th>
                  <th>created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($orders as $order)
                <tr>
                  <td>
                    <span class="fw-bold">{{ $order->order_number }}</span>
                  </td>
                  <td>
                    <span class="badge rounded-pill badge-light-info me-1">{{ $order->status->title }}</span>
                  </td>
                  <td>
                    <span class="badge rounded-pill badge-light-primary me-1">{{ $order->payment_status }}</span>
                  </td>
                  <td>
                    @if ($order->complete)
                    <span class="badge rounded-pill badge-light-success me-1">complete</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">failed</span>
                    @endif
                  </td>
                  <td>{{ $order->created_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('hub_manager.orders.show', $order) }}">
                          <i data-feather="eye" class="me-50"></i>
                          <span>Show</span>
                        </a>
                        {{-- <a class="dropdown-item" href="{{ route('hub_manager.orders.edit', $order) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a> --}}
                        <form action="{{ route('hub_manager.orders.destroy', $order) }}" method="POST"
                          id="{{ $order->id }}">
                          @csrf
                          @method("delete")
                        </form>
                        <a onclick="event.preventDefault(); document.getElementById( {{ $order->id}} ).submit();"
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