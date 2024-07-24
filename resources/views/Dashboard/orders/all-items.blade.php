@extends(auth()->check() && auth()->user()->user_type === 'admin' ? 'layouts.dash' : 'layouts.app')

@section('css-file')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer-details.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer-details2.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">
@endsection

@section('title')
<title>All Cart Items</title>
@endsection

@section('content')
@if(auth()->check() && auth()->user()->user_type === 'admin')
<header>
    <h1>All Cart Items</h1>
</header>
@endif

<div class="d-flex nav-left-mobile">
    @if(auth()->check() && auth()->user()->user_type === 'admin')
    @include('Dashboard.SideNav')
    @endif

    <div class="app-content">
        <div class="col-sm-12 col-lg-12">
            <div class="card card-mobile">
                <div class="row card-body">
                    <div class="products-area-wrapper tableView">
                        <div class="products-header">
                            <div class="product-cell image">ORDER ID</div>
                            <div class="product-cell price">CUSTOMER</div>
                            <div class="product-cell price">Image</div>
                            <div class="product-cell price">Item</div>
                            <div class="product-cell price">Price</div>
                            <div class="product-cell price">Sale Price</div>
                            <div class="product-cell price">Quantity</div>
                            <div class="product-cell price">TOTAL</div>
                            <div class="product-cell price">Address</div>
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
                            <div class="product-cell category"><span class="cell-label"></span>{{ $cartItem->user->name }}</div>
                            <div class="product-cell image">
                            <img src="{{ asset('storage/' . $cartItem->item->product_image) }}" alt="{{ $cartItem->item->name }}">
                        </div>
                            <div class="product-cell category"><span class="cell-label"></span>{{ $cartItem->item->name }}</div>
                            <div class="product-cell category"><span class="cell-label"></span>{{ $cartItem->item->price }}</div>
                            <div class="product-cell price"><span class="cell-label"></span>{{ $cartItem->item->sale_price }}</div>
                            <div class="product-cell price"><span class="cell-label"></span>{{ $cartItem->quantity }}</div>
                            <div class="product-cell price"><span class="cell-label"></span>{{ $cartItem->quantity * $cartItem->item->sale_price }}</div>
                            <div class="product-cell category"><span class="cell-label"></span>{{ $cartItem->user->address }}</div>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
