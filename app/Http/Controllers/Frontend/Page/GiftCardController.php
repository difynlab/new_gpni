<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\GiftCardContent;
use App\Models\GiftCardPurchase;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function index(Request $request)
    {
        $contents = GiftCardContent::find(1);
        $images = json_decode($contents->{'images_' . $request->middleware_language} ?? $contents->images_en);

        return view('frontend.pages.gift-cards', [
            'contents' => $contents,
            'images' => $images
        ]);
    }

    public function checkout(Request $request)
    {
        $gift_card_purchase = new GiftCardPurchase();
        $gift_card_purchase->receiver_name = $request->receiver_name;
        $gift_card_purchase->receiver_email = $request->receiver_email;
        $gift_card_purchase->message = $request->message;
        $gift_card_purchase->status = '1';
        $gift_card_purchase->save();

        $total_order_amount_in_cents = $request->amount * 100;

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
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

        return redirect()->route('frontend.gift-cards.index')->with('success', 'Gift card purchase has been successfully completed');
    }
}