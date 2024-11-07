<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\HistoryOfGpniContent;
use App\Models\AdvisoryBoard;
use Illuminate\Http\Request;

class HistoryOfGpniController extends Controller
{
    public function index(Request $request)
    {
        $contents = HistoryOfGpniContent::find(1);

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->orderBy('id', 'asc')->take(2)->where('status', '1')->get();

        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->orderBy('id', 'asc')->take(2)->where('status', '1')->get();
        }

        return view('frontend.pages.history-of-gpni', [
            'contents' => $contents,
            'advisory_boards' => $advisory_boards
        ]);
    }
}