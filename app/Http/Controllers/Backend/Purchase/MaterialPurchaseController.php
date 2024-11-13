<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Mail\SendMaterialMail;
use App\Models\Course;
use App\Models\MaterialPurchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MaterialPurchaseController extends Controller
{
    private function processMaterialPurchases($material_purchases)
    {
        foreach($material_purchases as $material_purchase) {
            $material_purchase->action = '
            <a href="'. route('backend.purchases.material-purchases.show', $material_purchase->id) .'" class="review-button" title="Details"><i class="bi bi-calendar-fill"></i></a>
            <a id="'.$material_purchase->id.'" class="send-button" title="Send"><i class="bi bi-envelope-fill"></i></a>
            <a id="'.$material_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $material_purchase->student_id = User::find($material_purchase->student_id)->first_name . ' ' . User::find($material_purchase->student_id)->last_name;

            $material_purchase->course_id = Course::find($material_purchase->course_id)->title;

            $material_purchase->date_time = $material_purchase->date . ' | ' . $material_purchase->time;

            $material_purchase->payment_status = 
                ($material_purchase->payment_status == 'Completed') 
                ? '<span class="active-status">Completed</span>' 
                : (($material_purchase->payment_status == 'Pending') 
                    ? '<span class="pending-status">Pending</span>' 
                    : '<span class="inactive-status">Failed</span>');
        }

        return $material_purchases;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $material_purchases = MaterialPurchase::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $material_purchases = $this->processMaterialPurchases($material_purchases);

        return view('backend.purchases.material-purchases.index', [
            'material_purchases' => $material_purchases,
            'items' => $items
        ]);
    }

    public function show(MaterialPurchase $material_purchase)
    {
        $student = User::find($material_purchase->student_id)->first_name . ' ' . User::find($material_purchase->student_id)->last_name;

        $course = Course::where('status', '1')->find($material_purchase->course_id)->title;

        return view('backend.purchases.material-purchases.show', [
            'material_purchase' => $material_purchase,
            'student' => $student,
            'course' => $course
        ]);
    }

    public function send(MaterialPurchase $material_purchase) {
        $course = Course::where('status', '1')->find($material_purchase->course_id);
        $student = User::where('status', '1')->find($material_purchase->student_id);

        $file_name = $course->material_logistic;
        $file_path = storage_path('app/public/backend/courses/material-and-logistics/' . $file_name);

        $mail_data = [
            'name' => $student->first_name . ' ' . $student->last_name
        ];

        Mail::to([$student->email])->send(new SendMaterialMail($mail_data, $file_path, $file_name));

        return redirect()->route('backend.purchases.material-purchases.index')->with('success', 'Material sent successfully');
    }

    public function destroy(MaterialPurchase $material_purchase)
    {
        $material_purchase->status = '0';
        $material_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.purchases.material-purchases.index');
        }

        $transaction_id = $request->transaction_id;
        // $buyer_receiver_name = $request->buyer_receiver_name;
        $date = $request->date;

        $material_purchases = MaterialPurchase::where('status', '1')->orderBy('id', 'desc');

        if($transaction_id != null) {
            $material_purchases->where('transaction_id', 'like', '%' . $transaction_id . '%');
        }

        // if($buyer_receiver_name != null) {
        //     $material_purchases->where(function ($query) use ($buyer_receiver_name) {
        //         $query->where('buyer_name', 'like', '%' . $buyer_receiver_name . '%')
        //             ->orWhere('receiver_name', 'like', '%' . $buyer_receiver_name . '%');
        //     });
        // }

        if($date != null) {
            $material_purchases->where('date', $date);
        }

        $items = $request->items ?? 10;
        $material_purchases = $material_purchases->paginate($items);
        $material_purchases = $this->processMaterialPurchases($material_purchases);

        return view('backend.purchases.material-purchases.index', [
            'material_purchases' => $material_purchases,
            'items' => $items,
            'transaction_id' => $transaction_id,
            // 'buyer_receiver_name' => $buyer_receiver_name,
            'date' => $date,
        ]);
    }
}