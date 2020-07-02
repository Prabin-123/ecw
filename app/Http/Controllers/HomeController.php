<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products_model;
use App\Category_model;
use App\Wishlist_model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products_model::all();
        return view('front.home', compact('products'));
    }

    public function shop()
    {
        $products = Products_model::all();
        return view('front.shop', compact('products'));
    }

    public function showCates($id)
    {
        $category_products = Products_model::where('category_id', $id)->get();
        $id_= $id;
        return view('front.category_list_pro', compact('category_products','id_'));
    }

    public function detailpro($id)
    {
        $products = DB::table('products')->where('id',$id)->get();
        return view('front.product_detail', compact('products'));
    }

    public function view_wishList()
    {
        $products = DB::table('wishlist')
            ->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->get();
        return view('front.wishlist', compact('products'));
    }

    public function addWishList(Request $request)
    {
        $wishlist = new Wishlist_model();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->pro_id = $request->pro_id;
        $wishlist->save();
        $products = DB::table('products')->where('id', $request->pro_id)->get();
        return view('front.product_detail', compact('products'));
    }

    public function removewishlist($id)
    {
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();
        return back()->with('msg', 'Item removed form Wishlist');
    }
}
