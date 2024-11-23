<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductOrder;

class MyOrderController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $course_purchases = CoursePurchase::where('user_id', $student->id)->where('status', '1')->get();
        $product_orders = ProductOrder::where('user_id', $student->id)->where('status', '1')->get();

        $purchases = $course_purchases->concat($product_orders)->sortByDesc(['date', 'time']);

        return view('frontend.student.my-orders', [
            'purchases' => $purchases,
            'student' => $student
        ]);
    }
}