<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\ConferenceContent;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index(Request $request)
    {
        $contents = ConferenceContent::find(1);

        $conferences = Conference::where('language', $request->middleware_language_name)->where('status', '1')->get();

        if($conferences->isEmpty() && $request->middleware_language_name != 'English') {
            $conferences = Conference::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.conferences.index', [
            'contents' => $contents,
            'conferences' => $conferences
        ]);
    }

    public function show(Conference $conference)
    {
        $settings = Setting::find(1);
        $contents = ConferenceContent::find(1);

        return view('frontend.pages.conferences.show', [
            'conference' => $conference,
            'settings' => $settings,
            'contents' => $contents
        ]);
    }
}