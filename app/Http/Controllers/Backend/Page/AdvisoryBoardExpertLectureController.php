<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoardExpertLectureContent;
use Illuminate\Http\Request;

class AdvisoryBoardExpertLectureController extends Controller
{
    public function index($language)
    {
        $contents = AdvisoryBoardExpertLectureContent::find(1);

        switch($language){
            case 'english':
                $short_code = 'en';
                break;
            case 'chinese':
                $short_code = 'zh';
                break;
            case 'japanese':
                $short_code = 'ja';
                break;
            default:
                $short_code = 'unknown';
                break;
        }

        return view('backend.pages.advisory-board', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request) {

        $contents = AdvisoryBoardExpertLectureContent::find(1);

        $data = $request->all();
        
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}