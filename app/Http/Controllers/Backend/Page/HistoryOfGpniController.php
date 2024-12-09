<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\HistoryOfGpniContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HistoryOfGpniController extends Controller
{
    public function index($language)
    {
        $contents = HistoryOfGpniContent::find(1);

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

        return view('backend.pages.history-of-gpni', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_section_1_image' => 'max:30720',
            'new_section_3_image' => 'max:30720',
            'new_section_5_image' => 'max:30720',
            'new_section_6_image' => 'max:30720',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $contents = HistoryOfGpniContent::find(1);

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

        // Section 3 image
            if($request->file('new_section_3_image')) {
                if($request->old_section_3_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_3_image);
                }

                $new_section_3_image = $request->file('new_section_3_image');
                $section_3_image_name = Str::random(40) . '.' . $new_section_3_image->getClientOriginalExtension();
                $new_section_3_image->storeAs('public/backend/pages', $section_3_image_name);
            }
            else {
                if($contents->section_3_image_ . '' . $language) {
                    $section_3_image_name = $request->old_section_3_image;
                }
                else {
                    $section_3_image_name = null;
                }
            }
        // Section 3 image

        // Section 5 image
            if($request->file('new_section_5_image')) {
                if($request->old_section_5_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_5_image);
                }

                $new_section_5_image = $request->file('new_section_5_image');
                $section_5_image_name = Str::random(40) . '.' . $new_section_5_image->getClientOriginalExtension();
                $new_section_5_image->storeAs('public/backend/pages', $section_5_image_name);
            }
            else {
                if($contents->section_5_image_ . '' . $language) {
                    $section_5_image_name = $request->old_section_5_image;
                }
                else {
                    $section_5_image_name = null;
                }
            }
        // Section 5 image

        // Section 6 image
            if($request->file('new_section_6_image')) {
                if($request->old_section_6_image) {
                    Storage::delete('public/backend/pages/' . $request->old_section_6_image);
                }

                $new_section_6_image = $request->file('new_section_6_image');
                $section_6_image_name = Str::random(40) . '.' . $new_section_6_image->getClientOriginalExtension();
                $new_section_6_image->storeAs('public/backend/pages', $section_6_image_name);
            }
            else {
                if($contents->section_6_image_ . '' . $language) {
                    $section_6_image_name = $request->old_section_6_image;
                }
                else {
                    $section_6_image_name = null;
                }
            }
        // Section 6 image

        $data = $request->except(
            'old_section_1_image',
            'new_section_1_image',
            'old_section_3_image',
            'new_section_3_image',
            'old_section_5_image',
            'new_section_5_image',
            'old_section_6_image',
            'new_section_6_image'
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
        $data['section_3_image_' . '' . $short_code] = $section_3_image_name;
        $data['section_5_image_' . '' . $short_code] = $section_5_image_name;
        $data['section_6_image_' . '' . $short_code] = $section_6_image_name;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}