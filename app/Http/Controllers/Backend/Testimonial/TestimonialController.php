<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    private function processTestimonials($testimonials)
    {
        foreach($testimonials as $testimonial) {
            $testimonial->action = '
            <a href="'. route('backend.testimonials.edit', $testimonial->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$testimonial->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            for($i=1; $i <= $testimonial->rate; $i++) {
                $testimonial->updated_rate .= '<i class="bi bi-star-fill me-1 text-warning"></i>';
            }

            $testimonial->status = ($testimonial->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $testimonials;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $testimonials = Testimonial::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $testimonials = $this->processTestimonials($testimonials);

        return view('backend.testimonials.index', [
            'testimonials' => $testimonials,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.testimonials.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|max:2048'
        ], [
            'new_image.max' => 'The image must not be greater than 2MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/testimonials', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $testimonial = new Testimonial();
        $data = $request->except(
            'old_image',
            'new_image'
        );

        $data['image'] = $image_name;
        $testimonial->create($data);

        return redirect()->route('backend.testimonials.index')->with('success', 'Successfully created!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit', [
            'testimonial' => $testimonial
        ]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|max:2048'
        ], [
            'new_image.max' => 'The image must not be greater than 2MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/testimonials/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/testimonials', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except(
            'old_image',
            'new_image'
        );

        $data['image'] = $image_name;
        $testimonial->fill($data)->save();
        
        return redirect()->route('backend.testimonials.index')->with('success', "Successfully updated!");
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->status = '0';
        $testimonial->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.testimonials.index');
        }

        $name = $request->name;
        $rate = $request->rate;
        $language = $request->language;

        $testimonials = Testimonial::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $testimonials->where('name', 'like', '%' . $name . '%');
        }

        if($rate != 'All') {
            $testimonials->where('rate', $rate);
        }

        if($language != 'All') {
            $testimonials->where('language', $language);
        }

        $items = $request->items ?? 10;
        $testimonials = $testimonials->paginate($items);
        $testimonials = $this->processTestimonials($testimonials);

        return view('backend.testimonials.index', [
            'testimonials' => $testimonials,
            'items' => $items,
            'name' => $name,
            'rate' => $rate,
            'language' => $language
        ]);
    }
}