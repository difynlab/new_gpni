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
use Illuminate\Validation\Rule;

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
            'new_image' => 'required|max:2048',
            'new_video' => 'required|max:2048',
            'new_instructor_profile_image' => 'required|max:2048',
            'new_certificate_images.*' => 'max:2048',
        ], [
            'new_image.max' => 'Image must not be greater than 2MB',
            'new_image.required' => 'This field is required',
            'new_video.max' => 'Video must not be greater than 2MB',
            'new_video.required' => 'This field is required',
            'new_instructor_profile_image.max' => 'Image must not be greater than 2MB',
            'new_instructor_profile_image.required' => 'Instructor profile image is required',
            'new_certificate_images.*.max' => 'Each image must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/courses/course-images', $image_name);
        }
        else {
            $image_name = null;
        }

        if($request->file('new_video') != null) {
            $video = $request->file('new_video');
            $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/backend/courses/course-videos', $video_name);
        }
        else {
            $video_name = null;
        }

        if($request->file('new_instructor_profile_image') != null) {
            $instructor_profile_image = $request->file('new_instructor_profile_image');
            $instructor_profile_image_name = Str::random(40) . '.' . $instructor_profile_image->getClientOriginalExtension();
            $instructor_profile_image->storeAs('public/backend/courses/course-instructors', $instructor_profile_image_name);
        }
        else {
            $instructor_profile_image_name = null;
        }

        if($request->file('new_certificate_images') != null) {
            $certificate_images = [];
            foreach($request->file('new_certificate_images') as $image) {
                $certificate_image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/backend/courses/certificate-images', $certificate_image_name);
                $certificate_images[] = $certificate_image_name;
            }

            $certificate_images = json_encode($certificate_images);
        }
        else {
            $certificate_images = null;
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
        $data = $request->except('old_image', 'new_image', 'old_video', 'new_video', 'old_instructor_profile_image', 'new_instructor_profile_image', 'material_logistic', 'old_certificate_images', 'new_certificate_images');
        $data['image'] = $image_name;
        $data['video'] = $video_name;
        $data['instructor_profile_image'] = $instructor_profile_image_name;
        $data['certificate_images'] = $certificate_images;
        $data['material_logistic'] = $material_logistic_name;
        $course->create($data);

        return redirect()->route('backend.courses.index')->with('success', 'Successfully created!');
    }

    public function edit(Course $course)
    {
        return view('backend.courses.edit', [
            'course' => $course
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'max:2048',
            'new_video' => [
                'max:2048',
                Rule::requiredIf(function () use ($request) {
                    return is_null($request->old_video);
                }),
            ],
            'new_instructor_profile_image' => 'max:2048',
            'new_certificate_images.*' => 'max:2048'
        ], [
            'new_image.max' => 'Image must not be greater than 2MB',
            'new_video.max' => 'Video must not be greater than 2MB',
            'new_video.required' => 'New video is required if there is no old video',
            'new_instructor_profile_image.max' => 'Image must not be greater than 2MB',
            'new_certificate_images.*.max' => 'Each image must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/courses/course-images/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/courses/course-images', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        if($request->file('new_video') != null) {
            if($request->old_video) {
                Storage::delete('public/backend/courses/course-videos/' . $request->old_video);
            }

            $video = $request->file('new_video');
            $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/backend/courses/course-videos', $video_name);
        }
        else {
            $video_name = $request->old_video;
        }

        if($request->file('new_instructor_profile_image') != null) {
            if($request->old_instructor_profile_image) {
                Storage::delete('public/backend/courses/course-instructors/' . $request->old_instructor_profile_image);
            }

            $instructor_profile_image = $request->file('new_instructor_profile_image');
            $instructor_profile_image_name = Str::random(40) . '.' . $instructor_profile_image->getClientOriginalExtension();
            $instructor_profile_image->storeAs('public/backend/courses/course-instructors', $instructor_profile_image_name);
        }
        else {
            $instructor_profile_image_name = $request->old_instructor_profile_image;
        }

        if($request->file('new_certificate_images') != null) {
            if($request->old_certificate_images) {
                $encoded_string = htmlspecialchars_decode($request->old_certificate_images);
                $images = json_decode($encoded_string);

                foreach($images as $image) {
                    Storage::delete('public/backend/courses/certificate-images/' . $image);
                }
            }

            $certificate_images = [];
            foreach($request->file('new_certificate_images') as $image) {
                $certificate_image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/backend/courses/certificate-images', $certificate_image_name);
                $certificate_images[] = $certificate_image_name;
            }

            $certificate_images = json_encode($certificate_images);
        }
        else {
            if($course->certificate_images) {
                $certificate_images = htmlspecialchars_decode($request->old_certificate_images);
            }
            else {
                $certificate_images = null;
            }
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

        $data = $request->except('old_image', 'new_image', 'old_video', 'new_video', 'old_instructor_profile_image', 'new_instructor_profile_image', 'old_material_logistic', 'new_material_logistic', 'old_certificate_images', 'new_certificate_images');
        $data['image'] = $image_name;
        $data['video'] = $video_name;
        $data['instructor_profile_image'] = $instructor_profile_image_name;
        $data['certificate_images'] = $certificate_images;
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