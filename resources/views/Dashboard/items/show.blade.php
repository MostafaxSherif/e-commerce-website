@extends(auth()->check() && auth()->user()->user_type === 'admin' ? 'layouts.dash' : 'layouts.app')

@section('css-file')
<link rel="stylesheet" href="{{ asset('css/view-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">
@endsection

@section('title')
<title>Show Product</title>
@endsection

@section('content')
@if(auth()->check() && auth()->user()->user_type === 'admin')
<header>
    <h1>Show Product</h1>
</header>
@endif

<div class="d-flex flex-wrap">
    <!-- Sidebar -->
    @if(auth()->check() && auth()->user()->user_type === 'admin')
    @include('Dashboard.SideNav')
    @endif

    <div class="view-product">
        <div id="container">
            <div class="product-details">
                <h1>{{$items->name}}</h1>
                <div class="control">
                    <form method="POST" action="{{ route('cart.add', ['item' => $items->id]) }}">
                        @csrf
                        <button type="submit" class="btn-product">
                            <span class="price">{{ $items->sale_price }}LE</span>
                            <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <br>
                            
                            <span class="buy">Add To Cart</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="product-image">
                <img src="{{ asset('storage/'. $items->product_image) }}" alt="{{ $items->name }}">
                <div class="info">
                    <h2>Description</h2>
                    <p class="information">{{$items->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
