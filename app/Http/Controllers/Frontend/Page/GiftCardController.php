<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\GiftCardContent;
use App\Models\GiftCardPurchase;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function index(Request $request)
    {
        if($request->middleware_language == 'en') {
            $amounts = [50, 100, 250, 500];
        }
        elseif($request->middleware_language == 'zh') {
            $amounts = [350, 700, 1800, 3500];
        }
        else {
            $amounts = [7500, 15000, 35000, 75000];
        }

        $contents = GiftCardContent::find(1);
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        if($contents->{'images_' . $request->middleware_language}) {
            $images = json_decode($contents->{'images_' . $request->middleware_language});
        }
        elseif($contents->images_en) {
            $images = json_decode($contents->images_en);
        }
        else {
            $images = null;
        }

        return view('frontend.pages.gift-cards', [
            'contents' => $contents,
            'images' => $images,
            'currency_symbol' => $currency_symbol,
            'amounts' => $amounts
        ]);
    }

    public function checkout(Request $request)
    {
        $user = User::where('email', $request->receiver_email)->where('role', 'student')->where('status', '1')->first();

        if(!$user) {
            return redirect()->back()->withInput()->with('error', "Receiver email is not found");
        }

        if($user->language == 'English') {
            $user_currency = 'USD';
        }
        elseif($user->language == 'Chinese') {
            $user_currency = 'CNY';
        }
        else {
            $user_currency = 'JPY';
        }

        if($request->middleware_language_name != $user->language) {
            return redirect()->back()->withInput()->with('error', "The receiver's language is " . ' ' . $user->language . ', and the currency is ' . $user_currency . '. Please complete the purchase by selecting ' . $user->language . ' from the language dropdown, even if you switch the language.');
        }


        if($request->middleware_language == 'en') {
            $currency = 'usd';
        }
        elseif($request->middleware_language == 'zh') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $gift_card_purchase = new GiftCardPurchase();
        $gift_card_purchase->receiver_name = $request->receiver_name;
        $gift_card_purchase->receiver_email = $request->receiver_email;
        $gift_card_purchase->message = $request->message;
        $gift_card_purchase->currency = $currency;
        $gift_card_purchase->status = '1';
        $gift_card_purchase->save();

        $total_order_amount_in_cents = $currency === 'jpy' ? (int)$request->amount : (int)($request->amount * 100);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => 'Your Gift Card Payment'
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.gift-cards.success', [
                'gift_card_purchase_id' => $gift_card_purchase->id
                ]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.gift-cards.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $gift_card_purchase_id = $request->query('gift_card_purchase_id');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $gift_card_purchase = GiftCardPurchase::find($gift_card_purchase_id);

        if($gift_card_purchase) {
            $gift_card_purchase->date = now()->toDateString();
            $gift_card_purchase->time = now()->toTimeString();
            $gift_card_purchase->mode = $session->mode;
            $gift_card_purchase->transaction_id = $session->id;
            $gift_card_purchase->amount_paid = $session->amount_total / 100;
            $gift_card_purchase->payment_status = 'Completed';
            $gift_card_purchase->buyer_name = $session->customer_details['name'];
            $gift_card_purchase->buyer_email = $session->customer_details['email'];
            $gift_card_purchase->save();
        }

        $user = User::where('email', $gift_card_purchase->receiver_email)->first();
        $wallet_exist = Wallet::where('user_id', $user->id)->first();

        if($wallet_exist) {
            $wallet_exist->balance = $wallet_exist->balance + ($session->amount_total / 100);
            $wallet_exist->save();
        }
        else {
            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->currency = $gift_card_purchase->currency;
            $wallet->balance = $session->amount_total / 100;
            $wallet->status = '1';
            $wallet->save();
        }

        return redirect()->route('frontend.gift-cards.index')->with('success', 'Gift card purchase has been successfully completed');
    }
}