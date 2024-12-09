<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    private function processMedias($medias)
    {
        foreach($medias as $media) {
            $media->action = '
            <a href="'. route('backend.medias.edit', $media->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$media->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $media->status = ($media->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $medias;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $medias = Media::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $medias = $this->processMedias($medias);

        return view('backend.medias.index', [
            'medias' => $medias,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.medias.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:30720',
            'video' => 'nullable|max:102400',
            'pdf' => 'nullable|max:30720',
            'word' => 'nullable|max:30720',
            'excel' => 'nullable|max:30720',
            'ppt' => 'nullable|max:30720',
            'audio' => 'nullable|max:30720',
        ], [
            'image.max' => 'The image size must not exceed 30 MB',
            'video.max' => 'The video size must not exceed 100 MB',
            'pdf.max' => 'The pdf size must not exceed 30 MB',
            'word.max' => 'The word size must not exceed 30 MB',
            'excel.max' => 'The excel size must not exceed 30 MB',
            'ppt.max' => 'The powerpoint size must not exceed 30 MB',
            'audio.max' => 'The audio size must not exceed 30 MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('image') != null) {
            $image = $request->file('image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/medias', $image_name);
        }
        else {
            $image_name = null;
        }

        if($request->file('video') != null) {
            $video = $request->file('video');
            $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/backend/medias', $video_name);
        }
        else {
            $video_name = null;
        }

        if($request->file('pdf') != null) {
            $pdf = $request->file('pdf');
            $pdf_name = Str::random(40) . '.' . $pdf->getClientOriginalExtension();
            $pdf->storeAs('public/backend/medias', $pdf_name);
        }
        else {
            $pdf_name = null;
        }

        if($request->file('word') != null) {
            $word = $request->file('word');
            $word_name = Str::random(40) . '.' . $word->getClientOriginalExtension();
            $word->storeAs('public/backend/medias', $word_name);
        }
        else {
            $word_name = null;
        }

        if($request->file('excel') != null) {
            $excel = $request->file('excel');
            $excel_name = Str::random(40) . '.' . $excel->getClientOriginalExtension();
            $excel->storeAs('public/backend/medias', $excel_name);
        }
        else {
            $excel_name = null;
        }

        if($request->file('ppt') != null) {
            $ppt = $request->file('ppt');
            $ppt_name = Str::random(40) . '.' . $ppt->getClientOriginalExtension();
            $ppt->storeAs('public/backend/medias', $ppt_name);
        }
        else {
            $ppt_name = null;
        }

        if($request->file('audio') != null) {
            $audio = $request->file('audio');
            $audio_name = Str::random(40) . '.' . $audio->getClientOriginalExtension();
            $audio->storeAs('public/backend/medias', $audio_name);
        }
        else {
            $audio_name = null;
        }

        $media = new Media();
        $data = $request->except('image', 'video', 'pdf', 'word', 'excel', 'ppt' , 'audio');
        $data['image'] = $image_name;
        $data['video'] = $video_name;
        $data['vimeo_video_link'] = $request->vimeo_video_link ?? null;
        $data['pdf'] = $pdf_name;
        $data['word'] = $word_name;
        $data['excel'] = $excel_name;
        $data['ppt'] = $ppt_name;
        $data['audio'] = $audio_name;
        $media->create($data);

        return redirect()->route('backend.medias.index')->with('success', 'Successfully created!');
    }

    public function edit(Media $media)
    {
        return view('backend.medias.edit', [
            'media' => $media
        ]);
    }

    public function update(Request $request, Media $media)
    {
        $validator = Validator::make($request->all(), [
            'new_image' => 'nullable|image|max:30720',
            'new_video' => 'nullable|max:102400',
            'new_pdf' => 'nullable|max:30720',
            'new_word' => 'nullable|max:30720',
            'new_excel' => 'nullable|max:30720',
            'new_ppt' => 'nullable|max:30720',
            'new_audio' => 'nullable|max:30720',
        ], [
            'new_image.max' => 'The image size must not exceed 30 MB',
            'new_video.max' => 'The video size must not exceed 100 MB',
            'new_pdf.max' => 'The pdf size must not exceed 30 MB',
            'new_word.max' => 'The word size must not exceed 30 MB',
            'new_excel.max' => 'The excel size must not exceed 30 MB',
            'new_ppt.max' => 'The powerpoint size must not exceed 30 MB',
            'new_audio.max' => 'The audio size must not exceed 30 MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/medias/' . $request->old_image);
            }

            $new_image = $request->file('new_image');
            $new_image_name = Str::random(40) . '.' . $new_image->getClientOriginalExtension();
            $new_image->storeAs('public/backend/medias', $new_image_name);
        }
        else {
            $new_image_name = $request->old_image;
        }

        if($request->file('new_video') != null) {
            if($request->old_video) {
                Storage::delete('public/backend/medias/' . $request->old_video);
            }

            $new_video = $request->file('new_video');
            $new_video_name = Str::random(40) . '.' . $new_video->getClientOriginalExtension();
            $new_video->storeAs('public/backend/medias', $new_video_name);
        }
        else {
            $new_video_name = $request->old_video;
        }

        if($request->file('new_pdf') != null) {
            if($request->old_pdf) {
                Storage::delete('public/backend/medias/' . $request->old_pdf);
            }

            $new_pdf = $request->file('new_pdf');
            $new_pdf_name = Str::random(40) . '.' . $new_pdf->getClientOriginalExtension();
            $new_pdf->storeAs('public/backend/medias', $new_pdf_name);
        }
        else {
            $new_pdf_name = $request->old_pdf;
        }

        if($request->file('new_word') != null) {
            if($request->old_word) {
                Storage::delete('public/backend/medias/' . $request->old_word);
            }

            $new_word = $request->file('new_word');
            $new_word_name = Str::random(40) . '.' . $new_word->getClientOriginalExtension();
            $new_word->storeAs('public/backend/medias', $new_word_name);
        }
        else {
            $new_word_name = $request->old_word;
        }

        if($request->file('new_excel') != null) {
            if($request->old_excel) {
                Storage::delete('public/backend/medias/' . $request->old_excel);
            }

            $new_excel = $request->file('new_excel');
            $new_excel_name = Str::random(40) . '.' . $new_excel->getClientOriginalExtension();
            $new_excel->storeAs('public/backend/medias', $new_excel_name);
        }
        else {
            $new_excel_name = $request->old_excel;
        }

        if($request->file('new_ppt') != null) {
            if($request->old_ppt) {
                Storage::delete('public/backend/medias/' . $request->old_ppt);
            }

            $new_ppt = $request->file('new_ppt');
            $new_ppt_name = Str::random(40) . '.' . $new_ppt->getClientOriginalExtension();
            $new_ppt->storeAs('public/backend/medias', $new_ppt_name);
        }
        else {
            $new_ppt_name = $request->old_ppt;
        }

        if($request->file('new_audio') != null) {
            if($request->old_audio) {
                Storage::delete('public/backend/medias/' . $request->old_audio);
            }

            $new_audio = $request->file('new_audio');
            $new_audio_name = Str::random(40) . '.' . $new_audio->getClientOriginalExtension();
            $new_audio->storeAs('public/backend/medias', $new_audio_name);
        }
        else {
            $new_audio_name = $request->old_audio;
        }

        $data = $request->except(
            'old_image',
            'new_image',
            'old_video',
            'new_video',
            'old_pdf',
            'new_pdf',
            'old_word',
            'new_word',
            'old_excel',
            'new_excel',
            'old_ppt',
            'new_ppt',
            'old_audio',
            'new_audio'
        );
        $data['image'] = $new_image_name;
        $data['video'] = $new_video_name;
        $data['vimeo_video_link'] = $request->vimeo_video_link ?? null;
        $data['pdf'] = $new_pdf_name;
        $data['word'] = $new_word_name;
        $data['excel'] = $new_excel_name;
        $data['ppt'] = $new_ppt_name;
        $data['audio'] = $new_audio_name;
        $media->fill($data)->save();
        
        return redirect()->route('backend.medias.index')->with('success', "Successfully updated!");
    }

    public function destroy(Media $media)
    {
        $media->status = '0';
        $media->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.medias.index');
        }

        $name = $request->name;
        $language = $request->language;

        $medias = Media::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $medias->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $medias->where('language', $language);
        }

        $items = $request->items ?? 10;
        $medias = $medias->paginate($items);
        $medias = $this->processMedias($medias);

        return view('backend.medias.index', [
            'medias' => $medias,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}