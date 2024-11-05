<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\GiftCardContent;

class GiftCardController extends Controller
{
    public function index()
    {
        $contents = GiftCardContent::find(1);
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
        
        // $faqs = FAQ::where('language', $language_name)->where('status', '1')->get();

        // if($faqs->isEmpty() && $language_name !== 'English') {
        //     $faqs = FAQ::where('language', 'English')->where('status', '1')->get();
        // }

        return view('frontend.pages.gift-card', [
            'contents' => $contents,
            'language' => $language
        ]);
    }
}