<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories= Category::all();
        $products= Product::all();

        if(Auth::check()){
            $user_id = Auth::id();
            $cart = Cart::all()->where('user_id',$user_id);
            $no_items = $cart->count();
            return view('welcome', compact('categories','products','no_items'));
        }else{
            $no_items = 0;
            return view('/welcome',compact('categories','products','no_items'));
        }
    }
    public function products_category($id)
    {
        $category = Category::find($id);
        $categories= Category::all();
        $products = Product::all()->where('category_id',$id);

        if(Auth::check()){
            $user_id = Auth::id();
            $cart = Cart::all()->where('user_id',$user_id);
            $no_items = $cart->count();
            return view('products', compact('category', 'products', 'categories', 'no_items'));
        }else{
            $no_items = 0;
            return view('products', compact('category', 'products', 'categories', 'no_items'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        $categories= Category::all();
        if(Auth::check()){
            $user_id = Auth::id();
            $cart = Cart::all()->where('user_id',$user_id);
            $no_items = $cart->count();
            return view('product_details', compact('product','category','categories','no_items'));
        }else{
            $no_items = 0;
            return view('product_details', compact('product','category','categories','no_items'));
        }
    }
}

