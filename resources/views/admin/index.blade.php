@extends('admin.master')

@section('title', 'Index Page')
    
@section('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <br>
    <h2 style="text-align: center;">Welcome to our e-commerce website</h2>
    <div class="img-responsive text-center"><img src="{{ asset('images/logo.png') }}" alt=""></div>
  </main>

@endsection