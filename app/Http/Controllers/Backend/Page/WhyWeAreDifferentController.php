<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\WhyWeAreDifferentContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WhyWeAreDifferentController extends Controller
{
    public function index($language)
    {
        $contents = WhyWeAreDifferentContent::find(1);

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

        return view('backend.pages.why-we-are-different', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_section_1_video' => 'max:2048',
            'new_section_2_image' => 'max:2048'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }
        
        $contents = WhyWeAreDifferentContent::find(1);

        // Section 1 video
            if($request->file('new_section_1_video')) {
                if($request->old_section_1_video) {
                    Storage::delete('public/backend/pages/' . $request->old_section_1_video);
                }

                $new_section_1_video = $request->file('new_section_1_video');
                $section_1_video_name = Str::random(40) . '.' . $new_section_1_video->getClientOriginalExtension();
                $new_section_1_video->storeAs('public/backend/pages', $section_1_video_name);
            }
            else {
                if($contents->section_1_video_ . '' . $language) {
                    $section_1_video_name = $request->old_section_1_video;
                }
                else {
                    $section_1_video_name = null;
                }
            }
        // Section 1 video

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

        $data = $request->except(
            'old_section_1_video',
            'new_section_1_video',
            'old_section_2_image',
            'new_section_2_image'
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

        $data['section_1_video_' . '' . $short_code] = $section_1_video_name;
        $data['section_2_image_' . '' . $short_code] = $section_2_image_name;

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}