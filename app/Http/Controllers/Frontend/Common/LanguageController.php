<?php

namespace App\Http\Controllers\Frontend\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        $language = $request->input('language');
        session(['language' => $language]);

        return response()->json(['success' => true]);
    }
}