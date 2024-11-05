<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\AdvisoryBoardExpertLectureContent;
use Illuminate\Http\Request;

class AdvisoryBoardExpertLectureController extends Controller
{
    public function index(Request $request)
    {
        $contents = AdvisoryBoardExpertLectureContent::find(1);

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->get();

        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.advisory-board-and-expert-lectures', [
            'contents' => $contents,
            'advisory_boards' => $advisory_boards
        ]);
    }
}