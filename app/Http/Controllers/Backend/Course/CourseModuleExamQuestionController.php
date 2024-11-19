<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseModuleExamQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseModuleExamQuestionController extends Controller
{
    private function processCourseModuleExamQuestions($course_module_exam_questions)
    {
        foreach($course_module_exam_questions as $course_module_exam_question) {
            $course_module_exam_question->action = '
            <a href="'. route('backend.courses.module-exam-questions.edit', [$course_module_exam_question->module_id, $course_module_exam_question->id]) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$course_module_exam_question->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_module_exam_question->status = ($course_module_exam_question->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $course_module_exam_questions;
    }

    public function index(Request $request, CourseModule $course_module)
    {
        $items = $request->items ?? 10;

        $course = Course::where('status', '!=', '0')->find($course_module->course_id);

        $course_module_exam_questions = CourseModuleExamQuestion::where('course_id', $course->id)->where('module_id', $course_module->id)->where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);

        $course_module_exam_questions = $this->processCourseModuleExamQuestions($course_module_exam_questions);

        return view('backend.course-module-exam-questions.index', [
            'course' => $course,
            'course_module' => $course_module,
            'course_module_exam_questions' => $course_module_exam_questions,
            'items' => $items
        ]);
    }

    public function create(CourseModule $course_module)
    {
        $course = Course::where('status', '!=', '0')->find($course_module->course_id);
        $course_language = $course->language;

        return view('backend.course-module-exam-questions.create', [
            'course' => $course,
            'course_module' => $course_module,
            'course_language' => $course_language
        ]);
    }

    public function store(Request $request, CourseModule $course_module)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        $course = Course::where('status', '!=', '0')->find($course_module->course_id);

        $course_module_exam_question = new CourseModuleExamQuestion();
        $course_module_exam_question->course_id = $course->id;
        $course_module_exam_question->module_id = $course_module->id;

        $course_module_exam_question->question = $request->question;
        $course_module_exam_question->option_a = $request->option_a;
        $course_module_exam_question->option_b = $request->option_b;
        $course_module_exam_question->option_c = $request->option_c;
        $course_module_exam_question->option_d = $request->option_d;
        $course_module_exam_question->answer = $request->answer;

        $course_module_exam_question->status = $request->status;
        $course_module_exam_question->save();

        return redirect()->route('backend.courses.module-exam-questions.index', $course_module)->with('success', 'Successfully created!');
    }

    public function edit(CourseModule $course_module, CourseModuleExamQuestion $course_module_exam_question)
    {
        $course = Course::where('status', '!=', '0')->find($course_module->course_id);
        $course_language = $course->language;

        return view('backend.course-module-exam-questions.edit', [
            'course' => $course,
            'course_module' => $course_module,
            'course_module_exam_question' => $course_module_exam_question,
            'course_language' => $course_language
        ]);
    }

    public function update(Request $request, CourseModule $course_module, CourseModuleExamQuestion $course_module_exam_question)
    {
        $course = Course::where('status', '!=', '0')->find($course_module->id);

        $course_module_exam_question->question = $request->question;
        $course_module_exam_question->option_a = $request->option_a;
        $course_module_exam_question->option_b = $request->option_b;
        $course_module_exam_question->option_c = $request->option_c;
        $course_module_exam_question->option_d = $request->option_d;
        $course_module_exam_question->answer = $request->answer;

        $course_module_exam_question->status = $request->status;
        $course_module_exam_question->save();
        
        return redirect()->route('backend.courses.module-exam-questions.index', $course_module)->with('success', 'Successfully updated!');
    }

    public function destroy(CourseModule $course_module, CourseModuleExamQuestion $course_module_exam_question)
    {
        $course_module_exam_question->status = '0';
        $course_module_exam_question->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}