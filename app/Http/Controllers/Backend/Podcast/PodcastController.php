<?php

namespace App\Http\Controllers\Backend\Podcast;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    private function processPodcasts($podcasts)
    {
        foreach($podcasts as $podcast) {
            $podcast->action = '
            <a href="'. route('backend.podcasts.edit', $podcast->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$podcast->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $podcast->status = ($podcast->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $podcasts;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $podcasts = Podcast::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $podcasts = $this->processPodcasts($podcasts);

        return view('backend.podcasts.index', [
            'podcasts' => $podcasts,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.podcasts.create');
    }
                                                                              
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video' => 'max:2048',
            'content' => 'required'
        ], [
            'video.max' => 'The video size must not exceed 2 MB',
            'content.required' => 'This field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('video') != null) {
            $video = $request->file('video');
            $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/backend/podcasts', $video_name);
        }
        else {
            $video_name = null;
        }

        $podcast = new Podcast();
        $data = $request->except(
            'video'
        );

        $data['video'] = $video_name;

        $podcast->create($data);

        return redirect()->route('backend.podcasts.index')->with('success', 'Successfully created!');
    }

    public function edit(Podcast $podcast)
    {
        return view('backend.podcasts.edit', [
            'podcast' => $podcast
        ]);
    }

    public function update(Request $request, Podcast $podcast)
    {
        $validator = Validator::make($request->all(), [
            'video' => 'nullable|max:2048',
            'content' => 'required'
        ], [
            'video.max' => 'The video size must not exceed 2 MB',
            'content.required' => 'This field is required'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_video') != null) {
            if($request->old_video) {
                Storage::delete('public/backend/podcasts/' . $request->old_video);
            }

            $new_video = $request->file('new_video');
            $new_video_name = Str::random(40) . '.' . $new_video->getClientOriginalExtension();
            $new_video->storeAs('public/backend/podcasts', $new_video_name);
        }
        else {
            $new_video_name = $request->old_video;
        }

        $data = $request->except(
            'old_video',
            'new_video',
        );
        
        $data['video'] = $new_video_name;

        $podcast->fill($data)->save();
        
        return redirect()->route('backend.podcasts.index')->with('success', "Successfully updated!");
    }

    public function destroy(Podcast $podcast)
    {
        $podcast->status = '0';
        $podcast->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.podcasts.index');
        }

        $title = $request->title;
        $language = $request->language;

        $podcasts = Podcast::where('status', '!=', '0')->orderBy('id', 'desc');

        if($title != null) {
            $podcasts->where('title', 'like', '%' . $title . '%');
        }

        if($language != 'All') {
            $podcasts->where('language', $language);
        }

        $items = $request->items ?? 10;
        $podcasts = $podcasts->paginate($items);
        $podcasts = $this->processPodcasts($podcasts);

        return view('backend.podcasts.index', [
            'podcasts' => $podcasts,
            'items' => $items,
            'title' => $title,
            'language' => $language
        ]);
    }
}