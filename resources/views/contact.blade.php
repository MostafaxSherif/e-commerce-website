@extends('layouts.app')

@section('css-file')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('title')
<title>Contact</title>
@endsection

@section('content')
<div class="contact container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
  </div>
  <div class="row">
    <div class="column">
      <!-- Add a map with latitude and longitude coordinates -->
      <iframe
        width="100%"
        height="400"
        frameborder="0"
        style="border:0"
        src="https://www.openstreetmap.org/export/embed.html?bbox=-0.1276%2C51.5074%2C-0.1276%2C51.5074&amp;layer=mapnik"
        allowfullscreen>
      </iframe>
    </div>
    <div class="column">
      <!-- Form for contacting -->
      <form method="POST" action="{{ route('contact.store') }}">
        @csrf <!-- CSRF token field for security -->
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Your Email">
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
