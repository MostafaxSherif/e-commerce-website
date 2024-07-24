@extends('layouts.dash')
@section('css-file')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">
@endsection

@section('title')
<title>Customers Dashboard</title>
@endsection

@section('content')
<header>
    <h1>Customers Dashboard</h1>
</header>
<div class="d-flex nav-left-mobile">
    <!-- Sidebar -->
    @include('Dashboard.SideNav')

    <!-- Content -->
    <div class="app-content">
        <div class="products-area-wrapper tableView">
            <div class="products-header">
                <div class="product-cell image">ID</div>
                <div class="product-cell image">Name</div>
                <div class="product-cell price">Email</div>
                <div class="product-cell image">User Type</div>
                <div class="product-cell category">Address</div>
                <div class="product-cell price">Phone Number</div>
                <div class="product-cell action">Created At</div>
                <div class="product-cell action">Actions</div>
            </div>
            @foreach($users as $user)
            <div class="products-row">
                <div class="product-cell category"><span class="cell-label">ID:</span>{{$user->id}}</div>
                <div class="product-cell category"><span class="cell-label">Name:</span>{{$user->name}}</div>
                <div class="product-cell category"><span class="cell-label">Email:</span>{{$user->email}}</div>
                <div class="product-cell category"><span class="cell-label">User Type:</span>{{$user->user_type}}</div>
                <div class="product-cell price"><span class="cell-label">Address:</span>{{$user->address}}</div>
                <div class="product-cell price"><span class="cell-label">Phone Number:</span>{{$user->phone_num}}</div>
                <div class="product-cell price"><span class="cell-label">Created At:</span>{{$user->created_at}}</div>
                <div class="product-cell action">
                    <button type="button" class="btn btn-success">
                        <a href="{{route('users.show', $user->id)}}"><i class="fa fa-eye"></i></a>
                    </button>
                    <button type="button" class="btn btn-warning">
                        <a href="{{route('users.edit', $user->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </button>
                    <form style="display: inline;" method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
