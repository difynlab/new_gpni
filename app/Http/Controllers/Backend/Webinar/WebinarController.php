<?php

namespace App\Http\Controllers\Backend\Webinar;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    private function processWebinars($webinars)
    {
        foreach($webinars as $webinar) {
            $webinar->action = '
            <a href="'. route('backend.webinars.edit', $webinar->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$webinar->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $webinar->video = $webinar->video != null ? '
            <video width="300" height="200" controls>
                <source src="'. asset('storage/backend/webinars/' . $webinar->video) .'" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            ' : '<img src="'. asset('storage/backend/common/' . Setting::find(1)->no_image) .'" class="table-image">';

            $webinar->status = ($webinar->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $webinars;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $webinars = Webinar::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $webinars = $this->processWebinars($webinars);

        return view('backend.webinars.index', [
            'webinars' => $webinars,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.webinars.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_video' => 'required|max:102400',
            'content' => 'required'
        ], [
            'new_video.required' => 'The video field must be required',
            'new_video.max' => 'The video must not be greater than 100 MB',
            'content.required' => 'The content field must be required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_video') != null) {
            $video = $request->file('new_video');
            $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/backend/webinars', $video_name);
        }
        else {
            $video_name = $request->old_video;
        }

        $webinar = new Webinar();
        $data = $request->except(
            'old_video',
            'new_video'
        );

        $data['video'] = $video_name;
        $webinar->create($data);

        return redirect()->route('backend.webinars.index')->with('success', 'Successfully created!');
    }

    public function edit(Webinar $webinar)
    {
        return view('backend.webinars.edit', [
            'webinar' => $webinar
        ]);
    }

    public function update(Request $request, Webinar $webinar)
    {
        $validator = Validator::make($request->all(), [
            'new_video' => 'nullable|max:102400',
            'content' => 'required'
        ], [
            'new_video.required' => 'The video field must be required',
            'new_video.max' => 'The video must not be greater than 100 MB',
            'content.required' => 'The content field must be required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_video') != null) {
            if($request->old_video) {
                Storage::delete('public/backend/webinars/' . $request->old_video);
            }

            $video = $request->file('new_video');
            $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/backend/webinars', $video_name);
        }
        else {
            $video_name = $request->old_video;
        }

        $data = $request->except(
            'old_video',
            'new_video'
        );

        $data['video'] = $video_name;
        $webinar->fill($data)->save();
        
        return redirect()->route('backend.webinars.index')->with('success', "Successfully updated!");
    }

    public function destroy(Webinar $webinar)
    {
        $webinar->status = '0';
        $webinar->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.webinars.index');
        }

        $type = $request->type;
        $language = $request->language;

        $webinars = Webinar::where('status', '!=', '0')->orderBy('id', 'desc');

        if($type != 'All') {
            $webinars->where('type', $type);
        }

        if($language != 'All') {
            $webinars->where('language', $language);
        }

        $items = $request->items ?? 10;
        $webinars = $webinars->paginate($items);
        $webinars = $this->processWebinars($webinars);

        return view('backend.webinars.index', [
            'webinars' => $webinars,
            'items' => $items,
            'type' => $type,
            'language' => $language
        ]);
    }
}