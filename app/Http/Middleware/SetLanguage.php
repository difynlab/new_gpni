<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
        $language = session('language', 'en');
        $languages = [
            'en' => 'English',
            'zh' => 'Chinese',
            'ja' => 'Japanese'
        ];
        $language_name = $languages[$language] ?? 'English';

        if($languages[$language] == 'English') {
            $student_dashboard_contents = \App\Models\StudentDashboardContentEN::find(1);
        }
        elseif($languages[$language] == 'Chinese') {
            $student_dashboard_contents = \App\Models\StudentDashboardContentZH::find(1);
        }  
        else {
            $student_dashboard_contents = \App\Models\StudentDashboardContentJA::find(1);
        }

        View::share([
            'middleware_language' => $language,
            'middleware_language_name' => $language_name,
            'student_dashboard_contents' => $student_dashboard_contents,
        ]);

        $request->merge([
            'middleware_language' => $language,
            'middleware_language_name' => $language_name,
        ]);

        return $next($request);
    }
}
