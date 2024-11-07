<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\PodcastContent;
use App\Models\Podcast;

class PodcastController extends Controller
{
    public function index()
    {
        $contents = PodcastContent::find(1);
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

        $podcasts = Podcast::where('language', $language_name)->where('status', '1')->orderBy('id', 'asc')->get();
        if($podcasts->isEmpty() && $language_name !== 'English') {
            $podcasts = Podcast::where('language', 'English')->where('status', '1')->orderBy('id', 'asc')->get();
        }
    
    
        return view('frontend.pages.podcast', [
            'contents' => $contents,
            'language' => $language,
            'podcasts' => $podcasts
        ]);
    }
}