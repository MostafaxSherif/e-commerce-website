@extends('layouts.dash')
@section('css-file')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">


@endsection
@section('title')
<title>Create Customer</title>
@endsection
@section('content')
<header>
    <h1>Create Customer</h1>
</header>
<div class="d-flex nav-left-mobile">
    <!-- Sidebar -->
    @include('Dashboard.SideNav')


    <div class="container">
        <div class="form-edit">
            <div class="">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="mb-3">
                        <label for="user_type">Select User Type:</label>
                        <select name="user_type" id="user_type" class="form-select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input name="address" class="form-control" type="text">{{ old('address') }}</input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input name="phone_num" type="number" class="form-control" value="{{ old('phone_num') }}">
                    </div>




                    <div class="text-center">
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>
@endsection
