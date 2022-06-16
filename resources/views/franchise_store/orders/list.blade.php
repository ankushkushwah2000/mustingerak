@extends('layouts.app')

@section('page-content')

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Orders</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order no.</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
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
                                        <span class="badge rounded-pill badge-light-primary me-1">{{
                                            $order->payment_status }}</span>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill badge-light-primary me-1">{{
                                            $order->payment_method }}</span>
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
                                                <a class="dropdown-item"
                                                    href="{{ route('franchise_store.orders.show', $order) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>Show</span>
                                                </a>
                                                {{-- <a class="dropdown-item"
                                                    href="{{ route('franchise_manager.orders.edit', $order) }}">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a> --}}
                                                {{-- <form
                                                    action="{{ route('franchise_manager.orders.destroy', $order) }}"
                                                    method="POST" id="{{ $order->id }}">
                                                    @csrf
                                                    @method("delete")
                                                </form>
                                                <a onclick="event.preventDefault(); document.getElementById( {{ $order->id}} ).submit();"
                                                    class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a> --}}
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
    </div>
</section>
@endsection