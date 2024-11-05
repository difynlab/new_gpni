<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCategory;

class CartController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');
        
        $text = [];
    
    switch ($language) {
        case 'zh':
            $text = [
                'items' => '项目',
                'order_summary' => '订单摘要',
                'no_of_items' => '商品数量：',
                'shipping_fee' => '运费：',
                'sub_total' => '小计：',
                'total' => '总计：',
                'place_order' => '下订单',
                'we_accept' => '我们接受',
                'you_may_also_like' => '你可能还喜欢'
            ];
            break;
        case 'ja':
            $text = [
                'items' => '商品',
                'order_summary' => '注文概要',
                'no_of_items' => '商品の数：',
                'shipping_fee' => '送料：',
                'sub_total' => '小計：',
                'total' => '合計：',
                'place_order' => '注文する',
                'we_accept' => '私たちは受け入れます',
                'you_may_also_like' => 'あなたが好きかもしれません'
            ];
            break;
        default:
            // English as default
            $text = [
                'items' => 'Items',
                'order_summary' => 'Order summary',
                'no_of_items' => 'No. of items:',
                'shipping_fee' => 'Shipping fee:',
                'sub_total' => 'Sub total:',
                'total' => 'Total:',
                'place_order' => 'Place Order',
                'we_accept' => 'We accept',
                'you_may_also_like' => 'You may also like'
            ];
            break;
    }
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get(); // Get cart items

         // Fetch products to show in the "You may also like" section, excluding the ones in the cart
        $cartProductIds = $cartItems->pluck('product_id')->toArray(); // Get product IDs in the cart
        $otherProducts = Product::whereNotIn('id', $cartProductIds)->inRandomOrder()->limit(4)->get(); // Fetch random products excluding cart items

        return view('frontend.student.cart', compact('text', 'language', 'cartItems', 'otherProducts'));

    }
}