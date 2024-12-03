<?php

namespace App\Http\Controllers\Backend\Promotion;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    private function processPromotions($promotions)
    {
        foreach($promotions as $promotion) {
            $promotion->action = '
            <a href="'. route('backend.promotions.edit', $promotion->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$promotion->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $promotion->status = ($promotion->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $promotions;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $promotions = Promotion::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $promotions = $this->processPromotions($promotions);

        return view('backend.promotions.index', [
            'promotions' => $promotions,
            'items' => $items
        ]);
    }

    public function create()
    {
        $courses = Course::where('status', '1')->get();
        
        return view('backend.promotions.create', [
            'courses' => $courses
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $promotion_type = $request->type;

        if($promotion_type == 'Course Discount') {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'old_course_id' => 'required',
                'new_course_id' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value == $request->old_course_id) {
                            $fail('The new course ID must not match the old course ID');
                        }
                    },
                ],
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                'coupon_code' => 'required',
                'coupon_code_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        $promotion = new Promotion();
        $data = $request->all();
        $promotion->create($data);

        return redirect()->route('backend.promotions.index')->with('success', 'Successfully created!');
    }

    public function edit(Promotion $promotion)
    {
        $courses = Course::where('status', '1')->get();

        return view('backend.promotions.edit', [
            'promotion' => $promotion,
            'courses' => $courses
        ]);
    }

    public function update(Request $request, Promotion $promotion)
    {
        $promotion_type = $request->type;

        if($promotion_type == 'Course Discount') {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'old_course_id' => 'required',
                'new_course_id' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value == $request->old_course_id) {
                            $fail('The new course ID must not match the old course ID');
                        }
                    },
                ],
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                'coupon_code' => 'required',
                'coupon_code_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $data = $request->all();
        $promotion->fill($data)->save();
        
        return redirect()->route('backend.promotions.index')->with('success', "Successfully updated!");
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->status = '0';
        $promotion->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}
