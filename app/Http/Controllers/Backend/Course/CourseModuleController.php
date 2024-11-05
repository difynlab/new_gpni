<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseModule;
use App\Models\CourseModuleExamQuestion;
use Illuminate\Http\Request;

class CourseModuleController extends Controller
{
    public function index(Course $course)
    {
        $course_modules = CourseModule::where('course_id', $course->id)->where('status', '!=', '0')->orderBy('id', 'desc')->get();

        return view('backend.course-modules.index', [
            'course' => $course,
            'course_modules' => $course_modules
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $last_course_module = CourseModule::where('course_id', $request->course_id)->where('status', '!=', '0')->latest('id')->first();

        $course_module = new CourseModule();
        $data = $request->all();
        $data['module_no'] = $last_course_module ? $last_course_module->module_no + 1 : 1;
        $course_module->create($data);

        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit(CourseModule $course_module)
    {
        return response($course_module);
    }

    public function update(Request $request, CourseModule $course_module)
    {
        $course_module->title = $request->title;
        $course_module->description = $request->description;
        $course_module->module_exam = $request->module_exam;
        $course_module->time_required = $request->time_required;

        if($request->time_required == 'Yes') {
            $course_module->exam_time = $request->exam_time;
        }
        else {
            $course_module->exam_time = null;
        }
        
        $course_module->status = $request->status;
        $course_module->save();
        
        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function destroy(CourseModule $course_module)
    {
        $course_chapters = CourseChapter::where('module_id', $course_module->id)->where('status', '!=', '0')->get();
        $course_module_exam_questions = CourseModuleExamQuestion::where('module_id', $course_module->id)->where('status', '!=', '0')->get();

        if($course_chapters) {
            foreach($course_chapters as $course_chapter) {
                $course_chapter->status = '0';
                $course_chapter->save();
            }
        }

        if($course_module_exam_questions) {
            foreach($course_module_exam_questions as $course_module_exam_question) {
                $course_module_exam_question->status = '0';
                $course_module_exam_question->save();
            }
        }

        $course_module->status = '0';
        $course_module->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}