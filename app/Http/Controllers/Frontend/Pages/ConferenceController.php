<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\ConferenceContent;

class ConferenceController extends Controller
{
    public function index()
    {
        $contents = ConferenceContent::find(1);
        $language = session('language', 'en');

        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }

        $conferences = Conference::where('language', $language_name)->where('status', '1')->get();

        if($conferences->isEmpty() && $language_name !== 'English') {
            $conferences = Conference::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.conference', [
            'contents' => $contents,
            'language' => $language,
            'conferences' => $conferences
        ]);
    }

    public function show($id)
    {
        $conference = Conference::findOrFail($id);
        return view('frontend.pages.single-conference', compact('conference'));
    }
}