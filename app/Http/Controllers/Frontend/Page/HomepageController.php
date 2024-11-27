<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\Course;
use App\Models\FAQ;
use App\Models\Testimonial;
use App\Models\HomepageContent;
use App\Models\StageUser;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $stage_users = StageUser::where('status', '1')->get();

        foreach($stage_users as $key => $stage_user) {
            $user = new User();

            if($stage_user->primary_language == 'english') {
                $primary_language = 'English';
            }
            elseif($stage_user->primary_language == 'chinese') {
                $primary_language = 'Chinese';
            }
            elseif($stage_user->primary_language == 'korean') {
                $primary_language = 'Korean';
            }
            else {
                $primary_language = 'English';
            }

            if(User::where('email', $stage_user->email)->exists()) {
                continue;
            }

            $user->first_name = $stage_user->first_name;
            $user->last_name = $stage_user->last_name;
            $user->email = $stage_user->email;
            $user->password = $stage_user->password;
            $user->country = $stage_user->country;
            $user->language = $primary_language;
            $user->role = 'student';
            $user->member = 'No';
            $user->status = '1';
            $user->save();
        }

        $contents = HomepageContent::find(1);

        $courses = Course::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($courses->isEmpty() && $request->middleware_language_name != 'English') {
            $courses = Course::where('language', 'English')->where('status', '1')->get();
        }

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('type', 'Common')->where('status', '1')->get();
        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('type', 'Common')->where('status', '1')->get();
        }

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->get();
        }

        $testimonials = Testimonial::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.homepage', [
            'contents' => $contents,
            'faqs' => $faqs,
            'advisory_boards' => $advisory_boards,
            'courses' => $courses,
            'testimonials' => $testimonials
        ]);
    }
}