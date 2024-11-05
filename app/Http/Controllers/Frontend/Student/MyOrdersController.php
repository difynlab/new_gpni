<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductOrder;
use App\Models\ProductOrderDetail;

class MyOrdersController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');
        
        $text = [];

    switch ($language) {
        case 'zh':
            $text = [
                'my_orders' => '我的订单',
                'order_no' => '订单号',
                'amount' => '金额',
                'order_date' => '订单日期',
                'action' => '操作',
                'record_not_available' => '没有记录'
            ];
            break;
        case 'ja':
            $text = [
                'my_orders' => '私の注文',
                'order_no' => '注文番号',
                'amount' => '合計',
                'order_date' => '注文日',
                'action' => 'アクション',
                'record_not_available' => '記録がありません'
            ];
            break;
        default:
            // English as default
            $text = [
                'my_orders' => 'My Orders',
                'order_no' => 'Order No',
                'amount' => 'Amount',
                'order_date' => 'Order Date',
                'action' => 'Action',
                'record_not_available' => 'Record not available'
            ];
            break;
    }

    // Fetch the orders of the logged-in student
    $studentId = Auth::id();
    $orders = ProductOrder::where('student_id', $studentId)->get();

    return view('frontend.student.my-orders', [
        'language' => $language,
        'text' => $text,
        'orders' => $orders
    ]);
    }
}