<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MyStorageController extends Controller
{
    public function index(Request $request)
    {
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
        
        $filterType = $request->input('type', 'All');
        
        $query = Media::where('location', 'Student Center')
                      ->where('language', $language_name);

        if ($filterType !== 'All') {
            $query->where('type', $filterType);
        }

        // $medias = $query->get();
        $medias = $query->paginate(5);
        
        return view('frontend.student.my-storage', [
            'medias' => $medias,
            'language' => $language,
            'filterType' => $filterType
        ]);
    }
}