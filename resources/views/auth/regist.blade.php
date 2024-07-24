@extends('layouts.dash')
@section('css-file')
<link rel="stylesheet" href="{{ asset('css/log.css') }}">
@endsection
@section('title')
<title>Sign Up</title>
@endsection
@section('content')

<div class="row">
  <div class="back col-md-6 col-12">
    <img src="{{ asset('img') }}/login.png" alt="logo">
  </div>
  <div class="col-md-6 col-12">
    <div class="register-form">
        <h1 class="mt-4">Create your Account</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
      <div class="mb-3">
        <label for="name" :value="__('Name')" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" :value="old('name')" aria-describedby="emailHelp">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div class="mb-3">
        <label for="email" :value="__('Email')" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" type="email" name="email" :value="old('email')" aria-describedby="emailHelp">
      </div>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
      <div class="mb-3">
        <label for="address" :value="__('address')" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" :value="old('address')" aria-describedby="emailHelp">
      <x-input-error :messages="$errors->get('address')" class="mt-2" />
      </div>
      <div class="mb-3">
        <label for="phone_num" :value="__('phone_num')" class="form-label">Phone number</label>
        <input type="text" class="form-control" id="phone_num" name="phone_num" :value="old('phone_num')" aria-describedby="emailHelp">
      <x-input-error :messages="$errors->get('phone_num')" class="mt-2" />
      </div>
      <div class="mb-3">
        <label for="password" :value="__('Password')" class="form-label">Password</label>
        <input type="password" class="form-control" id="password"
                            type="password"
                            name="password">
      </div>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
      <div class="mb-3">
        <label for="password" :value="__('Confirm Password')" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password"
                            type="password"
                            name="password_confirmation" autocomplete="new-password">
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
      <button type="submit" class="login-btn btn-primary">{{ __('Register') }}</button>
    </form>
    <div class="mb-3">
        <span class="text-secondary">Already have an account? </span>
        <button type="button" class="btn text-primary" data-toggle="modal" data-target="#exampleModalScrollable"> <a href="{{ route('login') }}">Login</a>
        </button>
</div>
</div>
</div>
</div>
        <!--  -->
@endsection
