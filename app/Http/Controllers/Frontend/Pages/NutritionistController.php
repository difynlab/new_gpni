<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Nutritionist;
use App\Models\NutritionistContent;

class NutritionistController extends Controller
{
    public function index()
    {
        $contents = NutritionistContent::find(1);
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
        
        $nutritionists = Nutritionist::where('language', $language_name)->where('status', '1')->get();

        if($nutritionists->isEmpty() && $language_name !== 'English') {
            $nutritionists = Nutritionist::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.nutritionists', [
            'contents' => $contents,
            'language' => $language,
            'nutritionists' => $nutritionists
        ]);
    }

    public function viewCoach($id)
    {
        $contents = NutritionistContent::find(1);
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

        $nutritionists = Nutritionist::findOrFail($id);

        return view('frontend.pages.view-coach', [
            'contents' => $contents,
            'language' => $language,
            'nutritionists' => $nutritionists
        ]);
    }
}