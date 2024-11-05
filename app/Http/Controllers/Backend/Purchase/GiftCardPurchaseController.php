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
            <a id="'.$gift_card_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $gift_card_purchase->payment_status = ($gift_card_purchase->payment_status == '1') ? '<span class="active-status">Paid</span>' : '<span class="inactive-status">Unpaid</span>';
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

        $reference_code = $request->reference_code;
        $buyer_receiver_name = $request->buyer_receiver_name;
        $date = $request->date;

        $gift_card_purchases = GiftCardPurchase::where('status', '1')->orderBy('id', 'desc');

        if($reference_code != null) {
            $gift_card_purchases->where('reference_code', 'like', '%' . $reference_code . '%');
        }

        if($buyer_receiver_name != null) {
            $gift_card_purchases->where(function ($query) use ($buyer_receiver_name) {
                $query->where('buyer_name', 'like', '%' . $buyer_receiver_name . '%')
                    ->orWhere('receiver_name', 'like', '%' . $buyer_receiver_name . '%');
            });
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
            'reference_code' => $reference_code,
            'buyer_receiver_name' => $buyer_receiver_name,
            'date' => $date,
        ]);
    }
}