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
            'new_video' => 'nullable|max:5120'
        ], [
            'new_video.max' => 'Video must not be greater than 5MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_video')) {
            $new_video = $request->file('new_video');
            $video_name = Str::random(40) . '.' . $new_video->getClientOriginalExtension();
            $new_video->storeAs('public/backend/courses/course-reviews', $video_name);
        }
        else {
            $video_name = null;
        }

        $course_review = new CourseReview();
        $data = $request->except(
            'old_video',
            'new_video'
        );
        $data['video'] = $video_name;
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
            'new_video' => 'nullable|max:5120'
        ], [
            'new_video.max' => 'The video must not be greater than 5MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_video')) {
            if($request->old_video) {
                Storage::delete('public/backend/courses/course-reviews/' . $request->old_video);
            }

            $new_video = $request->file('new_video');
            $video_name = Str::random(40) . '.' . $new_video->getClientOriginalExtension();
            $new_video->storeAs('public/backend/courses/course-reviews', $video_name);
        }
        else {
            $video_name = $request->old_video;
        }

        $data = $request->except(
            'old_video',
            'new_video'
        );

        $data['video'] = $video_name;
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