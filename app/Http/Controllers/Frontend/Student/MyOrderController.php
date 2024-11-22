<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use App\Models\MaterialPurchase;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductOrder;

class MyOrderController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $course_purchases = CoursePurchase::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) {
                $item->order_type = 'Course Purchase';
                return $item;
            });

        $product_orders = ProductOrder::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) {
                $item->order_type = 'Product Purchase';
                return $item;
            });

        $material_purchases = MaterialPurchase::where('user_id', $student->id)
            ->where('status', '1')
            ->get()
            ->map(function ($item) {
                $item->order_type = 'Material Purchase';
                return $item;
            });

        $purchases = $course_purchases->concat($product_orders)->concat($material_purchases)->sortByDesc(['date', 'time']);

        return view('frontend.student.my-orders', [
            'purchases' => $purchases,
            'student' => $student
        ]);
    }
}