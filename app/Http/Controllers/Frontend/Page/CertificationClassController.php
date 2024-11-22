<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificationClassController extends Controller
{
    public function show(Course $course)
    {
        return view('frontend.pages.certification-courses', [
            'course' => $course
        ]);
    }

    public function show_master_class()
    {
        $contents = MasterClassContent::find(1);
        $language = session('language', 'en');

           // Handle language switching
        $points_column = 'section_3_points_' . $language;
        if (!isset($contents->$points_column)) {
            $points_column = 'section_3_points_en'; // Default to English if column not available
        }
        
        // Decode the JSON points
        $points = json_decode($contents->$points_column, true);

        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }
        
        $faqs = FAQ::where('language', $language_name)->where('status', '1')->get();

        if($faqs->isEmpty() && $language_name !== 'English') {
            $faqs = FAQ::where('language', 'English')->where('status', '1')->get();
        }
        
        $courses = Course::where('language', $language_name)->where('status', '1')->get();

        if($courses->isEmpty() && $language_name !== 'English') {
            $courses = Course::where('language', 'English')->where('status', '1')->where('type', 'Masters')->get();
        }
        
        return view('frontend.pages.master-class', [
            'contents' => $contents,
            'language' => $language,
            'points' => $points,
            'faqs' => $faqs,
            'courses' => $courses
        ]);
    }

    public function enrollNow($id)
    {
        $language = session('language', 'en');

        $course = Course::find($id);
    
        if (!$course) {
            abort(404, 'Course not found');
        }

        switch ($language) {
            case 'en':
                $language_name = 'English';

                $one_time_subtitle = __('Course material & Logistics is available only for ') . '$' . $course->material_logistic_price . __(' with course fee');
                $monthly_payment = __('Monthly Payment Method (') . $course->instalment_months . __(' Months)');
                $monthly_subtitle = __('Per month $') . $course->instalment_price . __('. Course material & Logistics needs to be purchased separately');
                break;
            case 'zh':
                $language_name = 'Chinese';

                $one_time_subtitle = __('课程材料和物流仅需 ') . '$' . $course->material_logistic_price . __(' 课程费用附加');
                $monthly_payment = __('按月付款方式（') . $course->instalment_months . __(' 个月）)');
                $monthly_subtitle = __('请注意 $') . $course->instalment_price . __('. 本选项不提供课程材料和物流，您可以在学生中心单独购买');
                break;
            case 'ja':
                $language_name = 'Japanese';

                $one_time_subtitle = __('コース資料＆物流はコース料金に追加され、わずか ') . '$' . $course->material_logistic_price . __(' で利用可能です');
                $monthly_payment = __('月々のお支払い方法（') . $course->instalment_months . __(' ヶ月)');
                $monthly_subtitle = __('毎月 $') . $course->instalment_price . __('コース教材と物流は別途購入する必要があります');
                break;
            default:
                $language_name = 'unknown';
                break;
        }
    
        $translations = [
            'en' => [
                'page_title' => 'Which works best for you?',
                'one_time_payment' => 'One time payment Method',
                'one_time_subtitle' => $one_time_subtitle,
                'monthly_payment' => $monthly_payment,
                'monthly_subtitle' => $monthly_subtitle,
                'info_box' => 'Please Note: Course Material & Logistics are not provided as part of this option. But, you can purchase them separately in the Student Center.',
                'order_details' => 'Order Details',
                'total' => 'Total',
                'sub_total' => 'Sub Total',
                'discount' => 'Discount',
                'course_name' => 'COURSE NAME',
                'amount' => 'AMOUNT',
            ],
            'zh' => [
                'page_title' => '哪种方法最适合你？',
                'one_time_payment' => '一次性付款方式',
                'one_time_subtitle' => $one_time_subtitle,
                'monthly_payment' => $monthly_payment,
                'monthly_subtitle' => $monthly_subtitle,
                'info_box' => '请注意：此选项不提供课程材料和物流。但是，您可以在学生中心单独购买它们',
                'order_details' => '订单详情',
                'total' => '总计',
                'sub_total' => '小计',
                'discount' => '折扣',
                'course_name' => '课程名称',
                'amount' => '金额',
            ],
            'ja' => [
                'page_title' => 'どの方法が最適ですか？',
                'one_time_payment' => '一括払い方法',
                'one_time_subtitle' => $one_time_subtitle,
                'monthly_payment' => $monthly_payment,
                'monthly_subtitle' => $monthly_subtitle,
                'info_box' => 'ご注意：このオプションにはコース資料＆物流は含まれていません。学生センターで別途購入できます。',
                'order_details' => '注文詳細',
                'total' => '合計',
                'sub_total' => '小計',
                'discount' => '割引',
                'course_name' => 'コース名',
                'amount' => '金額',
            ]
        ];
    
        $currentTranslation = $translations[$language] ?? $translations['en'];
    
        return view('frontend.student.payment-flow', [
            'course' => $course,
            'translation' => $currentTranslation
        ]);
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