<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\InsuranceProfessionalMembershipContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InsuranceProfessionalMembershipController extends Controller
{
    public function index($language)
    {
        $contents = InsuranceProfessionalMembershipContent::find(1);

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

        return view('backend.pages.insurance-professional-membership', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_section_1_image' => 'max:30720',
            'new_section_2_image' => 'max:30720',
            'new_section_4_image' => 'max:30720',
        ], [
            'new_section_1_image.max' => 'Image must not be greater than 30 MB',
            'new_section_2_image.max' => 'Image must not be greater than 30 MB',
            'new_section_4_image.max' => 'Image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }
        
        $contents = InsuranceProfessionalMembershipContent::find(1);

        // Section 1 image
            if($request->file('new_section_1_image')) {
                if($request->old_section_1_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_1_image);
                }

                $new_section_1_image = $request->file('new_section_1_image');
                $section_1_image_name = Str::random(40) . '.' . $new_section_1_image->getClientOriginalExtension();
                $new_section_1_image->storeAs('public/backend/pages', $section_1_image_name);
            }
            else {
                if($contents->section_1_image_ . '' . $language) {
                    $section_1_image_name = $request->old_section_1_image;
                }
                else {
                    $section_1_image_name = null;
                }
            }
        // Section 1 image

        // Section 2 image
            if($request->file('new_section_2_image')) {
                if($request->old_section_2_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_2_image);
                }

                $new_section_2_image = $request->file('new_section_2_image');
                $section_2_image_name = Str::random(40) . '.' . $new_section_2_image->getClientOriginalExtension();
                $new_section_2_image->storeAs('public/backend/pages', $section_2_image_name);
            }
            else {
                if($contents->section_2_image_ . '' . $language) {
                    $section_2_image_name = $request->old_section_2_image;
                }
                else {
                    $section_2_image_name = null;
                }
            }
        // Section 2 image

        // Section 4 image
            if($request->file('new_section_4_image')) {
                if($request->old_section_4_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_4_image);
                }

                $new_section_4_image = $request->file('new_section_4_image');
                $section_4_image_name = Str::random(40) . '.' . $new_section_4_image->getClientOriginalExtension();
                $new_section_4_image->storeAs('public/backend/pages', $section_4_image_name);
            }
            else {
                if($contents->section_4_image_ . '' . $language) {
                    $section_4_image_name = $request->old_section_4_image;
                }
                else {
                    $section_4_image_name = null;
                }
            }
        // Section 4 image

        $data = $request->except(
            'old_section_1_image',
            'new_section_1_image',
            'old_section_2_image',
            'new_section_2_image',
            'old_section_4_image',
            'new_section_4_image'
        );
        
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

        $data['section_1_image_' . '' . $short_code] = $section_1_image_name;
        $data['section_2_image_' . '' . $short_code] = $section_2_image_name;
        $data['section_4_image_' . '' . $short_code] = $section_4_image_name;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}