@extends('layouts.dash')



@section('css-file')
<link rel="stylesheet" href="{{ asset('css/log.css') }}">
@endsection
@section('title')
<title>Log In</title>
@endsection
@section('content')

<div class="row">
  <div class="back col-md-6">
    <img src="{{ asset('img/') }}/login.png" alt="">
  </div>
  <div class="log-form col-md-6">

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="login mb-3">
        <h1>Welcome to Discover</h1>
        <p>Please choose your log in option below</p>
        <label for="email" :value="__('Email')" class="form-label">Email</label>
        <input class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Enter your email address " autofocus autocomplete="username" aria-describedby="emailHelp">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="mb-3">
        <label for="password" :value="__('Password')" class="form-label">Password</label>
        <input id="password" type="password" name="password"  autocomplete="current-password" class="form-control" placeholder="Enter your password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <!-- <div class="mb-3">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
        @endif
      </div> -->
      <button type="submit" class="login-btn btn-primary">login</button>
      <div class="mb-3">
        <span class="text-secondary">Don’t have any account? </span>
        <button type="button" class="btn text-primary" data-toggle="modal" data-target="#exampleModalScrollable"> <a href="{{ route('register') }}">Create Account</a>
        </button>
      </div>
      <hr>
      <div class="text-center">
      <section class="mb-4">
                    <!-- Facebook -->
                    <a class="face btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-facebook-f"></i></a>
                    <!-- Twitter -->
                    <a class="twitter btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-twitter"></i></a>
                    <!-- Instagram -->
                    <a class="instagram btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-instagram"></i></a>
                </section>
      </div>

    </form>
  </div>
</div>
@endsection