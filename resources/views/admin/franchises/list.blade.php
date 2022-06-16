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
          <h2 class="content-header-title float-start mb-0 capitalize">franchises</h2>
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
            $count = count($franchises)
            @endphp
            <h4 class="card-title">You have total {{ $count }} {{ \Str::plural('franchise',
              $count) }}</h4>
            {{-- <a href="{{ route('admin.franchises.create') }}" class="btn btn-primary">Create</a> --}}
          </div>
          <div class="table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Franchise Number</th>
                  <th>Status</th>
                  <th>State</th>
                  <th>Postcode</th>
                  <th>created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($franchises as $franchise)
                <tr>
                  <td>
                    <img src="{{ asset('/storage/'.$franchise->image) }}" class="me-75" height="20" width="20"
                      alt="image" />
                    <span class="fw-bold">{{ $franchise->franchise_number }}</span>
                  </td>
                  <td>
                    @if ($franchise->status)
                    <span class="badge rounded-pill badge-light-success me-1">Active</span>
                    @else
                    <span class="badge rounded-pill badge-light-danger me-1">Inactive</span>
                    @endif
                  </td>
                  <td>{{ $franchise->state->name }}</td>
                  <td>{{ $franchise->postcode }}</td>
                  <td>{{ $franchise->created_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                        data-bs-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('admin.franchises.show', $franchise) }}">
                          <i data-feather="eye" class="me-50"></i>
                          <span>Show</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.franchises.edit', $franchise) }}">
                          <i data-feather="edit-2" class="me-50"></i>
                          <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.franchises.destroy', $franchise) }}" method="POST"
                          id="{{ $franchise->id }}">
                          @csrf
                          @method("delete")
                        </form>
                        <a onclick="event.preventDefault(); document.getElementById( {{ $franchise->id}} ).submit();"
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