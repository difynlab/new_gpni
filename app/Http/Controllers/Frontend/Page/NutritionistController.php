<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\ContactCoach;
use App\Models\Nutritionist;
use App\Models\NutritionistContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NutritionistController extends Controller
{
    public function index(Request $request)
    {
        $contents = NutritionistContent::find(1);
        
        $nutritionists = Nutritionist::where('language', $request->middleware_language_name)->where('status', '1')->paginate(4);

        if($nutritionists->isEmpty() && $request->middleware_language_name != 'English') {
            $nutritionists = Nutritionist::where('language', 'English')->where('status', '1')->paginate(4);
        }

        return view('frontend.pages.nutritionists', [
            'contents' => $contents,
            'nutritionists' => $nutritionists
        ]);
    }

    public function fetch(Nutritionist $nutritionist)
    {
        return response()->json($nutritionist);
    }

    public function contact(Request $request, Nutritionist $nutritionist) {
        $contact_coach = new ContactCoach();
        $data = $request->except('middleware_language', 'middleware_language_name');
        $data['nutritionist'] = $nutritionist->id;
        $data['date'] = Carbon::now()->toDateString();
        $data['status'] = '1';
        $contact_coach->create($data);

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}