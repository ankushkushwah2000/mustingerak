{{-- <x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="remember">
          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
        @endif

        <x-button class="ml-3">
          {{ __('Log in') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout> --}}
@extends('layouts.guest')
@section('title', 'Login')
@section('page-content')
<!-- Login-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
  <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
    <h2 class="card-title fw-bold mb-1">Make A Login</h2>
    <p class="card-text mb-2">Lorem ipsum dolor sit amet.</p>
    <form method="POST" action="{{ route('login') }}" class="auth-register-form mt-2">
      @csrf
      <div class="mb-1">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" placeholder="john@example.com"
          aria-describedby="email" tabindex="2" value="{{ old('email') }}" />
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-1">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge form-password-toggle">
          <input class="form-control form-control-merge" id="password" type="password" name="password"
            placeholder="············" aria-describedby="password" tabindex="3" />
          <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
        </div>
        @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <button class="btn btn-primary w-100" tabindex="5">Login</button>
    </form>
    <p class="text-center mt-2">
      <span>Don't have an account?</span>
      <a href="{{ route('register') }}"><span>&nbsp;Sign up</span></a>
    </p>
    {{-- <div class="divider my-2">
      <div class="divider-text">or</div>
    </div> --}}
    {{-- <div class="auth-footer-btn d-flex justify-content-center">
      <a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a>
      <a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a>
      <a class="btn btn-google" href="#"><i data-feather="mail"></i></a>
      <a class="btn btn-github" href="#"><i data-feather="github"></i></a>
    </div> --}}
  </div>
</div>
<!-- /Login-->
@endsection