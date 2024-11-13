<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TvContent;
use App\Models\Webinar;
use Illuminate\Http\Request;

class TvController extends Controller
{
    public function index(Request $request)
    {
        $contents = TvContent::find(1);

        $recent_webinars = Webinar::where('language', $request->middleware_language_name)->where('type', 'Recent')->where('status', '1')->get();
        if($recent_webinars->isEmpty() && $request->middleware_language_name != 'English') {
            $recent_webinars = Webinar::where('language', 'English')->where('status', '1')->get();
        }

        $previous_webinars = Webinar::where('language', $request->middleware_language_name)->where('type', 'Previous')->where('status', '1')->get();
        if($previous_webinars->isEmpty() && $request->middleware_language_name != 'English') {
            $previous_webinars = Webinar::where('language', 'English')->where('status', '1')->get();
        }

        $settings = Setting::find(1);

        return view('frontend.pages.gpni-tv', [
            'contents' => $contents,
            'recent_webinars' => $recent_webinars,
            'previous_webinars' => $previous_webinars,
            'settings' => $settings
        ]);
    }
}