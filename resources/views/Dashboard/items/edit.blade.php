@extends('layouts.dash')

@section('css-file')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashnav.css') }}">

@section('title')
<title>Edit Product</title>
@endsection

@section('content')
<header>
    <h1>Edit Product</h1>
</header>
<div class="d-flex nav-left-mobile">
    <!-- Sidebar -->
    @include('Dashboard.SideNav')

    <div class="container">
        <div class="form-edit">
            <div class="">
                <form method="POST" action="{{ route('items.update', $items->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-image mb-3">
                        <div class="image-container">
                            @if($items->product_image)
                            <img src="{{ asset('storage/' . $items->product_image) }}" alt="{{ $items->name }}">
                            @endif
                        </div>
                        <label for="file-input" class="file-label">Choose Image</label>
                        <input id="file-input" name="product_image" type="file" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $items->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $items->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" value="{{ $items->price }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sale Price</label>
                        <input name="sale_price" type="number" class="form-control" value="{{ $items->sale_price }}">
                    </div>



                    <div class="mb-3">
                        <label for="selected_value">Select a category:</label>
                        <select name="category" id="selected_value" class="form-select">
                            <option value="Art">Art</option>
                            <option value="Measuring">Measuring</option>
                            <option value="Office">Office</option>
                            <option value="Papers">Papers</option>
                            <option value="Pens">Pens</option>
                            <option value="School">School</option>
                            <option value="Toys">Toys</option>
                        </select>
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
