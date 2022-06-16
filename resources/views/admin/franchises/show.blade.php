@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <x-alerts />
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="card-title ">
                            Franchise : {{ $franchise->unique_name() }}
                        </h4>
                        <div class="fs-6 mt-1">
                            <p>Franchise Manager : {{ $franchise->manager->name }}</p>
                            <p>Phone : {{ $franchise->manager->phone }}</p>
                            <p>Email : {{ $franchise->manager->email }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <h4>Products :</h4>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($franchise_products as $franchise_product)
                            <tr>
                                <td>
                                    <img src="{{ asset('/storage/'.$franchise_product->image) }}" class="me-75"
                                        height="20" width="20" alt="image" />
                                    <span class="fw-bold">{{ $franchise_product->title }}</span>
                                </td>
                                <td>{{ $franchise_product->pivot->quantity }}</td>
                                <td>{{ $franchise_product->pivot->discount }}</td>
                                <td>{{ $franchise_product->pivot->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                            data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.franchises_products.edit', $franchise_product) }}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form
                                                action="{{ route('admin.franchises_products.destroy', $franchise_product) }}"
                                                method="POST" id="{{ $franchise_product->id }}">
                                                @csrf
                                                @method("delete")
                                            </form>
                                            <a onclick="event.preventDefault(); document.getElementById( {{ $franchise_product->id}} ).submit();"
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
</section>
@endsection