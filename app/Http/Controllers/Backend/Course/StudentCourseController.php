<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\User;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    private function processCoursePurchases($course_purchases)
    {
        foreach($course_purchases as $course_purchase) {
            $course_purchase->action = '
            <a href="'. route('backend.persons.students.courses.edit', [$course_purchase->user_id, $course_purchase->id]) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$course_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_purchase->course = Course::find($course_purchase->course_id)->title;

            $course_purchase->course_access_status = ($course_purchase->course_access_status == 'Active') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Revoked</span>';

            $course_purchase->status = ($course_purchase->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $course_purchases;
    }

    public function index(Request $request, User $student)
    {
        $items = $request->items ?? 10;
        $course_purchases = CoursePurchase::where('user_id', $student->id)->where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $course_purchases = $this->processCoursePurchases($course_purchases);

        return view('backend.student-courses.index', [
            'course_purchases' => $course_purchases,
            'items' => $items,
            'student' => $student
        ]);
    }

    public function create(User $student)
    {
        $purchased_course_ids = CoursePurchase::where('user_id', $student->id)->where('status', '1')->pluck('course_id')->toArray();
        $courses = Course::whereNotIn('id', $purchased_course_ids)->where('status', '1')->get();

        return view('backend.student-courses.create', [
            'courses' => $courses,
            'student' => $student
        ]);
    }
                                                                              
    public function store(Request $request, User $student)
    {
        if($student->language == 'English') {
            $currency = 'usd';
        }
        elseif($student->language == 'Chinese') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $course_purchase = new CoursePurchase();
        $course_purchase->user_id = $student->id;
        $course_purchase->course_id = $request->course_id;
        $course_purchase->date = now()->toDateString();
        $course_purchase->time = now()->toTimeString();
        $course_purchase->currency = $currency;
        $course_purchase->amount_paid = 0.00;
        $course_purchase->payment_status = 'Completed';
        $course_purchase->refund_status = null;
        $course_purchase->status = '1';
        $course_purchase->save();

        return redirect()->route('backend.persons.students.courses.index', $student)->with('success', 'Successfully added!');
    }

    public function edit(User $student, CoursePurchase $course_purchase)
    {
        $courses = Course::where('status', '1')->get();

        return view('backend.student-courses.edit', [
            'courses' => $courses,
            'course_purchase' => $course_purchase,
            'student' => $student
        ]);
    }

    public function update(Request $request, User $student, CoursePurchase $course_purchase)
    {
        $course_purchase->course_access_status = $request->course_access_status;
        $course_purchase->save();

        return redirect()->route('backend.persons.students.courses.index', $student)->with('success', 'Successfully updated!');
    }

    public function destroy(User $student, CoursePurchase $course_purchase)
    {
        $course_purchase->status = '0';
        $course_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request, User $student)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.persons.students.courses.index', $student);
        }

        $title = $request->title;

        $course_purchases = CoursePurchase::where('user_id', $student->id)->where('status', '1')->orderBy('id', 'desc');

        if($title) {
            $course_ids = Course::where('title', 'like', '%' . $title . '%')->where('status', '1')->orderBy('id', 'desc')->pluck('id')->toArray();

            $course_purchases->whereIn('course_id', $course_ids);
        }

        $items = $request->items ?? 10;
        $course_purchases = $course_purchases->paginate($items);
        $course_purchases = $this->processCoursePurchases($course_purchases);

        return view('backend.student-courses.index', [
            'course_purchases' => $course_purchases,
            'student' => $student,
            'items' => $items,
            'title' => $title
        ]);
    }
}