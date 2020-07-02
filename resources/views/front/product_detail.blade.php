@extends('front.master')
@section('title', 'Product Detail')

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 col-xs-12">
                    <div class="thumbnail">
                        <img src="{{ url('images', $product->image) }}" class="card-img">
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h2><?php echo ucwords($product->pro_name) ?></h2>
                    <h5>{{ $product->pro_info }}</h5>
                    <h2>$ {{ $product->spl_price }}</h2>
                    <p><b>Available: {{ $product->stock }} In Stock</b></p>
                    <a href="{{ url('/cart/addItem', $product->id) }}" class="btn btn-sm btn-outline-secondary">Add to Cart <i class="fa fa-shopping-cart"></i></a>
                    <br><br>
                    <?php
                        $wishlistData=DB::table('wishlist')->rightJoin('products', 'wishlist.pro_id', '=', 'products.id')
                            ->where('wishlist.pro_id', '=', $product->id)->get();
                            $count = App\Wishlist_model::where(['pro_id'=>$product->id])->count();
                        if($count=="0"){
                    ?>
                    <form action="{{route('addToWishlist')}}" method="POST" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="pro_id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-default">Add To Wishlist</button>
                    </form>
                    <?php }else{ ?>
                        <h3 style="color: green;">Already Added to <a href="{{url('/wishlist')}}">Wishlist</a></h3>
                    <?php } ?>
                </div>
            @endforeach
        </div>
    </div>
@endsection