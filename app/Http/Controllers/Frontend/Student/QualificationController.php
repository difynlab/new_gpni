<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\CourseCertificate;
use App\Models\CourseFinalExam;
use App\Models\CoursePurchase;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index(Request $request)
    {
        $student = Auth::user();
        $courses = $request->qualification ? Course::where('title', 'like', '%' . $request->qualification . '%')->where('status', '1')->get() : Course::where('status', '1')->get();
        $course_ids = $courses->pluck('id')->toArray();
        
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
            ->whereIn('course_id', $course_ids)
            ->where('status', '1')
            ->get();

        $purchase_ids = $purchases->pluck('id')->toArray();
        $certificates = CourseCertificate::whereIn('course_purchase_id', $purchase_ids)->where('status', '1')->get();

        $obtained_certificates = $certificates->map(function ($certificate) use ($purchases) {
            $purchase = $purchases->find($certificate->course_purchase_id);

            if(CourseFinalExam::where('course_id', $purchase->course_id)->where('result', 'Pass')->where('status', '1')->exists()) {
                $course = Course::find($purchase->course_id);

                return [
                    'course_title' => $course->title,
                    'certificate_url' => $certificate->certificate,
                    'issued_date_time' => $certificate->certificate_issued_date . ' | ' . $certificate->certificate_issued_time,
                ];
            }
        })->filter();

        return view('frontend.student.qualifications', [
            'student' => $student,
            'obtained_certificates' => $obtained_certificates,
            'qualification' => $request->qualification
        ]);
    }
}