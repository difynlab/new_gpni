<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\InsuranceProfessionalMembershipContent;

class InsuranceProfessionalMembershipController extends Controller
{
    public function index()
    {
        $contents = InsuranceProfessionalMembershipContent::find(1);

        return view('frontend.pages.insurance-and-professional-membership', [
            'contents' => $contents
        ]);
    }
}