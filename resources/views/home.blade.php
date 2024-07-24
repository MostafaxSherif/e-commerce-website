@extends('layouts.app')
@section('css-file')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('title')
<title>Home</title>
@endsection
@section('content')

<!-- -------------------------------Start header---------------------------------------------- -->

<div class="header">
    <div class="d-flex justify-content-around flex-column flex-md-row row">
        <div class="left-header text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p class="back-to-school">BACK TO SCHOOL</p>
            <p class="special-offer">{{ $specialOffer }}</p>
            <p class="product-solution">"Discover the Perfect Product Library Solution for Your Distribution Company"</p>
            <a href="{{ route('login') }}" class="text-decoration-none"><button class="">Shop now</button></a>
        </div>
        <div class="right-header text-center col-lg-6 col-md-6 col-sm-12 col-xs-12 row">
            <img class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12" src="{{ asset('img/') }}/header2.png" alt="">
        </div>
    </div>
</div>


<!-- ------------------------------- End header---------------------------------------------- -->
<div class="container">
    <div class="slideshow-wrapper">
        <div class="slideshow-container">
            <div class="slides-container text-center">
                <div class="slide ">
                    <a href="{{ route('Schoolsupplies') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/School.png" alt="books">
                        <h1>School Supplies</h1>
                    </a>
                </div>
                <div class="slide ">
                    <a href="{{ route('Officesupplies') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/office.jpeg" alt="Image 1">
                        <h1>Office Supplies</h1>
                    </a>
                </div>
                <div class="slide ">
                    <a href="{{ route('Papers') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/Papers.png" alt="Image 1">
                        <h1>Papers</h1>
                    </a>
                </div>
                <div class="slide ">
                    <a href="{{ route('Artcolors') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/Art.png" alt="Image 1">
                        <h1>Art & Colors</h1>
                    </a>
                </div>
                <div class="slide ">
                    <a href="{{ route('Pens') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/Pens.png" alt="Image 1">
                        <h1>Pens</h1>
                    </a>
                </div>
                <div class="slide ">
                    <a href="{{ route('Measuring') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/Mesuring.png" alt="Image 1">
                        <h1>Measuring</h1>
                    </a>
                </div>
                <div class="slide tex">
                    <a href="{{ route('Toysgifts') }}" class="text-decoration-none" style="color: black;">
                        <img src="{{ asset('img/') }}/Toys.png" alt="Image 1">
                        <h1>Toys & Gifts</h1>
                    </a>
                </div>
            </div>
        </div>
        <a class="prev" onclick="prevSlide()"><i class="fas fa-chevron-left"></i></a>
        <a class="next" onclick="nextSlide()"><i class="fas fa-chevron-right"></i></a>
    </div>
</div>

<script src="textanimation.js"></script>

<!-- ----------------------------------------cards 1 ------------------------------------------------------->


<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For Office Supplies</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Officesupplies') }}">See All</a></div>
        </div>
    </div>

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


<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For School Supplies</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Schoolsupplies') }}">See All</a></div>
        </div>
    </div>

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
            @if($item->category == "School" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
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


<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For Art & Colors</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Artcolors') }}">See All</a></div>
        </div>
    </div>

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
            @if($item->category == "Art" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
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


<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For Papers</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Papers') }}">See All</a></div>
        </div>
    </div>

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
            @if($item->category == "Papers" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
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

<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For Pens</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Pens') }}">See All</a></div>
        </div>
    </div>

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
            @if($item->category == "Pens" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
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

<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For Measuring</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Measuring') }}">See All</a></div>
        </div>
    </div>

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
            @if($item->category == "Measuring" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
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

<div>
    <div class="office-supplies ">
        <div class="container d-flex justify-content-between mt-5 row text-center">
            <div class="left-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <p>Check More Products For Toys & Gifts</p>
            </div>
            <div class="right-side mt-2 col-lg-6 col-md-12 col-sm-12 col-xs-12 "><a class="text-decoration-none" href="{{ route('Toysgifts') }}">See All</a></div>
        </div>
    </div>

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
            @if($item->category == "Toys" && $count < 4) <div class="card m-2 col-lg-4 col-md-6 col-sm-12 col-xs-12">
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

@endsection
