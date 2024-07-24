@extends('layouts.app')
@section('footer')
@include('layouts.footer')
@endsection
@section('css-file')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection
@section('title')
<title>Office Supplies</title>
@endsection
@section('content')


<div class="container">
  <div class="cards d-flex justify-content-around mt-5 mb-5 row">
    <div class="shop-now position-relative">
      <h5>You may like</h5>


    </div>
    @foreach($items as $item)
    @if($item && $item->category=="Office")

    <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
      <div class="position-relative">
        <a href="{{ route('items.show', $item->id) }}">
          <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->name }}" class="card-img-top" style="width: 100%; height: auto; aspect-ratio: 1/1;">
        </a>
        <a href="#" class="position-absolute bottom-0 end-0" style="transform: translate(-15%, -15%); border-radius: 50%; background-color: white; padding: 10px;"> <!-- Added background-color and padding -->
        <form method="POST" action="{{ route('cart.add', ['item' => $item->id]) }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent"> <!-- Removed button styling -->
                <i class="cart-icon fas fa-solid fa-regular fa-cart-plus fa-2x"></i>
            </button>
        </form>
    </a>
      </div>
      <div class="card-body">
        <h6 class="card-title">{{ $item->name }}</h6>
        <p class="card-price">EGP {{ $item->sale_price }} <del>{{ $item->price }}</del></p>
        <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
        <a class="selling-out">Selling out fast</a>
      </div>
    </div>

    @endif
    @endforeach


  </div>
</div>
</div>
</div>
</div>
<div class="best position-relative">
  <h1>Bestsellers</h1>
</div>
<!-- footer--------------------------------------------------------------------------- -->
<!-- best -->
<div class="container">
@php
        // Convert the collection to an array and shuffle it to get a random order
        $shuffledItems = $items->shuffle();
        @endphp

        <div class="cards d-flex justify-content-around mt-5 mb-5 row">
            @php
            $count = 0;
            @endphp

            @foreach($shuffledItems as $item)
            @if($item->category == "Office" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="position-relative">
                    <a href="{{ route('items.show', $item->id) }}">
                        <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->name }}" class="card-img-top" style="width: 100%; height: auto; aspect-ratio: 1/1;">
                    </a>
                    <a href="#" class="position-absolute bottom-0 end-0" style="transform: translate(-15%, -15%); border-radius: 50%; background-color: white; padding: 10px;"> <!-- Added background-color and padding -->
        <form method="POST" action="{{ route('cart.add', ['item' => $item->id]) }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent"> <!-- Removed button styling -->
                <i class="cart-icon fas fa-solid fa-regular fa-cart-plus fa-2x"></i>
            </button>
        </form>
    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">{{ $item->name }}</h6>
                    <p class="card-price">EGP {{ $item->sale_price }} <del>{{ $item->price }}</del></p>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a class="selling-out">Selling out fast</a>
                </div>
        </div>
        @php
        $count++;
        @endphp
        @endif
        @endforeach
</div>
</div>
</div>
</div>

@endsection