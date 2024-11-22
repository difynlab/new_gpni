<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseCertificate;
use App\Models\CourseFinalExam;
use App\Models\CoursePurchase;

class QualificationController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        
        $purchases = CoursePurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('status', '1')->get();
        $certificates = CourseCertificate::where('status', '1')->get();
        $courses = Course::where('status', '1')->get();

        $obtained_certificates = $purchases->map(function ($purchase) use ($certificates, $courses) {

            if(CourseFinalExam::where('course_id', $purchase->course_id)->where('result', 'Pass')->where('status', '1')->exists()) {
                $certificate = $certificates->firstWhere('course_purchase_id', $purchase->id);
                $course = $courses->firstWhere('id', $purchase->course_id);
            
                return [
                    'course_title' => $course->title,
                    'certificate_url' => $certificate->certificate,
                    'issued_date_time' => $certificate->certificate_issued_date . ' | ' . $certificate->certificate_issued_time,
                ];
            }
        });

        return view('frontend.student.qualifications', [
            'student' => $student,
            'obtained_certificates' => $obtained_certificates
        ]);
    }
}