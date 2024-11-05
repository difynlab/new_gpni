<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CoursePurchase;
use App\Models\Course;

class StudentMaterialController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');
        
        $student_id = Auth::id();

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
        $courses = CoursePurchase::with('course')
        ->where('student_id', $student_id)
        ->get();

        return view('frontend.student.student-materials', [
            'courses' => $courses
        ]);
    }
}