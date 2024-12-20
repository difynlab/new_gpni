<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\MembershipContent;
use App\Models\FAQ;
use App\Models\MembershipPurchase;
use App\Models\Setting;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function index(Request $request)
    {
        $contents = MembershipContent::find(1);

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('status', '1')->where('type', 'Membership')->get();

        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('status', '1')->where('type', 'Membership')->get();
        }

        return view('frontend.pages.membership', [
            'contents' => $contents,
            'faqs' => $faqs
        ]);
    }

    public function checkout(Request $request)
    {
        if($request->middleware_language == 'en') {
            $currency = 'usd';
            $amount = $request->type == 'Lifetime' ? Setting::find(1)->lifetime_membership_price_en : Setting::find(1)->annual_membership_price_en;
        }
        elseif($request->middleware_language == 'zh') {
            $currency = 'cny';
            $amount = $request->type == 'Lifetime' ? Setting::find(1)->lifetime_membership_price_zh : Setting::find(1)->annual_membership_price_zh;
        }
        else {
            $currency = 'jpy';
            $amount = $request->type == 'Lifetime' ? Setting::find(1)->lifetime_membership_price_ja : Setting::find(1)->annual_membership_price_ja;
        }

        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        if($amount >= $wallet_balance) {
            $final_amount = $amount - $wallet_balance;
        }
        else {
            $final_amount = '0.00';
        }

        $membership_purchase = new MembershipPurchase();
        $membership_purchase->user_id = Auth::user()->id;
        $membership_purchase->currency = $currency;
        $membership_purchase->status = '1';
        $membership_purchase->save();

        $total_order_amount_in_cents = $currency === 'jpy' ? (int)$final_amount : (int)($final_amount * 100);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => 'Membership'
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.membership.success', ['membership_purchase_id' => $membership_purchase->id, 'amount' => $amount, 'type' => $request->type]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.membership')
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $membership_purchase_id = $request->query('membership_purchase_id');
        $amount = $request->query('amount');
        $type = $request->query('type');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $membership_purchase = MembershipPurchase::find($membership_purchase_id);

        if($membership_purchase) {
            $membership_purchase->date = now()->toDateString();
            $membership_purchase->time = now()->toTimeString();
            $membership_purchase->mode = $session->mode;
            $membership_purchase->transaction_id = $session->id;
            $membership_purchase->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
            $membership_purchase->payment_status = 'Completed';
            $membership_purchase->save();

            $user = Auth::user();
            $user->member = 'Yes';
            $user->member_type = $type;
            $user->member_annual_expiry_date = ($type == 'Annual') ? Carbon::now()->addYear()->toDateString() : null;
            $user->save();
        }

        $wallet = Wallet::where('user_id', $membership_purchase->user_id)->where('status', '1')->first();

        if($wallet) {
            if($wallet->balance >= $amount) {
                $wallet->balance = $wallet->balance - $amount;
                $wallet->save();
            }
            else {
                $wallet->balance = '0.00';
                $wallet->save();
            }
        }

        return redirect()->route('frontend.membership')->with('success', 'Membership purchased successfully');
    }
}