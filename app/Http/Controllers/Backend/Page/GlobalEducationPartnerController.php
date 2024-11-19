<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\GlobalEducationPartnerContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GlobalEducationPartnerController extends Controller
{
    public function index($language)
    {
        $contents = GlobalEducationPartnerContent::find(1);

        switch($language){
            case 'english':
                $short_code = 'en';
                break;
            case 'chinese':
                $short_code = 'zh';
                break;
            case 'japanese':
                $short_code = 'ja';
                break;
            default:
                $short_code = 'unknown';
                break;
        }

        return view('backend.pages.global-education-partner', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        switch($language){
            case 'english':
                $short_code = 'en';
                break;
            case 'chinese':
                $short_code = 'zh';
                break;
            case 'japanese':
                $short_code = 'ja';
                break;
            default:
                $short_code = 'unknown';
                break;
        }

        $validator = Validator::make($request->all(), [
            'section_5_point_images.*' => 'max:2048'
        ], [
            'section_5_point_images.*.max' => 'Each image must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }
        
        $contents = GlobalEducationPartnerContent::find(1);

        // Section 2 points
            $section_2_points = [];
            foreach($request->section_2_points_partner_name as $key => $section_2_points_partner_name) {
                array_push($section_2_points, [
                    'partner_name' => $section_2_points_partner_name,
                    'course_name' => $request->section_2_points_course_name[$key],
                    'points' => $request->section_2_points[$key]
                ]);
            }
        // Section 2 points

        // Section 4 labels & links
            $section_4_label_link = [
                'label' => $request->section_4_button_label,
                'link' => $request->section_4_button_link
            ];
        // Section 4 labels & links

        // Section 5 images
            $section_5_point_images = $request->section_5_old_point_images ?? [];

            $current_images = $contents->{'section_5_points_' . $short_code} ? json_decode($contents->{'section_5_points_' . $short_code}, true) : [];

            if(!empty($current_images)) {
                foreach($current_images as $current_image) {
                    if(!in_array($current_image['image'], $section_5_point_images)) {
                        Storage::delete('public/backend/pages/' . $current_image['image']);
                    }
                }
            }

            if($request->file('section_5_point_images')) {
                foreach($section_5_point_images as $index => $old_image) {
                    if(isset($request->file('section_5_point_images')[$index])) {
                        Storage::delete('public/backend/pages/' . $old_image);

                        $new_image = $request->file('section_5_point_images')[$index];
                        $image_name = Str::random(40) . '.' . $new_image->getClientOriginalExtension();
                        $new_image->storeAs('public/backend/pages', $image_name);

                        $section_5_point_images[$index] = $image_name;
                    }
                }

                foreach($request->file('section_5_point_images') as $new_image) {
                    if(!isset($section_5_point_images[array_search($new_image, $request->file('section_5_point_images'))])) {
                        $image_name = Str::random(40) . '.' . $new_image->getClientOriginalExtension();
                        $new_image->storeAs('public/backend/pages', $image_name);
                        $section_5_point_images[] = $image_name;
                    }
                }
            }
        // Section 5 images

        if($section_5_point_images) {
            $section_5_points = [];
            foreach($request->section_5_point_contents as $key => $section_5_point_content) {
                array_push($section_5_points, [
                    'content' => $section_5_point_content,
                    'image' => $section_5_point_images[$key]
                ]);
            }

            $section_5_points = json_encode($section_5_points);
        }
        else {
            $section_5_points = null;
        }

        $data = $request->except(
            'section_2_points_partner_name',
            'section_2_points_course_name',
            'section_2_points',
            'section_3_languages',
            'section_4_button_label',
            'section_4_button_link',
            'section_5_old_point_images',
            'section_5_point_images',
            'section_5_point_contents'
        );

        $data['section_2_points_' . '' . $short_code] = json_encode($section_2_points);
        $data['section_3_languages_' . '' . $short_code] = json_encode($request->section_3_languages);
        $data['section_4_label_link_' . '' . $short_code] = json_encode($section_4_label_link);
        $data['section_5_points_' . '' . $short_code] = $section_5_points;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}