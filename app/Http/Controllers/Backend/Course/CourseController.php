<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseModule;
use App\Models\CourseModuleExamQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    private function processCourses($courses)
    {
        foreach($courses as $course) {
            if($course->final_exam == 'Yes') {
                $course->action = '
                <a href="'. route('backend.courses.final-exam-questions.index', $course->id) .'" class="exam-questions-button" title="Finale Exam Questions"><i class="bi bi-patch-question-fill"></i></a>
                <a href="'. route('backend.courses.information.index', $course->id) .'" class="information-button" title="Information"><i class="bi bi-info-circle-fill"></i></a>
                <a href="'. route('backend.courses.reviews.index', $course->id) .'" class="review-button" title="Information"><i class="bi bi-chat-square-dots-fill"></i></a>
                <a href="'. route('backend.courses.edit', $course->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
                <a id="'.$course->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';
            } else {
                $course->action = '
                <a href="'. route('backend.courses.information.index', $course->id) .'" class="information-button" title="Information"><i class="bi bi-info-circle-fill"></i></a>
                <a href="'. route('backend.courses.reviews.index', $course->id) .'" class="review-button" title="Reviews"><i class="bi bi-chat-square-dots-fill"></i></a>
                <a href="'. route('backend.courses.edit', $course->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
                <a id="'.$course->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';
            }

            $course->module = '<a href="'. route('backend.courses.modules.index', $course->id) .'" class="message">Module/Chapter</a>';

            $course->status = ($course->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $courses;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $courses = Course::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $courses = $this->processCourses($courses);

        return view('backend.courses.index', [
            'courses' => $courses,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.courses.create');
    }
                                                                              
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_image_video' => 'required|max:2048',
            'new_instructor_profile_image' => 'required|max:2048',
        ], [
            'new_image_video.max' => 'Image or video must not be greater than 2MB',
            'new_image_video.required' => 'This field is required',
            'new_instructor_profile_image.max' => 'Image must not be greater than 2MB',
            'new_instructor_profile_image.required' => 'Instructor profile image is required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image_video') != null) {
            $image_video = $request->file('new_image_video');
            $image_video_name = Str::random(40) . '.' . $image_video->getClientOriginalExtension();
            $image_video->storeAs('public/backend/courses/course-image-videos', $image_video_name);
        }
        else {
            $image_video_name = null;
        }

        if($request->file('new_instructor_profile_image') != null) {
            $image = $request->file('new_instructor_profile_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/courses/course-instructors', $image_name);
        }
        else {
            $image_name = null;
        }

        if($request->file('material_logistic') != null) {
            $material_logistic = $request->file('material_logistic');
            $material_logistic_name = Str::random(40) . '.' . $material_logistic->getClientOriginalExtension();
            $material_logistic->storeAs('public/backend/courses/material-and-logistics', $material_logistic_name);
        }
        else {
            $material_logistic_name = null;
        }

        $course = new Course();
        $data = $request->except('old_image_video', 'new_image_video', 'old_instructor_profile_image', 'new_instructor_profile_image', 'material_logistic');
        $data['image_video'] = $image_video_name;
        $data['instructor_profile_image'] = $image_name;
        $data['material_logistic'] = $material_logistic_name;
        $course->create($data);

        return redirect()->route('backend.courses.index')->with('success', 'Successfully created!');
    }

    public function edit(Course $course)
    {
        $image_video_file_extension = pathinfo($course->image_video, PATHINFO_EXTENSION);

        return view('backend.courses.edit', [
            'course' => $course,
            'image_video_file_extension' => $image_video_file_extension
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'new_image_video' => 'max:2048',
            'new_instructor_profile_image' => 'max:2048',
        ], [
            'new_image_video.max' => 'Image or video must not be greater than 2MB',
            'new_instructor_profile_image.max' => 'Image must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image_video') != null) {
            if($request->old_image_video) {
                Storage::delete('public/backend/courses/course-image-videos/' . $request->old_image_video);
            }

            $image_video = $request->file('new_image_video');
            $image_video_name = Str::random(40) . '.' . $image_video->getClientOriginalExtension();
            $image_video->storeAs('public/backend/courses/course-image-videos', $image_video_name);
        }
        else {
            $image_video_name = $request->old_image_video;
        }

        if($request->file('new_instructor_profile_image') != null) {
            if($request->old_instructor_profile_image) {
                Storage::delete('public/backend/courses/course-instructors/' . $request->old_instructor_profile_image);
            }

            $image = $request->file('new_instructor_profile_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/courses/course-instructors', $image_name);
        }
        else {
            $image_name = $request->old_instructor_profile_image;
        }

        if($request->file('new_material_logistic') != null) {
            if($request->old_material_logistic) {
                Storage::delete('public/backend/courses/material-and-logistics/' . $request->old_material_logistic);
            }

            $new_material_logistic = $request->file('new_material_logistic');
            $new_material_logistic_name = Str::random(40) . '.' . $new_material_logistic->getClientOriginalExtension();
            $new_material_logistic->storeAs('public/backend/courses/material-and-logistics', $new_material_logistic_name);
        }
        else {
            $new_material_logistic_name = $request->old_material_logistic;
        }

        $data = $request->except('old_image_video', 'new_image_video', 'old_instructor_profile_image', 'new_instructor_profile_image', 'old_material_logistic', 'new_material_logistic');
        $data['image_video'] = $image_video_name;
        $data['instructor_profile_image'] = $image_name;
        $data['material_logistic'] = $new_material_logistic_name;
        $course->fill($data)->save();
        
        return redirect()->route('backend.courses.index')->with('success', "Successfully updated!");
    }

    public function destroy(Course $course)
    {
        $course_modules = CourseModule::where('course_id', $course->id)->where('status', '!=', '0')->get();
        $course_chapters = CourseChapter::where('course_id', $course->id)->where('status', '!=', '0')->get();
        $course_module_exam_questions = CourseModuleExamQuestion::where('course_id', $course->id)->where('status', '!=', '0')->get();

        if($course_modules) {
            foreach($course_modules as $course_module) {
                $course_module->status = '0';
                $course_module->save();
            }
        }

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

        $course->status = '0';
        $course->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.courses.index');
        }

        $title = $request->title;
        $language = $request->language;

        $courses = Course::where('status', '!=', '0')->orderBy('id', 'desc');

        if($title != null) {
            $courses->where('title', 'like', '%' . $title . '%');
        }

        if($language != 'All') {
            $courses->where('language', $language);
        }

        $items = $request->items ?? 10;
        $courses = $courses->paginate($items);
        $courses = $this->processCourses($courses);

        return view('backend.courses.index', [
            'courses' => $courses,
            'items' => $items,
            'title' => $title,
            'language' => $language
        ]);
    }
}