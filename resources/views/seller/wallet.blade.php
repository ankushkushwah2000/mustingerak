@extends('layouts.app')

@section('page-content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Wallet</h4>
                </div>
                <div class="card-body">
                    <x-alerts />
                    <div class="row">
                        <div class="col-sm col-md-6">
                            <div class="card border rounded">
                                <div class="card-header">
                                    <div class="card-title">Total Earnings</div>
                                </div>
                                <div class="card-body">
                                    <h1 class="text-success">
                                        ₹{{ number_format($wallet->total_earnings, 2) }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md-6">
                            <div class="card border rounded">
                                <div class="card-header">
                                    <div class="card-title">Current Earnings</div>
                                </div>
                                <div class="card-body">
                                    <h1 class="text-success">
                                        ₹{{ number_format($wallet->current_earnings, 2) }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md-12">
                            <div class="card card-transaction border rounded">
                                <div class="card-header">
                                    <h4 class="card-title">Transactions</h4>
                                    {{-- <div class="dropdown chart-dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-vertical font-medium-3 cursor-pointer"
                                            data-bs-toggle="dropdown">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="card-body">

                                    @forelse ($wallet->transactions as $transaction)
                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div
                                                class="avatar bg-light-{{ $transaction->state === 'credit' ? 'success' : 'danger' }} rounded float-start">
                                                <div class="avatar-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-dollar-sign avatar-icon font-medium-3">
                                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="transaction-percentage">
                                                <h6 class="transaction-title">{{ ucfirst($transaction->state) }} | {{
                                                    ucfirst($transaction->for) }}</h6>
                                                <small>{{ $transaction->transaction_number }} | {{
                                                    $transaction->created_at }}</small>
                                            </div>
                                        </div>
                                        @if ( $transaction->state === 'credit' )
                                        <div class="fw-bolder text-success"> + ₹{{ number_format($transaction->amount,
                                            2) }}</div>
                                        @else
                                        <div class="fw-bolder text-danger"> - ₹{{ number_format($transaction->amount, 2)
                                            }}</div>
                                        @endif
                                    </div>
                                    @empty
                                    <div class="transaction-item">
                                        <div class="d-flex">
                                            <div class="transaction-percentage">
                                                <h6 class="transaction-title">No Transactions Found</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection