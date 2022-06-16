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
                    <h2 class="content-header-title float-start mb-0 capitalize">states</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        {{-- basic DB table --}}
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @php
                        $count = count($states)
                        @endphp
                        <h4 class="card-title">You have total {{ $count }} {{ \Str::plural('state',
                            $count) }}</h4>
                    </div>
                    <div class="table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($states as $state)
                                <tr>
                                    <td>
                                        <span class="fw-bold"> {{ $loop->index +1 }} </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ ucfirst($state->name) }}</span>
                                    </td>
                                    <td>{{ $state->code }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        no state found :(
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