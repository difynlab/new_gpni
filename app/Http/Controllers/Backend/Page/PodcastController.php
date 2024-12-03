<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\PodcastContent;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index($language)
    {
        $contents = PodcastContent::find(1);

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

        return view('backend.pages.podcast', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language) {
        $contents = PodcastContent::find(1);

        // Section 3 labels & links
            $section_3_labels_links = [];
            foreach($request->section_3_button_labels as $key => $section_3_button_label) {
                array_push($section_3_labels_links, [
                    'label' => $section_3_button_label,
                    'link' => $request->section_3_button_links[$key]
                ]);
            }
        // Section 3 labels & links

        $data = $request->except(
            'section_3_button_labels',
            'section_3_button_links'
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

        $data['section_3_labels_links_' . '' . $short_code] = json_encode($section_3_labels_links);

        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}