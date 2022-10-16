<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user_id = Auth::id();
        $cart = Cart::all()->where('user_id',$user_id);
        $categories= Category::all();
        // $products= Product::all();
        $no_items = $cart->count();
        return view('cart', compact('cart', 'categories','no_items'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'product_id'=> 'required',
            'qty'=> 'required',
        ]);

        $product_id = $request->product_id;
        $product_qty = $request->qty;
        $user_id = Auth::id();

        $product = Product::find($product_id);
        if (Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists()){
            session()->flash('error', 'This product is already in the cart.');
            return redirect()->back();
        }else{
            $cartItem = new Cart();
            $cartItem->product_id = $product_id;
            $cartItem->user_id = $user_id;
            $cartItem->product_qty = $product_qty;
            $cartItem->save();

            session()->flash('success', 'Product added to the cart.');
            return redirect()->back();
        }
    }
    public function destroy(Cart $id)
    {
        $id->delete();

        session()->flash('success', 'Deleted Successfully');

        return redirect()->back();
    }

}
