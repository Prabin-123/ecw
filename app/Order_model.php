<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Order_model extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['status', 'total', 'user_id'];

    public function orderFields()
    {
        return $this->belongsToMany(Products_model::class)->withPivot('qty', 'total');
    }

    public static function createOrder()
    {
        $user = Auth::user();
        $order = $user->orders()->create(['total'=>Cart::total(), 'status'=>'pending']);
        $cartItems = Cart::content();

        foreach($cartItems as $cartItem){
            $order->orderFields()->attach($cartItem->id, 
                ['qty'=>$cartItem->qty, 'tax'=>Cart::tax(), 'total'=>$cartItem->qty * $cartItem->price]);
        }
    }
}
