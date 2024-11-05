<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFinal;
use App\Models\CourseFinalExamQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseFinalExamQuestionController extends Controller
{
    private function processCourseFinalExamQuestions($course_final_exam_questions)
    {
        foreach($course_final_exam_questions as $course_final_exam_question) {
            $course_final_exam_question->action = '
            <a href="'. route('backend.courses.final-exam-questions.edit', [$course_final_exam_question->course_id, $course_final_exam_question->id]) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$course_final_exam_question->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_final_exam_question->status = ($course_final_exam_question->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $course_final_exam_questions;
    }

    public function index(Request $request, Course $course)
    {
        $items = $request->items ?? 10;

        $course_final_exam_questions = CourseFinalExamQuestion::where('course_id', $course->id)->where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);

        $course_final_exam_questions = $this->processCourseFinalExamQuestions($course_final_exam_questions);

        return view('backend.course-final-exam-questions.index', [
            'course' => $course,
            'course_final_exam_questions' => $course_final_exam_questions,
            'items' => $items
        ]);
    }

    public function create(Course $course)
    {
        $course_language = $course->language;

        return view('backend.course-final-exam-questions.create', [
            'course' => $course,
            'course_language' => $course_language
        ]);
    }

    public function store(Request $request, Course $course)
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

        $course_final_exam_question = new CourseFinalExamQuestion();
        $course_final_exam_question->course_id = $course->id;
        $course_final_exam_question->question = $request->question;
        $course_final_exam_question->option_a = $request->option_a;
        $course_final_exam_question->option_b = $request->option_b;
        $course_final_exam_question->option_c = $request->option_c;
        $course_final_exam_question->option_d = $request->option_d;
        $course_final_exam_question->answer = $request->answer;

        $course_final_exam_question->status = $request->status;
        $course_final_exam_question->save();

        return redirect()->route('backend.courses.final-exam-questions.index', $course)->with('success', 'Successfully created!');
    }

    public function edit(Course $course, CourseFinalExamQuestion $course_final_exam_question)
    {
        $course_language = $course->language;

        return view('backend.course-final-exam-questions.edit', [
            'course' => $course,
            'course_final_exam_question' => $course_final_exam_question,
            'course_language' => $course_language
        ]);
    }

    public function update(Request $request, Course $course, CourseFinalExamQuestion $course_final_exam_question)
    {
        $course_final_exam_question->question = $request->question;
        $course_final_exam_question->option_a = $request->option_a;
        $course_final_exam_question->option_b = $request->option_b;
        $course_final_exam_question->option_c = $request->option_c;
        $course_final_exam_question->option_d = $request->option_d;
        $course_final_exam_question->answer = $request->answer;

        $course_final_exam_question->status = $request->status;
        $course_final_exam_question->save();
        
        return redirect()->route('backend.courses.final-exam-questions.index', $course)->with('success', 'Successfully updated!');
    }

    public function destroy(Course $course, CourseFinalExamQuestion $course_final_exam_question)
    {
        $course_final_exam_question->status = '0';
        $course_final_exam_question->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}