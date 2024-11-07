<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\GiftCardPurchase;
use Illuminate\Http\Request;

class GiftCardPurchaseController extends Controller
{
    private function processGiftCardPurchases($gift_card_purchases)
    {
        foreach($gift_card_purchases as $gift_card_purchase) {
            $gift_card_purchase->action = '
            <a href="'. route('backend.purchases.gift-card-purchases.show', $gift_card_purchase->id) .'" class="review-button" title="Details"><i class="bi bi-basket-fill"></i></a>
            <a id="'.$gift_card_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $gift_card_purchase->date_time = $gift_card_purchase->date . ' | ' . $gift_card_purchase->time;

            $gift_card_purchase->payment_status = 
                ($gift_card_purchase->payment_status == 'Completed') 
                ? '<span class="active-status">Completed</span>' 
                : (($gift_card_purchase->payment_status == 'Pending') 
                    ? '<span class="pending-status">Pending</span>' 
                    : '<span class="inactive-status">Failed</span>');
        }

        return $gift_card_purchases;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $gift_card_purchases = GiftCardPurchase::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $gift_card_purchases = $this->processGiftCardPurchases($gift_card_purchases);

        return view('backend.purchases.gift-card-purchases.index', [
            'gift_card_purchases' => $gift_card_purchases,
            'items' => $items
        ]);
    }

    public function show(GiftCardPurchase $gift_card_purchase)
    {
        return view('backend.purchases.gift-card-purchases.show', [
            'gift_card_purchase' => $gift_card_purchase
        ]);
    }

    public function destroy(GiftCardPurchase $gift_card_purchase)
    {
        $gift_card_purchase->status = '0';
        $gift_card_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.purchases.gift-card-purchases.index');
        }

        $transaction_id = $request->transaction_id;
        $date = $request->date;

        $gift_card_purchases = GiftCardPurchase::where('status', '1')->orderBy('id', 'desc');

        if($transaction_id != null) {
            $gift_card_purchases->where('transaction_id', 'like', '%' . $transaction_id . '%');
        }

        if($date != null) {
            $gift_card_purchases->where('date', $date);
        }

        $items = $request->items ?? 10;
        $gift_card_purchases = $gift_card_purchases->paginate($items);
        $gift_card_purchases = $this->processGiftCardPurchases($gift_card_purchases);

        return view('backend.purchases.gift-card-purchases.index', [
            'gift_card_purchases' => $gift_card_purchases,
            'items' => $items,
            'transaction_id' => $transaction_id,
            'date' => $date
        ]);
    }
}