@extends('layouts.guest')
@section('page-content')
<!-- Register-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">Start a new journey</h2>
        <p class="card-text mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
        @auth
        <a href="{{ route('dashboard') }}" class="btn btn-primary w-100" tabindex="5" type="submit">Dashboard</a>
        @endauth

        @guest
        <a href="{{ route('login') }}" class="btn btn-primary w-100" tabindex="5" type="submit">Login</a>
        <div class="divider my-2">
            <div class="divider-text">or</div>
        </div>
        <a href="{{ route('register') }}" class="btn btn-primary w-100" tabindex="5" type="submit">Register</a>
        @endguest
    </div>
</div>
<!-- /Register-->
@endsection