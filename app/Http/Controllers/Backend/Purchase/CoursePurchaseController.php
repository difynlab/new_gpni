<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCertificate;
use App\Models\CoursePurchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CoursePurchaseController extends Controller
{
    private function processCoursePurchases($course_purchases)
    {
        foreach($course_purchases as $course_purchase) {
            $course_purchase->action = '
            <a href="'. route('backend.purchases.course-purchases.show', $course_purchase->id) .'" class="review-button" title="Details"><i class="bi bi-calendar-fill"></i></a>
            <a href="'. route('backend.purchases.course-purchases.certificates.index', $course_purchase->id) .'" class="edit-button" title="Provide Certificate"><i class="bi bi-patch-check-fill"></i></a>
            <a id="'.$course_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_purchase->user_id = User::find($course_purchase->user_id)->first_name . ' ' . User::find($course_purchase->user_id)->last_name;
            $course_purchase->course_id = Course::find($course_purchase->course_id)->title;

            $course_purchase->date_time = $course_purchase->date . ' | ' . $course_purchase->time;

            $course_purchase->payment_status = 
                ($course_purchase->payment_status == 'Completed') 
                ? '<span class="active-status">Completed</span>' 
                : (($course_purchase->payment_status == 'Pending') 
                    ? '<span class="pending-status">Pending</span>' 
                    : (($course_purchase->payment_status == 'Failed') 
                    ? '<span class="pending-status">Failed</span>' 
                    : '<span class="active-status">Directly Added</span>'));

            $course_purchase->course_access_status = ($course_purchase->course_access_status == 'Active') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Revoked</span>';
        }

        return $course_purchases;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $course_purchases = CoursePurchase::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $course_purchases = $this->processCoursePurchases($course_purchases);

        return view('backend.purchases.course-purchases.index', [
            'course_purchases' => $course_purchases,
            'items' => $items
        ]);
    }

    public function show(CoursePurchase $course_purchase)
    {
        $student = User::find($course_purchase->user_id)->first_name . ' ' . User::find($course_purchase->user_id)->last_name;

        $course = Course::where('status', '1')->find($course_purchase->course_id)->title;

        return view('backend.purchases.course-purchases.show', [
            'course_purchase' => $course_purchase,
            'student' => $student,
            'course' => $course
        ]);
    }

    public function destroy(CoursePurchase $course_purchase)
    {
        $course_purchase->status = '0';
        $course_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.purchases.course-purchases.index');
        }

        $transaction_id = $request->transaction_id;
        // $buyer_receiver_name = $request->buyer_receiver_name;
        $date = $request->date;

        $course_purchases = CoursePurchase::where('status', '1')->orderBy('id', 'desc');

        if($transaction_id != null) {
            $course_purchases->where('transaction_id', 'like', '%' . $transaction_id . '%');
        }

        // if($buyer_receiver_name != null) {
        //     $course_purchases->where(function ($query) use ($buyer_receiver_name) {
        //         $query->where('buyer_name', 'like', '%' . $buyer_receiver_name . '%')
        //             ->orWhere('receiver_name', 'like', '%' . $buyer_receiver_name . '%');
        //     });
        // }

        if($date != null) {
            $course_purchases->where('date', $date);
        }

        $items = $request->items ?? 10;
        $course_purchases = $course_purchases->paginate($items);
        $course_purchases = $this->processCoursePurchases($course_purchases);

        return view('backend.purchases.course-purchases.index', [
            'course_purchases' => $course_purchases,
            'items' => $items,
            'transaction_id' => $transaction_id,
            // 'buyer_receiver_name' => $buyer_receiver_name,
            'date' => $date,
        ]);
    }

    public function certificate(CoursePurchase $course_purchase)
    {
        $certificate = CourseCertificate::where('course_purchase_id', $course_purchase->id)->first();

        if(!$certificate) {
            $certificate = new CourseCertificate();
            $certificate->course_purchase_id = $course_purchase->id;
            $certificate->status = '1';
            $certificate->save();
        }

        return view('backend.purchases.course-purchases.certificate', [
            'course_purchase' => $course_purchase,
            'certificate' => $certificate
        ]);
    }

    public function certificateUpdate(Request $request, CourseCertificate $course_certificate)
    {
        $validator = Validator::make($request->all(), [
            'new_certificate' => 'nullable|max:5120'
        ], [
            'new_certificate.max' => 'The file must not be greater than 5 MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_certificate') != null) {
            if($request->old_certificate) {
                Storage::delete('public/backend/courses/course-certificates/' . $request->old_certificate);
            }

            $new_certificate = $request->file('new_certificate');
            $new_certificate_name = Str::random(40) . '.' . $new_certificate->getClientOriginalExtension();
            $new_certificate->storeAs('public/backend/courses/course-certificates', $new_certificate_name);
        }
        else {
            $new_certificate_name = $request->old_certificate;
        }

        $data = $request->except('old_certificate', 'new_certificate');
        $data['certificate'] = $new_certificate_name;
        $course_certificate->fill($data)->save();
        
        return redirect()->route('backend.purchases.course-purchases.certificates.index', $course_certificate->course_purchase_id)->with('success', "Successfully updated!");
    }
}