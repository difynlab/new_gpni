<?php

use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseFinalExam;
use App\Models\CourseModule;
use App\Models\CourseModuleExam;
use App\Models\CoursePurchase;
use App\Models\MembershipPurchase;
use App\Models\Product;
use App\Models\User;

if(!function_exists('hasUserPurchasedCourse')) {
    function hasUserPurchasedCourse($user_id, $course_id)
    {
        $user = User::find($user_id);
        $course = Course::find($course_id);

        if(!$user || !$course) {
            return false;
        }

        return CoursePurchase::where('user_id', $user_id)->where('course_id', $course_id)->where('payment_status', 'Completed')->where('status', '1')->exists();
    }
}

if(!function_exists('hasUserAddedToCart')) {
    function hasUserAddedToCart($user_id, $product_id)
    {
        $user = User::find($user_id);
        $product = Product::find($product_id);

        if(!$user || !$product) {
            return false;
        }

        return Cart::where('user_id', $user_id)->where('product_id', $product_id)->where('status', 'Active')->exists();
    }
}

if(!function_exists('hasStudentCompletedModuleExam')) {
    function hasStudentCompletedModuleExam($user_id, $course_id, $course_module_id)
    {
        $user = User::find($user_id);
        $course = Course::find($course_id);
        $course_module = CourseModule::find($course_module_id);

        if(!$user || !$course || !$course_module) {
            return false;
        }

        return CourseModuleExam::where('user_id', $user_id)->where('course_id', $course_id)->where('module_id', $course_module_id)->where('status', '1')->exists();
    }
}

if(!function_exists('hasStudentCompletedAllModuleExams')) {
    function hasStudentCompletedAllModuleExams($user_id, $course_id)
    {
        $user = User::find($user_id);
        $course = Course::find($course_id);

        if(!$user || !$course) {
            return false;
        }

        $course_modules = CourseModule::where('course_id', $course_id)->where('module_exam', 'Yes')->where('status', '1')->pluck('id')->toArray();

        $passed_modules_count = CourseModuleExam::where('user_id', $user_id)
        ->where('course_id', $course_id)
        ->whereIn('module_id', $course_modules)
        ->where('status', '1')
        ->where('result', 'Pass')
        ->count();

        $all_modules_passed = $passed_modules_count === count($course_modules);

        return $all_modules_passed;
    }
}

if(!function_exists('hasStudentCompletedFinalExam')) {
    function hasStudentCompletedFinalExam($user_id, $course_id)
    {
        $user = User::find($user_id);
        $course = Course::find($course_id);

        if(!$user || !$course) {
            return false;
        }

        return CourseFinalExam::where('user_id', $user_id)->where('course_id', $course_id)->where('status', '1')->exists();
    }
}

if(!function_exists('hasUserPurchasedMembership')) {
    function hasUserPurchasedMembership($user_id)
    {
        $user = User::find($user_id);

        if(!$user) {
            return false;
        }

        return MembershipPurchase::where('user_id', $user_id)->where('payment_status', 'Completed')->where('status', '1')->exists();
    }
}

if(!function_exists('hasUserSelectedCorrectLanguage')) {
    function hasUserSelectedCorrectLanguage($user_id, $middleware_language_name)
    {
        $user = User::find($user_id);

        if(!$user) {
            return false;
        }

        if($user->language == $middleware_language_name) {
            return true;
        }

        return false;
    }
}