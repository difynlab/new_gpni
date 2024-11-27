<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\MembershipPurchase;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipPurchaseController extends Controller
{
    private function processMembershipPurchases($membership_purchases)
    {
        foreach($membership_purchases as $membership_purchase) {
            $membership_purchase->action = '
            <a href="'. route('backend.purchases.membership-purchases.show', $membership_purchase->id) .'" class="review-button" title="Details"><i class="bi bi-calendar-fill"></i></a>
            <a id="'.$membership_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $membership_purchase->user_id = User::find($membership_purchase->user_id)->first_name . ' ' . User::find($membership_purchase->user_id)->last_name;

            $membership_purchase->date_time = $membership_purchase->date . ' | ' . $membership_purchase->time;

            $membership_purchase->payment_status = 
                ($membership_purchase->payment_status == 'Completed') 
                ? '<span class="active-status">Completed</span>' 
                : (($membership_purchase->payment_status == 'Pending') 
                    ? '<span class="pending-status">Pending</span>' 
                    : '<span class="inactive-status">Failed</span>');
        }

        return $membership_purchases;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $membership_purchases = MembershipPurchase::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $membership_purchases = $this->processMembershipPurchases($membership_purchases);

        return view('backend.purchases.membership-purchases.index', [
            'membership_purchases' => $membership_purchases,
            'items' => $items
        ]);
    }

    public function show(MembershipPurchase $membership_purchase)
    {
        $student = User::find($membership_purchase->user_id)->first_name . ' ' . User::find($membership_purchase->user_id)->last_name;

        return view('backend.purchases.membership-purchases.show', [
            'membership_purchase' => $membership_purchase,
            'student' => $student
        ]);
    }

    public function destroy(MembershipPurchase $membership_purchase)
    {
        $user = User::find($membership_purchase->user_id);
        $user->member = 'No';
        $user->save();

        $membership_purchase->status = '0';
        $membership_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.purchases.membership-purchases.index');
        }

        $transaction_id = $request->transaction_id;
        // $buyer_receiver_name = $request->buyer_receiver_name;
        $date = $request->date;

        $membership_purchases = MembershipPurchase::where('status', '1')->orderBy('id', 'desc');

        if($transaction_id != null) {
            $membership_purchases->where('transaction_id', 'like', '%' . $transaction_id . '%');
        }

        // if($buyer_receiver_name != null) {
        //     $membership_purchases->where(function ($query) use ($buyer_receiver_name) {
        //         $query->where('buyer_name', 'like', '%' . $buyer_receiver_name . '%')
        //             ->orWhere('receiver_name', 'like', '%' . $buyer_receiver_name . '%');
        //     });
        // }

        if($date != null) {
            $membership_purchases->where('date', $date);
        }

        $items = $request->items ?? 10;
        $membership_purchases = $membership_purchases->paginate($items);
        $membership_purchases = $this->processMembershipPurchases($membership_purchases);

        return view('backend.purchases.membership-purchases.index', [
            'membership_purchases' => $membership_purchases,
            'items' => $items,
            'transaction_id' => $transaction_id,
            // 'buyer_receiver_name' => $buyer_receiver_name,
            'date' => $date,
        ]);
    }
}