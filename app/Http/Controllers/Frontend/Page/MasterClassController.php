<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\FAQ;
use App\Models\MasterClassContent;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterClassController extends Controller
{
    public function index(Request $request)
    {
        $contents = MasterClassContent::find(1);
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('type', 'Master Class')->where('status', '1')->get();
        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('type', 'Master Class')->where('status', '1')->get();
        }

        $all_courses = $request->master_class ? Course::where('title', 'like', '%' . $request->master_class . '%')->where('language', $request->middleware_language_name)->where('type', 'Masters')->where('status', '1')->paginate(6) : Course::where('language', $request->middleware_language_name)->where('type', 'Masters')->where('status', '1')->paginate(6);
        // if($all_courses->isEmpty() && $request->middleware_language_name != 'English') {
        //     $all_courses = Course::where('language', 'English')->where('type', 'Masters')->where('status', '1')->paginate(6);
        // }

        $upcoming_courses = $request->master_class ? Course::where('title', 'like', '%' . $request->master_class . '%')->where('language', $request->middleware_language_name)->where('type', 'Upcoming')->where('status', '1')->paginate(6) : Course::where('language', $request->middleware_language_name)->where('type', 'Upcoming')->where('status', '1')->paginate(6);
        // if($upcoming_courses->isEmpty() && $request->middleware_language_name != 'English') {
        //     $upcoming_courses = Course::where('language', 'English')->where('course_status', 'Upcoming')->where('type', 'Masters')->where('status', '1')->paginate(6);
        // }

        $testimonials = Testimonial::where('language', $request->middleware_language_name)->where('type', 'Master Class')->where('status', '1')->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')->where('type', 'Master Class')->where('status', '1')->get();
        }

        return view('frontend.pages.master-classes.index', [
            'contents' => $contents,
            'faqs' => $faqs,
            'all_courses' => $all_courses,
            'upcoming_courses' => $upcoming_courses,
            'testimonials' => $testimonials,
            'currency_symbol' => $currency_symbol,
            'master_class' => $request->master_class
        ]);
    }

    public function show(Request $request, Course $course)
    {
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->get();
        }

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('type', 'Master Class')->where('status', '1')->get();
        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('type', 'Master Class')->where('status', '1')->get();
        }

        $settings = Setting::find(1);

        return view('frontend.pages.master-classes.show', [
            'course' => $course,
            'advisory_boards' => $advisory_boards,
            'faqs' => $faqs,
            'settings' => $settings,
            'currency_symbol' => $currency_symbol
        ]);
    }

    public function checkout(Request $request)
    {
        if($request->middleware_language == 'en') {
            $currency = 'usd';
        }
        elseif($request->middleware_language == 'zh') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $user = Auth::user();
        $course = Course::find($request->course_id);
        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        if($course->price >= $wallet_balance) {
            $amount = $course->price - $wallet_balance;
        }
        else {
            $amount = '0.00';
        }

        $course_order = new CoursePurchase();
        $course_order->user_id = Auth::user()->id;
        $course_order->course_id = $request->course_id;
        $course_order->currency = $currency;
        $course_order->status = '1';
        $course_order->save();

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $total_order_amount_in_cents = $currency === 'jpy' ? (int)$amount : (int)($amount * 100);

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => $request->course_name
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.master-classes.success', ['course_order_id' => $course_order->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.master-classes.index')
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $course_order_id = $request->query('course_order_id');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $course_order = CoursePurchase::find($course_order_id);

        if($course_order) {
            $course_order->date = now()->toDateString();
            $course_order->time = now()->toTimeString();
            $course_order->mode = $session->mode;
            $course_order->transaction_id = $session->id;
            $course_order->amount_paid = $session->amount_total / 100;
            $course_order->material_logistic = 'No';
            $course_order->payment_status = 'Completed';
            $course_order->save();
        }

        $wallet = Wallet::where('user_id', $course_order->user_id)->where('status', '1')->first();
        $course = Course::find($course_order->course_id);

        if($wallet) {
            if($wallet->balance >= $course->price) {
                $wallet->balance = $wallet->balance - $course->price;
                $wallet->save();
            }
            else {
                $wallet->balance = '0.00';
                $wallet->save();
            }
        }

        return redirect()->route('frontend.master-classes.index')->with('success', 'Course purchased successfully');
    }
}