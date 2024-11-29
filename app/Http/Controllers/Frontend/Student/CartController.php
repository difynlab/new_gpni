<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';
        $items = Cart::where('user_id', $user->id)->where('status', 'Active')->get();

        $shipping_cost = 0;
        foreach($items as $key => $item) {
            $item->product = Product::find($item->product_id);
            $shipping_cost += Product::find($item->product_id)->shipping_cost;
        }

        $item_ids = $items->pluck('product_id')->toArray();
        $other_products = Product::whereNotIn('id', $item_ids)->inRandomOrder()->limit(4)->get();

        return view('frontend.pages.carts', [
            'items' => $items,
            'other_products' => $other_products,
            'shipping_cost' => $shipping_cost,
            'currency_symbol' => $currency_symbol,
        ]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $product = Product::find($request->product_id);

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = 1;
        $cart->price = $product->price;
        $cart->total_price = $product->price;
        $cart->status = '1';
        $cart->save();

        return redirect()->back();
    }

    public function updateQuantity(Request $request)
    {
        $user = Auth::user();
        $items = Cart::where('user_id', $user->id)->where('status', 'Active')->get();

        $shipping_cost = 0;
        foreach($items as $item) {
            $shipping_cost += Product::find($item->product_id)->shipping_cost;
        }


        $item = Cart::find($request->item_id);
        if($item) {
            $item->quantity = $request->quantity;
            $item->total_price = $request->quantity * $item->price;
            $item->save();

            $cart_total_price = Cart::where('user_id', Auth::id())->where('status', 'Active')->sum('total_price');
            
            return response()->json([
                'success' => true,
                'item_total_price' => number_format($item->total_price, 2),
                'sub_total_price' => number_format($cart_total_price, 2),
                'cart_total_price' => number_format($cart_total_price + $shipping_cost, 2)
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function destroy(Request $request)
    {
        $item = Cart::find($request->item_id);

        if($item) {
            $item->status = 'Abandoned';
            $item->save();
            
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}