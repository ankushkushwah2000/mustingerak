{{-- <x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
          required />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <x-button class="ml-4">
          {{ __('Register') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout> --}}
@extends('layouts.guest')
@section('title', 'Register')
@section('page-content')
<!-- Register-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
  <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
    <h2 class="card-title fw-bold mb-1">Join Us</h2>
    <p class="card-text mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
    <form method="POST" action="{{ route('register') }}" class="auth-register-form mt-2">
      @csrf
      <div class="mb-1">
        <label class="form-label" for="name">Name</label>
        <input class="form-control" id="name" type="text" name="name" placeholder="johndoe" aria-describedby="name"
          autofocus="" tabindex="1" value="{{ old('name') }}" />
        @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-1">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" placeholder="john@example.com"
          aria-describedby="email" tabindex="2" value="{{ old('email') }}" />
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-1">
        <label class="form-label" for="phone">Phone</label>
        <input class="form-control" id="phone" type="phone" name="phone" placeholder="e.g. 98XXXXXXXX"
          aria-describedby="phone" tabindex="2" value="{{ old('phone') }}" />
        @error('phone')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-1">
        <label class="form-label" for="role">Role</label>
        <select name="role" id="" class="form-control">
          @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ Str::ucfirst($role->title) }}</option>
          @endforeach
        </select>
        @error('role')
        <small class="text-danger">{{ $message }}</small>
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
      <div class="mb-1">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <div class="input-group input-group-merge form-password-toggle">
          <input class="form-control form-control-merge" id="password_confirmation" type="password_confirmation"
            name="password_confirmation" placeholder="············" aria-describedby="password" tabindex="4" />
          <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
        </div>
        @error('password_confirmation')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="mb-1">
        <div class="form-check">
          <input class="form-check-input" id="register-privacy-policy" type="checkbox" tabindex="4" required />
          <label class="form-check-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy policy &
              terms</a></label>
        </div>
      </div>
      <button class="btn btn-primary w-100" tabindex="5" type="submit">Sign up</button>
    </form>
    <p class="text-center mt-2">
      <span>Already have an account?</span>
      <a href="{{ route('login') }}"><span>&nbsp;Sign in</span></a>
    </p>
    {{-- <div class="divider my-2">
      <div class="divider-text">or</div>
    </div>
    <div class="auth-footer-btn d-flex justify-content-center">
      <a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a>
      <a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a>
      <a class="btn btn-google" href="#"><i data-feather="mail"></i></a>
      <a class="btn btn-github" href="#"><i data-feather="github"></i></a>
    </div> --}}
  </div>
</div>
<!-- /Register-->
@endsection