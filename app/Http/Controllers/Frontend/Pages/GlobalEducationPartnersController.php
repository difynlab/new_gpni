<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\GlobalEducationPartner;
use App\Models\GlobalEducationPartnerContent;
use Illuminate\Http\Request;

class GlobalEducationPartnersController extends Controller
{
    public function index(Request $request)
    {
        $contents = GlobalEducationPartnerContent::find(1);

        $global_education_partners = GlobalEducationPartner::where('language', $request->middleware_language_name)->where('status', '1')->get();

        if($global_education_partners->isEmpty() && $request->middleware_language_name != 'English') {
            $global_education_partners = GlobalEducationPartner::where('language', 'English')
                ->where('status', '1')->get();
        }

        return view('frontend.pages.global-education-partners', [
            'contents' => $contents,
            'global_education_partners' => $global_education_partners
        ]);
    }
}