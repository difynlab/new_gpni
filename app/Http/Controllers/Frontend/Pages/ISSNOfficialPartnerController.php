<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\ISSNPartner;
use App\Models\ISSNPartnerContent;

class ISSNOfficialPartnerController extends Controller
{
    public function index()
    {
        $contents = ISSNPartnerContent::find(1);
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

        $partners = ISSNPartner::where('language', $language_name)->where('status', '1')->get();
        if($partners->isEmpty() && $language_name !== 'English') {
            $partners = ISSNPartner::where('language', 'English')->where('status', '1')->get();
        }
    
        return view('frontend.pages.issn-official-partners', [
            'contents' => $contents,
            'language' => $language,
            'partners' => $partners
        ]);
    }
}