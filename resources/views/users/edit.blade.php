@extends('layouts.dash')
@section('css-file')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">


@endsection
@section('title')
<title>Edit Customer</title>
@endsection
@section('content')
<header>
    <h1>Edit Customer</h1>
</header>
<div class="d-flex nav-left-mobile">
    @if(auth()->check() && auth()->user()->user_type === 'admin')
    @include('Dashboard.SideNav')
    @endif

    <div class="container">
        <div class="form-edit">
            <div class="">
                <form method="POST" action="{{ route('users.update', $users->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $users->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" value="{{ $users->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Leave blank to keep current">
                    </div>
                    @if(auth()->check() && auth()->user()->user_type === 'admin')
                    <div class="mb-3">
                        <label for="user_type">Select User Type:</label>
                        <select name="user_type" id="user_type" class="form-select">
                            <option value="user" {{ $users->user_type === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $users->user_type === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input name="address" class="form-control" type="text" value="{{$users->address}}"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input name="phone_num" type="number" class="form-control" value="{{$users->phone_num}}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




</div>




</div>
@endsection
