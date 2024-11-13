<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQContent;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        $contents = FAQContent::find(1);

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('status', '1')->get();

        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.faq', [
            'contents' => $contents,
            'faqs' => $faqs
        ]);
    }
}
