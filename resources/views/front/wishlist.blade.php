@extends('front.master')
@section('title', 'Wishlist Page')
@section('content')
    <div class="container">
        <br>
        <div class="col-md-12 col-sm-12">
            <h3 style="text-align: center; text-decoration:underline;">Wishlist Products</h3>
            <br>
            @if(session('msg'))
                <div class="alert alert-success">
                    {{session('msg')}}
                </div>
            @endif
            <div class="row">
                <?php if ($products->isEmpty()) { ?>
                    <h4 style="text-align: center;">Sorry, Products not found.</h4>
                <?php }else{ ?>
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-3" style="padding-bottom: 20px;">
                        <div class="text-center badge badge-light">
                            <a href="{{url('/product_details', $product->id)}}">
                                <img src="{{url('images', $product->image)}}" alt="" width="200">
                            </a>
                            <h2>$ {{$product->pro_price}}</h2>
                            <p><a href="{{url('/product_details', $product->id)}}">
                                {{$product->pro_name}}
                            </a></p>
                            <a href="{{ url('/cart/addItem', $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                            <a href="{{url('/removeWishList', $product->id)}}" style="color: red;" class="btn btn-default btn-block">
                                <i class="fa fa-minus-square"></i>Remove from WishList</a>
                        </div>
                    </div>
                @endforeach
                <?php } ?>
            </div>
        </div>
    </div>
@endsection