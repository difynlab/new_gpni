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

        $course_purchases = CoursePurchase::where('student_id', $student->id)->where('status', '1')->get();
        $product_orders = ProductOrder::where('student_id', $student->id)->where('status', '1')->get();

        $merge = $course_purchases->merge($product_orders);
        $purchases = $merge->sortByDesc(['date', 'time']);

        return view('frontend.student.my-orders', [
            'purchases' => $purchases,
            'student' => $student
        ]);
    }
}