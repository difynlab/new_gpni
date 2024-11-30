<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\CourseReview;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificationCourseController extends Controller
{
    public function show(Request $request, Course $course)
    {
        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->take(9)->get();
        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->take(9)->get();
        }

        $testimonials = Testimonial::where('language', $request->middleware_language_name)->where('type', 'Certification Course')->where('status', '1')->orderBy('id', 'desc')->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')->where('type', 'Certification Course')->where('status', '1')->orderBy('id', 'desc')->get();
        }

        $course_reviews = CourseReview::where('course_id', $course->id)->where('status', '1')->get();
        
        return view('frontend.pages.certification-courses.show', [
            'course' => $course,
            'advisory_boards' => $advisory_boards,
            'testimonials' => $testimonials,
            'course_reviews' => $course_reviews
        ]);
    }

    public function purchase(Request $request, Course $course)
    {
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';
        
        return view('frontend.pages.certification-courses.payment', [
            'course' => $course,
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

        $course_order = new CoursePurchase();
        $course_order->user_id = Auth::user()->id;
        $course_order->course_id = $request->course_id;
        $course_order->currency = $currency;
        $course_order->status = '1';
        $course_order->save();

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        if($request->payment_mode == 'payment') {

            if($request->material_logistic == 'No') {
                $total_order_amount_in_cents = $currency === 'jpy' ? (int)$request->price : (int)($request->price * 100);
            }
            else {
                $total_order_amount_in_cents = $currency === 'jpy' ? (int)$request->price + $request->material_logistic_price : (int)($request->price + $request->material_logistic_price * 100);
            }

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
                        'quantity' => 1
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('frontend.certification-courses.success', ['course_order_id' => $course_order->id, 'material_logistic' => $request->material_logistic]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('frontend.certification-courses.show', $request->course_id)
            ]);
        }
        else {
            $price_id = $request->price_id;

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price' => $price_id,
                        'quantity' => 1
                    ]
                ],
                'mode' => 'subscription',
                'success_url' => route('frontend.certification-courses.success', ['course_order_id' => $course_order->id, 'material_logistic' => $request->material_logistic]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('frontend.certification-courses.show', $request->course_id)
            ]);

            // $subscriptionSchedule = \Stripe\SubscriptionSchedule::create([
            //     'start_date' => 'now',
            //     'end_behavior' => 'cancel',
            //     'phases' => [
            //         [
            //             'items' => [
            //                 [
            //                     'price' => $price_id,
            //                     'quantity' => 1,
            //                 ],
            //             ],
            //             'iterations' => 6,
            //         ],
            //     ],
            // ]);

            // $session = \Stripe\Checkout\Session::create([
            //     'mode' => 'subscription',
            //     'subscription_data' => [
            //         'schedule' => $subscriptionSchedule->id,
            //     ],
            //     'line_items' => [
            //         [
            //             'price' => $price_id,
            //             'quantity' => 1,
            //         ],
            //     ],
            //     'success_url' => route('frontend.certification-courses.success', [
            //         'course_order_id' => $course_order->id,
            //         'material_logistic' => $request->material_logistic,
            //     ]) . '&session_id={CHECKOUT_SESSION_ID}',
            //     'cancel_url' => route('frontend.certification-courses.show', $request->course_id),
            // ]);
        }

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $course_order_id = $request->query('course_order_id');
        $material_logistic = $request->query('material_logistic');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $course_order = CoursePurchase::find($course_order_id);

        if($course_order) {
            $course_order->date = now()->toDateString();
            $course_order->time = now()->toTimeString();
            $course_order->mode = $session->mode;
            $course_order->transaction_id = $session->id;
            $course_order->amount_paid = $session->amount_total / 100;
            $course_order->material_logistic = $material_logistic;
            $course_order->payment_status = 'Completed';
            $course_order->save();
        }

        return redirect()->route('frontend.homepage')->with('success', 'Course purchased successfully');
    }
}