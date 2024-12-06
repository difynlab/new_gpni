<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\MembershipContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    public function index($language)
    {
        $contents = MembershipContent::find(1);

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

        return view('backend.pages.membership', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $validator = Validator::make($request->all(), [
            'new_section_2_image' => 'nullable|max:5120'
        ], [
            'new_section_2_image.max' => 'Image must not be greater than 5 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }
        
        $contents = MembershipContent::find(1);

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

        // Section 3 labels & links
            if($request->section_3_labels[0] != null) {
                $label_contents = [];

                foreach($request->section_3_labels as $key => $section_3_label) {
                    array_push($label_contents, [
                        'title' => $section_3_label,
                        'content' => $request->section_3_contents[$key] ?? null
                    ]);
                }
                $final_label_contents = $label_contents ? json_encode($label_contents) : null;
            }
        // Section 3 labels & links

        // Section 4 labels & links
            $section_4_labels_links = [];
            foreach($request->section_4_button_labels as $key => $section_4_button_label) {
                array_push($section_4_labels_links, [
                    'label' => $section_4_button_label,
                    'link' => $request->section_4_button_links[$key]
                ]);
            }
        // Section 4 labels & links

        $data = $request->except(
            'old_section_2_image',
            'new_section_2_image',
            'section_3_labels',
            'section_3_contents',
            'section_4_button_labels',
            'section_4_button_links',
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

        $data['section_2_image_' . '' . $short_code] = $section_2_image_name;
        $data['section_3_labels_contents_' . '' . $short_code] = $final_label_contents ?? null;
        $data['section_4_labels_links_' . '' . $short_code] = json_encode($section_4_labels_links);

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}