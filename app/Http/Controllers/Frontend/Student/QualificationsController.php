<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseCertificate;
use App\Models\CoursePurchase;

class QualificationsController extends Controller
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
        
        $purchases = CoursePurchase::where('student_id', $student_id)
        ->with('certificate') // eager load the related certificate
        ->get();

        return view('frontend.student.qualifications', [
            'language' => $language,
            'purchases' => $purchases
        ]);
    }
}