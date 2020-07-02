<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Address_model;
use App\Order_model;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::content();
            return \view('cart.checkout', \compact('cartItems'));
        }else{
            return \redirect('login');
        }
    }

    public function address(Request $request)
    {
        $this->validate($request, [
            'fullname'=>'required|min:5|max:35',
            'pincode'=>'required|numeric',
            'city'=>'required|min:5|max:35',
            'state'=>'required|min:5|max:35',
            'country'=>'required',
        ]);
        $request['user_id']=Auth::user()->id;
        // dd($request);
        Address_model::create($request->all());
        Order_model::createOrder();
        Cart::destroy();
        return view('profile.thankyou');
    }
}
