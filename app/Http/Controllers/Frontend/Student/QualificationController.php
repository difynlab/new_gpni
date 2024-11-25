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
        
        $purchases = CoursePurchase::
        where('user_id', $student->id)
        ->where(function ($query) {
            $query->where('payment_status', 'Completed')
                  ->orWhereNull('payment_status');
        })
        ->where('course_access_status', 'Active')
        ->where(function ($query) {
            $query->where('refund_status', 'Not Refunded')
                  ->orWhereNull('refund_status');
        })
        ->where('status', '1')->get();

        $purchase_ids = $purchases->pluck('id')->toArray();
        $certificates = CourseCertificate::whereIn('course_purchase_id', $purchase_ids)->where('status', '1')->get();
        $courses = Course::where('status', '1')->get();

        $obtained_certificates = $certificates->map(function ($certificate) use ($purchases, $courses) {

            $purchase = $purchases->find($certificate->course_purchase_id);

            if(CourseFinalExam::where('course_id', $purchase->course_id)->where('result', 'Pass')->where('status', '1')->exists()) {
                $course = $courses->firstWhere('id', $purchase->course_id);

                $certificate_url = $certificate->certificate;
                $issued_date_time = $certificate->certificate_issued_date . ' | ' . $certificate->certificate_issued_time;
                
                return [
                    'course_title' => $course->title,
                    'certificate_url' => $certificate_url,
                    'issued_date_time' => $issued_date_time,
                ];
            }
        });

        return view('frontend.student.qualifications', [
            'student' => $student,
            'obtained_certificates' => $obtained_certificates
        ]);
    }
}