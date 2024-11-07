<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\ISSNOfficialPartnerAffiliateContent;
use App\Models\ISSNPartner;
use Illuminate\Http\Request;

class ISSNOfficialPartnerAffiliateController extends Controller
{
    public function index(Request $request)
    {
        $contents = ISSNOfficialPartnerAffiliateContent::find(1);

        $partners = ISSNPartner::where('language', $request->middleware_language_name)->where('status', '1')->get();

        if($partners->isEmpty() && $request->middleware_language_name != 'English') {
            $partners = ISSNPartner::where('language', 'English')->where('status', '1')->get();
        }
    
        return view('frontend.pages.issn-official-partners-and-affiliates', [
            'contents' => $contents,
            'partners' => $partners
        ]);
    }
}