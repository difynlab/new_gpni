<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursePaymentController extends Controller
{
    public function index()
    {
        return view('frontend.payment.course-payment');
    }

    public function checkout(Request $request)
    {
        $course_order = new CoursePurchase();
        $course_order->student_id = Auth::user()->id;
        $course_order->course_id = $request->course_id;
        $course_order->status = '1';
        $course_order->save();

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        if($request->payment_mode == 'payment') {

            if($request->material_logistic == 'No') {
                $total_order_amount_in_cents = $request->price * 100;
            }
            else {
                $total_order_amount_in_cents = ($request->price + $request->material_logistic_price) * 100;
            }

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $request->course_name
                            ],
                            'unit_amount' => $total_order_amount_in_cents
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('backend.course-payment.success', ['course_order_id' => $course_order->id, 'material_logistic' => $request->material_logistic]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('backend.course-payment.index')
            ]);
        }
        else {
            $price_id = $request->price_id;

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price' => $price_id,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => route('backend.course-payment.success', ['course_order_id' => $course_order->id, 'material_logistic' => $request->material_logistic]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('backend.course-payment.index')
            ]);
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

        return redirect()->route('frontend.homepage')->with('success', 'Payment success');
    }
}