<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\WhyWeAreDifferentContent;

class WhyWeAreDifferentController extends Controller
{
    public function index()
    {
        $contents = WhyWeAreDifferentContent::find(1);

        return view('frontend.pages.why-we-are-different', [
            'contents' => $contents
        ]);
    }
}