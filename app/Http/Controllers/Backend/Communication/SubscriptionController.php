<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private function processSubscriptions($subscriptions)
    {
        foreach($subscriptions as $subscription) {
            $subscription->action = '
            <a id="'.$subscription->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';
        }

        return $subscriptions;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $subscriptions = Subscription::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $subscriptions = $this->processSubscriptions($subscriptions);

        return view('backend.communications.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'items' => $items
        ]);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->status = '0';
        $subscription->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}