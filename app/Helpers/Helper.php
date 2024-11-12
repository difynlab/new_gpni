<?php

use App\Models\Cart;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\User;

if(!function_exists('hasUserPurchasedCourse')) {
    function hasUserPurchasedCourse($student_id, $course_id)
    {
        $user = User::find($student_id);
        $course = Course::find($course_id);

        if(!$user || !$course) {
            return false;
        }

        return CoursePurchase::where('student_id', $student_id)->where('course_id', $course_id)->where('status', '1')->exists();
    }
}

if(!function_exists('hasUserAddedToCart')) {
    function hasUserAddedToCart($user_id, $product_id)
    {
        $user = User::find($user_id);
        $product = Course::find($product_id);

        if(!$user || !$product) {
            return false;
        }

        return Cart::where('user_id', $user_id)->where('product_id', $product_id)->where('status', 'Active')->exists();
    }
}