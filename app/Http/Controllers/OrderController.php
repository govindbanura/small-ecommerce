<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function genTracking()
    {
        do {
            $refrence_id = mt_rand( 1000000000, 9999999999 );
        } while ( Order::where( 'tracking_id', $refrence_id )->exists() );

        return ('ORD'. strval($refrence_id));
    }

    public function view_checkout_page(){
        $user_id = Auth::id();
        $items = Cart::all()->where('user_id',$user_id);
        $categories= Category::all();
        // $products= Product::all();
        $no_items = $items->count();
        return view('checkout', compact('items', 'categories','no_items'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'fname'=> 'required',
            'lname'=> 'required',
            'email'=> 'required|email',
            'mobile'=> 'required|numeric|digits:10',
            'address1'=> 'required',
            'country'=> 'required',
            'city'=> 'required',
            'state'=> 'required',
            'pincode'=> 'required|numeric|digits:6',
        ]);

        $order = new Order();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->mobile = $request->mobile;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->pincode = $request->pincode;
        $order->tracking_id = $this->genTracking();
        $order->user_id = Auth::id();
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item){
            if($item->products->sale_price) $price = $item->products->sale_price; else $price = $item->products->regular_price;
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_qty' => $item->product_qty,
                'product_price' => $price
            ]);
        }

        Cart::destroy($cartItems);

        session()->flash('success', 'Order Place Successfully with order id '.$order->tracking_id);

        return redirect()->back();
    }
}
