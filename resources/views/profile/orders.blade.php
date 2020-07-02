@extends('front.master')
@section('title', 'Orders Page')
@section('content')
<style>
    table td { padding:10px; }
</style>
    <section id="cart_items">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-4 well well-sm">     
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Profile Menu</div>
                        <div class="card-body">
                            @include('profile.menu')
                        </div>
                      </div>
                </div>
                <div class="col-md-8">
                    <h3><span style="color: green;">{{ucwords(Auth::user()->name)}}</span>, Your Order</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{ucwords($order->pro_name)}}</td>
                                        <td>{{$order->pro_code}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->status}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection