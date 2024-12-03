<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseReviewController extends Controller
{
    private function processCourseReviews($course_reviews)
    {
        foreach($course_reviews as $course_review) {
            $course_review->action = '
            <a href="'. route('backend.courses.reviews.edit', [$course_review->course_id, $course_review->id]) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$course_review->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_review->status = ($course_review->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $course_reviews;
    }
    
    public function index(Course $course)
    {
        $items = $request->items ?? 10;

        $course_reviews = CourseReview::where('course_id', $course->id)->where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $course_reviews = $this->processCourseReviews($course_reviews);

        return view('backend.course-reviews.index', [
            'course' => $course,
            'course_reviews' => $course_reviews,
            'items' => $items
        ]);
    }

    public function create(Course $course)
    {
        return view('backend.course-reviews.create', [
            'course' => $course
        ]);
    }
                                                                              
    public function store(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|max:2048'
        ], [
            'new_image.max' => 'image must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image')) {
            $new_image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $new_image->getClientOriginalExtension();
            $new_image->storeAs('public/backend/courses/course-reviews', $image_name);
        }
        else {
            $image_name = null;
        }

        $course_review = new CourseReview();
        $data = $request->except(
            'old_image',
            'new_image'
        );
        $data['image'] = $image_name;
        $data['course_id'] = $course->id;

        $course_review->create($data);

        return redirect()->route('backend.courses.reviews.index', $course->id)->with('success', 'Successfully created!');
    }

    public function edit(Course $course, CourseReview $course_review)
    {
        return view('backend.course-reviews.edit', [
            'course' => $course,
            'course_review' => $course_review,
        ]);
    }

    public function update(Request $request, Course $course, CourseReview $course_review)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|max:2048'
        ], [
            'new_image.max' => 'The image must not be greater than 2MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image')) {
            if($request->old_image) {
                Storage::delete('public/backend/courses/course-reviews/' . $request->old_image);
            }

            $new_image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $new_image->getClientOriginalExtension();
            $new_image->storeAs('public/backend/courses/course-reviews', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except(
            'old_image',
            'new_image'
        );

        $data['image'] = $image_name;
        $data['course_id'] = $course->id;
        $course_review->fill($data)->save();

        return redirect()->route('backend.courses.reviews.index', $course->id)->with('success', "Successfully updated!");
    }

    public function destroy(Course $course, CourseReview $course_review)
    {
        $course_review->status = '0';
        $course_review->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}