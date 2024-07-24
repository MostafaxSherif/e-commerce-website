@extends(auth()->check() && auth()->user()->user_type === 'admin' ? 'layouts.dash' : 'layouts.app')

@section('css-file')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer-details.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer-details2.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">
@endsection

@section('title')
<title>Show Customer</title>
@endsection

@section('content')
@if(auth()->check() && auth()->user()->user_type === 'admin')
<header>
    <h1>Show Customer</h1>
</header>
@endif

<div class="d-flex nav-left-mobile">
    @if(auth()->check() && auth()->user()->user_type === 'admin')
    @include('Dashboard.SideNav')
    @endif

    <div class="app-content">
        <div class="col-sm-12 col-lg-6">
            <div class="card card-mobile">
                <div class="row card-body">
                    <h5 class="col-sm-12 col-lg-3 card-title"><img src="{{ asset('img/User.webp') }}" alt=""></h5>
                    <div class="col-sm-12 col-lg-3">
                        <h1 class="card-text">{{ $user->name }}</h1>
                        <div class="email">
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="personal-info col-sm-12 col-lg-3">
                        <h3>Personal Information</h3>
                        <div>
                            <p>Contact Number: <span>{{ $user->phone_num }}</span></p>
                            <p>Member Since: <span>{{ $user->created_at }}</span></p>
                        </div>
                    </div>
                    <div class="personal-info col-sm-12 col-lg-2">
                        <h3>Shipping Address</h3>
                        <div>
                            <p>{{ $user->address }}</p>
                        </div>
                    </div>
                    <div class="row profile-btns">
                        @if(auth()->check() && auth()->user()->user_type === 'admin')
                        <div class="col text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-submit">Edit</a>
                        </div>
                        @endif
                        <div class="col text-center">
                            <form style="display: inline;" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-submit" style="background-color: red;">{{ __('Delete User') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                @if(auth()->check() && auth()->user()->user_type === 'admin')
                <div class="products-area-wrapper tableView">
                    <div class="products-header">
                        <div class="product-cell image">ORDER ID</div>
                        <div class="product-cell price">Image</div>
                        <div class="product-cell price">Item</div>
                        <div class="product-cell price">Price</div>
                        <div class="product-cell price">Sale Price</div>
                <div class="product-cell price">Quantity</div>
                        <div class="product-cell price">TOTAL</div>
                        <div class="product-cell action">ACTION</div>
                    </div>

                    @foreach ($cartItems as $cartItem)
                    <div class="products-row">
                        <button class="cell-more-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>
                        <div class="product-cell image"><span>{{ $cartItem->id }}</span></div>
                        <div class="product-cell image">
                            <img src="{{ asset('storage/' . $cartItem->item->product_image) }}" alt="{{ $cartItem->item->name }}">
                        </div>
                        <div class="product-cell category"><span class="cell-label"></span>{{ $cartItem->item->name }}</div>
                        <div class="product-cell category"><span class="cell-label"></span>{{ $cartItem->item->price }}</div>
                        <div class="product-cell price"><span class="cell-label"></span>{{ $cartItem->item->sale_price }}</div>
                        <div class="product-cell price"><span class="cell-label"></span>{{ $cartItem->quantity }}</div>
                        <div class="product-cell price"><span class="cell-label"></span>{{ $cartItem->quantity * $cartItem->item->sale_price }}</div>
                        <div class="action product-cell action">
                            <form action="{{ route('cart.delete', $cartItem) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
