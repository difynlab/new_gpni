<?php

namespace App\Http\Controllers\Frontend\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\CoursePurchase;
use App\Models\Course;
use App\Models\CourseModule;
use Carbon\Carbon;
use App\Models\CourseChapter;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $course_ids = CoursePurchase::where('student_id', $student->id)->where('payment_status', 'Completed')->where('course_access_status', 'Active')->where('refund_status', 'Not Refunded')->where('status', '1')->pluck('course_id')->toArray();

        $courses = Course::whereIn('id', $course_ids)->where('status', '1')->orderBy('id', 'desc')->get();

        foreach($courses as $course) {
            $course_purchase = CoursePurchase::where('course_id', $course->id)->where('student_id', $student->id)->first();

            $course->date = $course_purchase && $course_purchase->date ? Carbon::parse($course_purchase->date)->format('d M Y') : null;

            $course->completion_date = $course_purchase && $course_purchase->completion_date ? Carbon::parse($course_purchase->completion_date)->format('d M Y') : null;
        }

        return view('frontend.student.courses.index', [
            'courses' => $courses,
            'student' => $student
        ]);
    }
    
    public function show(Course $course)
    {
        $student = Auth::user();

        $course_modules = CourseModule::where('course_id', $course->id)->where('status', '1')->get();

        foreach($course_modules as $course_module) {
            $course_module->chapters = CourseChapter::where('course_id', $course->id)->where('module_id', $course_module->id)->where('status', '1')->get();
        }

        return view('frontend.student.courses.show', [
            'course' => $course,
            'course_modules' => $course_modules,
            'student' => $student
        ]);
    }

    public function showMore(Course $course, CourseModule $course_module, CourseChapter $course_chapter)
    {
        $student = Auth::user();

        $books = json_decode($course_chapter->books) ?? null;
        $videos = json_decode($course_chapter->videos) ?? null;
        $video_links = json_decode($course_chapter->video_links) ?? null;
        $additional_videos = json_decode($course_chapter->additional_videos) ?? null;
        $additional_video_links = json_decode($course_chapter->additional_video_links) ?? null;
        $presentation_medias = json_decode($course_chapter->presentation_medias) ?? null;
        $downloadable_resources = json_decode($course_chapter->downloadable_resources) ?? null;

        return view('frontend.student.courses.more', [
            'course' => $course,
            'course_module' => $course_module,
            'course_chapter' => $course_chapter,
            'student' => $student,
            'books' => $books,
            'videos' => $videos,
            'video_links' => $video_links,
            'additional_videos' => $additional_videos,
            'additional_video_links' => $additional_video_links,
            'presentation_medias' => $presentation_medias,
            'downloadable_resources' => $downloadable_resources
        ]);
    }
}