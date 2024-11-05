<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\PolicyContent;
use App\Models\PolicyCategory;
use App\Models\Policy;
use Illuminate\Http\Request;

class OurPolicyController extends Controller
{
    public function index(Request $request)
    {
        $contents = PolicyContent::find(1);

        $policies = Policy::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'asc')->get();
        if($policies->isEmpty() && $request->middleware_language_name != 'English') {
            $policies = Policy::where('language', 'English')->where('status', '1')->orderBy('id', 'asc')->get();
        }
    
        $policy_categories = PolicyCategory::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'asc')->get();
        if($policy_categories->isEmpty() && $request->middleware_language_name != 'English') {
            $policy_categories = PolicyCategory::where('language', 'English')->where('status', '1')->orderBy('id', 'asc')->get();
        }
    
        return view('frontend.pages.our-policies', [
            'contents' => $contents,
            'policy_categories' => $policy_categories,
            'policies' => $policies
        ]);
    }
}