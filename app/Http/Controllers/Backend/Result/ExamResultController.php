<?php

namespace App\Http\Controllers\Backend\Result;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFinalExam;
use App\Models\CourseFinalExamAnswer;
use App\Models\CourseFinalExamQuestion;
use App\Models\CourseModule;
use App\Models\CourseModuleExam;
use App\Models\CourseModuleExamAnswer;
use App\Models\CourseModuleExamQuestion;
use App\Models\User;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    // Module exam result functions
        private function processModuleExamResults($results)
        {
            foreach($results as $result) {
                $result->action = '
                <a href="'. route('backend.exam-results.module-exam-result', $result->id) .'" class="edit-button" title="View"><i class="bi bi-pencil-square"></i></a>
                <a id="'.$result->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

                $result->user_id = User::find($result->user_id)->first_name . ' ' . User::find($result->user_id)->last_name;

                $result->course_id = Course::find($result->course_id)->title;

                $result->module_id = CourseModule::find($result->module_id)->title;

                $result->result = ($result->result == 'Pass') ? '<span class="active-status">Pass</span>' : '<span class="inactive-status">Fail</span>';
            }

            return $results;
        }

        public function moduleExams(Request $request)
        {
            $items = $request->items ?? 10;
            $results = CourseModuleExam::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
            $results = $this->processModuleExamResults($results);
            
            return view('backend.results.module-exams.index', [
                'results' => $results,
                'items' => $items
            ]);
        }

        public function moduleExamResult(CourseModuleExam $course_module_exam)
        {
            $course = Course::find($course_module_exam->course_id);
            $course_module = CourseModule::find($course_module_exam->module_id);

            $questions = CourseModuleExamQuestion::where('course_id', $course_module_exam->course_id)->where('module_id', $course_module_exam->module_id)->where('status', '1')->get();
            $provided_answers = CourseModuleExamAnswer::where('course_module_exam_id', $course_module_exam->id)->get();

            $questions_answers = $questions->map(function ($question) use ($provided_answers) {
                $provided_answer = $provided_answers->firstWhere('course_module_question_id', $question->id);

                return [
                    'id' => $question->id,
                    'question' => $question->question,
                    'options' => [
                        'A' => $question->option_a,
                        'B' => $question->option_b,
                        'C' => $question->option_c,
                        'D' => $question->option_d,
                    ],
                    'correct_answer' => $question->answer,
                    'selected_answer' => $provided_answer->selected_option ?? null,
                    'is_correct' => $provided_answer->is_correct ?? 'No',
                ];
            });

            return view('backend.results.module-exams.show', [
                'course' => $course,
                'course_module' => $course_module,
                'course_module_exam' => $course_module_exam,
                'questions_answers' => $questions_answers
            ]);
        }

        public function moduleExamResultDestroy(CourseModuleExam $course_module_exam)
        {
            $course_module_exam->status = '0';
            $course_module_exam->save();

            return redirect()->back()->with('success', 'Successfully deleted!');
        }

        public function moduleExamsFilter(Request $request)
        {
            if($request->action == 'reset') {
                return redirect()->route('backend.exam-results.module-exams');
            }

            $user = $request->user;
            $course = $request->course;
            $module = $request->module;

            $users = User::where('role', 'student')->where('status', '1');
            $courses = Course::where('status', '1');
            $modules = CourseModule::where('status', '1');

            $results = CourseModuleExam::where('status', '!=', '0')->orderBy('id', 'desc');

            if($user) {
                $user_ids = $users->where(function ($query) use ($user) {
                                $query->where('first_name', 'like', '%' . $user . '%')
                                    ->orWhere('last_name', 'like', '%' . $user . '%');
                            })
                            ->pluck('id')
                            ->toArray();

                $results->whereIn('user_id', $user_ids);
            }

            if($course) {
                $course_ids = $courses->where('title', 'like', '%' . $course . '%')->pluck('id')->toArray();
                $results->whereIn('course_id', $course_ids);
            }

            if($module) {
                $module_ids = $modules->where('title', 'like', '%' . $module . '%')->pluck('id')->toArray();
                $results->whereIn('module_id', $module_ids);
            }

            $items = $request->items ?? 10;
            $results = $results->paginate($items);
            $results = $this->processModuleExamResults($results);

            return view('backend.results.module-exams.index', [
                'results' => $results,
                'items' => $items,
                'user' => $user,
                'course' => $course,
                'module' => $module
            ]);
        }
    // Module exam result functions


    // Final exam result functions
        private function processFinalExamResults($results)
        {
            foreach($results as $result) {
                $result->action = '
                <a href="'. route('backend.exam-results.final-exam-result', $result->id) .'" class="edit-button" title="View"><i class="bi bi-pencil-square"></i></a>
                <a id="'.$result->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

                $result->user_id = User::find($result->user_id)->first_name . ' ' . User::find($result->user_id)->last_name;

                $result->course_id = Course::find($result->course_id)->title;

                $result->result = ($result->result == 'Pass') ? '<span class="active-status">Pass</span>' : '<span class="inactive-status">Fail</span>';
            }

            return $results;
        }

        public function finalExams(Request $request)
        {
            $items = $request->items ?? 10;
            $results = CourseFinalExam::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
            $results = $this->processFinalExamResults($results);
            
            return view('backend.results.final-exams.index', [
                'results' => $results,
                'items' => $items
            ]);
        }

        public function finalExamResult(CourseFinalExam $course_final_exam)
        {
            $course = Course::find($course_final_exam->course_id);

            $questions = CourseFinalExamQuestion::where('course_id', $course_final_exam->course_id)->where('status', '1')->get();
            $provided_answers = CourseFinalExamAnswer::where('course_final_exam_id', $course_final_exam->id)->get();

            $questions_answers = $questions->map(function ($question) use ($provided_answers) {
                $provided_answer = $provided_answers->firstWhere('course_final_question_id', $question->id);

                return [
                    'id' => $question->id,
                    'question' => $question->question,
                    'options' => [
                        'A' => $question->option_a,
                        'B' => $question->option_b,
                        'C' => $question->option_c,
                        'D' => $question->option_d,
                    ],
                    'correct_answer' => $question->answer,
                    'selected_answer' => $provided_answer->selected_option ?? null,
                    'is_correct' => $provided_answer->is_correct ?? 'No',
                ];
            });

            return view('backend.results.final-exams.show', [
                'course' => $course,
                'course_final_exam' => $course_final_exam,
                'questions_answers' => $questions_answers
            ]);
        }

        public function finalExamResultDestroy(CourseFinalExam $course_final_exam)
        {
            $course_final_exam->status = '0';
            $course_final_exam->save();

            return redirect()->back()->with('success', 'Successfully deleted!');
        }

        public function finalExamsFilter(Request $request)
        {
            if($request->action == 'reset') {
                return redirect()->route('backend.exam-results.final-exams');
            }

            $user = $request->user;
            $course = $request->course;

            $users = User::where('role', 'student')->where('status', '1');
            $courses = Course::where('status', '1');

            $results = CourseFinalExam::where('status', '!=', '0')->orderBy('id', 'desc');

            if($user) {
                $user_ids = $users->where(function ($query) use ($user) {
                                $query->where('first_name', 'like', '%' . $user . '%')
                                    ->orWhere('last_name', 'like', '%' . $user . '%');
                            })
                            ->pluck('id')
                            ->toArray();

                $results->whereIn('user_id', $user_ids);
            }

            if($course) {
                $course_ids = $courses->where('title', 'like', '%' . $course . '%')->pluck('id')->toArray();
                $results->whereIn('course_id', $course_ids);
            }

            $items = $request->items ?? 10;
            $results = $results->paginate($items);
            $results = $this->processFinalExamResults($results);

            return view('backend.results.final-exams.index', [
                'results' => $results,
                'items' => $items,
                'user' => $user,
                'course' => $course
            ]);
        }
    // Final exam result functions
}