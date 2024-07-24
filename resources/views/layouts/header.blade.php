<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  @yield('css-file')
  <link rel="stylesheet" href="https://unpkg.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('title')
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('img') }}/logo.png" alt="Logo" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('Schoolsupplies') }}">School Supplies</a></li>
              <li><a class="dropdown-item" href="{{ route('Officesupplies') }}">Office Supplies</a></li>
              <li><a class="dropdown-item" href="{{ route('Papers') }}">Papers</a></li>
              <li><a class="dropdown-item" href="{{ route('Artcolors') }}">Art & Colors</a></li>
              <li><a class="dropdown-item" href="{{ route('Pens') }}">Pens</a></li>
              <li><a class="dropdown-item" href="{{ route('Measuring') }}">Measuring</a></li>
              <li><a class="dropdown-item" href="{{ route('Toysgifts') }}">Toys & Gifts</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
          </li>
          @if (Route::has('login'))
          @auth
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Log in</a>
          </li>
          @endauth
          @endif
          @if(auth()->check() && auth()->user()->user_type === 'admin')

          <li class="nav-item">
            <a class="nav-link" href="{{route('items.index')}}">Dashboard</a>
          </li>
          @endif



        </ul>
        <div class="right-nav d-flex">
          <form class="d-flex mt-4" role="search">
            <input class="form-control me-2" type="search" placeholder="What are you looking for?" aria-label="Search">
            <a href="{{ route('cart.index') }}">
              <i class="fa-solid fa-cart-shopping m-2"></i>
            </a>
          </form>
        </div>

        @if (Route::has('login'))
        @auth
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }} <!-- Display user's name -->
            <span class="caret"></span> <!-- Dropdown arrow -->
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">{{ __('Show Profile') }}</a></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Log Out') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            <li>

          </ul>
        </div>
        @else
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user m-2"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('login') }}">Log in</a></li>
            @if (Route::has('register'))
            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
            @endif
          </ul>
        </div>
        @endauth
        @endif


      </div>
      <div>

      </div>
    </div>
    </div>
  </nav>
  <!-- End Navbar -->