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
                    <h2 class="content-header-title float-start mb-0 capitalize">Wallets / Seller</h2>
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
                    </div>
                    <div class="table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Wallet</th>
                                    <th>Seller</th>
                                    <th>Total Earning</th>
                                    <th>Current Earning</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wallets as $wallet)
                                <tr>
                                    <td>
                                        <span class="fw-bold">#000{{ $wallet->id }} </span>
                                    </td>
                                    <td>{{ $wallet->owner->name }}</td>
                                    <td>₹{{ number_format($wallet->total_earnings, 2) }}</td>
                                    <td>₹{{ number_format($wallet->current_earnings, 2) }}</td>
                                    <td>
                                        @if ($wallet->status)
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
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.wallets.sellers.show', $wallet) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>Show</span>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.wallets.sellers.edit', $wallet) }}">
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