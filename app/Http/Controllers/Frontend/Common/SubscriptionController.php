<?php

namespace App\Http\Controllers\Frontend\Common;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                function($attribute, $value, $fail) {
                    if(Subscription::where('email', $value)->where('status', '1')->exists()) {
                        $fail('This email is already subscribed');
                    }
                },
            ],
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->status = '1';
        $subscription->save();

        Mail::to([$request->email])->send(new SubscriptionMail());

        return redirect()->back()->with('success', 'Successfully subscribed');
    }
}