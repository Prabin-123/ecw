@extends('front.master')

@section('title', 'Shop Page')

@section('content')
<main role="main">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">E-Commerce Website</h1>
          <p class="lead">This is e-commerce site developed using php laravel.</p>
        </div>
      </div>
    <div class="album py-5 bg-light">
        <div class="container">
  
          <div class="row">
            @forelse ($products as $product)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" alt="Card image cap" src="{{ url('images', $product->image) }}" height="200px">
                <div class="card-body">
                  <p class="card-text">{{ $product->pro_name }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ url('/productDetail',$product->id) }}" class="btn btn-sm btn-outline-secondary">View Product</a>
                      <a href="{{ url('/cart/addItem', $product->id) }}" class="btn btn-sm btn-outline-secondary">Add to Cart <i class="fa fa-shopping-cart"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
                <h3>No Product</h3>
            @endforelse
          </div>
        </div>
    </div>
</main>
@endsection