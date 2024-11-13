<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\PodcastContent;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index(Request $request)
    {
        $contents = PodcastContent::find(1);

        $podcasts = Podcast::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->paginate(4);

        if($podcasts->isEmpty() && $request->middleware_language_name != 'English') {
            $podcasts = Podcast::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->paginate(4);
        }
    
        return view('frontend.pages.podcasts.index', [
            'contents' => $contents,
            'podcasts' => $podcasts
        ]);
    }

    public function show(Podcast $podcast)
    {
        $contents = PodcastContent::find(1);

        return view('frontend.pages.podcasts.show', [
            'contents' => $contents,
            'podcast' => $podcast
        ]);
    }
}