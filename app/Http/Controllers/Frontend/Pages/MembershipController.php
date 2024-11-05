<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\MembershipContent;
use App\Models\FAQ;
use Illuminate\Http\Request;

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
}