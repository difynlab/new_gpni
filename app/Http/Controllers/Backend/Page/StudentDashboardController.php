<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\StudentDashboardContentEN;
use App\Models\StudentDashboardContentJA;
use App\Models\StudentDashboardContentZH;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index($language)
    {
        switch($language){
            case 'english':
                $contents = StudentDashboardContentEN::find(1);
                break;
            case 'chinese':
                $contents = StudentDashboardContentZH::find(1);
                break;
            case 'japanese':
                $contents = StudentDashboardContentJA::find(1);
                break;
            default:
                $contents = StudentDashboardContentEN::find(1);
                break;
        }

        return view('backend.pages.student-dashboard', [
            'contents' => $contents,
            'language' => $language
        ]);
    }

    public function update(Request $request, $language) {
        switch($language){
            case 'english':
                $contents = StudentDashboardContentEN::find(1);
                break;
            case 'chinese':
                $contents = StudentDashboardContentZH::find(1);
                break;
            case 'japanese':
                $contents = StudentDashboardContentJA::find(1);
                break;
            default:
                $contents = StudentDashboardContentEN::find(1);
                break;
        }

        $data = $request->all();
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}