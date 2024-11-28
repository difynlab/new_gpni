<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CourseChapterController extends Controller
{
    private function processCourseChapters($course_chapters)
    {
        foreach($course_chapters as $course_chapter) {
            $course_chapter->action = '
            <a href="'. route('backend.courses.module-chapters.edit', [$course_chapter->module_id, $course_chapter->id, ]) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$course_chapter->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_chapter->status = ($course_chapter->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $course_chapters;
    }

    private function deleteOldRemovedFiles($course_chapter, $field, $name, $path)
    {
        $existing_files = collect(json_decode($course_chapter->$field, true));
        $existing_files = collect($existing_files->pluck('file')->all());
        $old_files = collect($name);
        $missing_files = $existing_files->diff($old_files);

        if($missing_files->isNotEmpty()) {
            foreach($missing_files as $key => $missing_file) {
                Storage::delete('public/backend/courses/' . $path . $missing_file);
            }
        }
    }

    public function index(Request $request, CourseModule $course_module)
    {
        $items = $request->items ?? 10;

        $course = Course::where('status', '!=', '0')->find($course_module->course_id);

        $course_chapters = CourseChapter::where('module_id', $course_module->id)->where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $course_chapters = $this->processCourseChapters($course_chapters);

        return view('backend.course-chapters.index', [
            'course' => $course,
            'course_module' => $course_module,
            'course_chapters' => $course_chapters,
            'items' => $items
        ]);
    }

    public function create(CourseModule $course_module)
    {
        $course = Course::where('status', '!=', '0')->find($course_module->course_id);
        $course_language = $course->language;

        return view('backend.course-chapters.create', [
            'course' => $course,
            'course_module' => $course_module,
            'course_language' => $course_language
        ]);
    }
                                                                              
    public function store(Request $request, CourseModule $course_module)
    {
        $validator = Validator::make($request->all(), [
            'book_files.*' => 'max:2048',
            'video_files.*' => 'max:5120',
            'additional_video_files.*' => 'max:5120',
            'presentation_media_files.*' => 'max:2048',
            'downloadable_resource_files.*' => 'max:2048',
        ], [
            'book_files.*.max' => 'Each book must not be greater than 2MB',
            'video_files.*.max' => 'Each video must not be greater than 5MB',
            'additional_video_files.*.max' => 'Each video must not be greater than 5MB',
            'presentation_media_files.*.max' => 'Each file must not be greater than 2MB',
            'downloadable_resource_files.*.max' => 'Each file must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        $course = Course::where('status', '!=', '0')->find($course_module->course_id);

        $course_chapter = new CourseChapter();
        $course_chapter->course_id = $course->id;
        $course_chapter->module_id = $course_module->id;
        $course_chapter->chapter_no = $request->chapter_no;

        // Course books store function
            if($request->book_titles[0] != null) {
                $books = [];

                foreach($request->book_titles as $key => $book_title) {
                    if($request->book_files && $request->book_files[$key]) {
                        $book = $request->book_files[$key];
                        $book_name = Str::random(40) . '.' . $book->getClientOriginalExtension();
                        $book->storeAs('public/backend/courses/course-chapter-books', $book_name);
                    }
    
                    array_push($books, [
                        'title' => $book_title,
                        'file' => $book_name ?? null
                    ]);
                }
                $final_books = $books ? json_encode($books) : null;
            }
        // Course books store function

        // Course videos store function
            if($request->video_titles[0] != null) {
                $videos = [];

                foreach($request->video_titles as $key => $video_title) {
                    if($request->video_files && $request->video_files[$key]) {
                        $video = $request->video_files[$key];
                        $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
                        $video->storeAs('public/backend/courses/course-chapter-videos', $video_name);
                    }

                    array_push($videos, [
                        'title' => $video_title,
                        'file' => $video_name ?? null
                    ]);
                }
                $final_videos = $videos ? json_encode($videos) : null;
            }
        // Course videos store function

        // Course video links store function
            if($request->video_link_titles[0] != null) {
                $video_links = [];

                foreach($request->video_link_titles as $key => $video_link_title) {
                    array_push($video_links, [
                        'title' => $video_link_title,
                        'link' => $request->video_link_urls[$key] ?? null
                    ]);
                }
                $final_video_links = $video_links ? json_encode($video_links) : null;
            }
        // Course video links store function

        // Course additional videos store function
            if($request->additional_video_titles[0] != null) {
                $additional_videos = [];

                foreach($request->additional_video_titles as $key => $additional_video_title) {
                    if($request->additional_video_files && $request->additional_video_files[$key]) {
                        $additional_video = $request->additional_video_files[$key];
                        $additional_video_name = Str::random(40) . '.' . $additional_video->getClientOriginalExtension();
                        $additional_video->storeAs('public/backend/courses/course-chapter-additional-videos', $additional_video_name);
                    }

                    array_push($additional_videos, [
                        'title' => $additional_video_title,
                        'file' => $additional_video_name ?? null
                    ]);
                }

                $final_additional_videos = $additional_videos ? json_encode($additional_videos) : null;
            }
        // Course additional videos store function

        // Course presentation medias store function
            if($request->presentation_media_titles[0] != null) {
                $presentation_medias = [];

                foreach($request->presentation_media_titles as $key => $presentation_media_title) {
                    if($request->presentation_media_files && $request->presentation_media_files[$key]) {
                        $presentation_media = $request->presentation_media_files[$key];
                        $presentation_media_name = Str::random(40) . '.' . $presentation_media->getClientOriginalExtension();
                        $presentation_media->storeAs('public/backend/courses/course-chapter-presentation-medias', $presentation_media_name);
                    }
    
                    array_push($presentation_medias, [
                        'title' => $presentation_media_title,
                        'file' => $presentation_media_name ?? null
                    ]);
                }
                $final_presentation_medias = $presentation_medias ? json_encode($presentation_medias) : null;
            }
        // Course presentation medias store function

        // Course downloadable resources store function
            if($request->downloadable_resource_titles[0] != null) {
                $downloadable_resources = [];

                foreach($request->downloadable_resource_titles as $key => $downloadable_resource_title) {
                    if($request->downloadable_resource_files && $request->downloadable_resource_files[$key]) {
                        $downloadable_resource = $request->downloadable_resource_files[$key];
                        $downloadable_resource_name = Str::random(40) . '.' . $downloadable_resource->getClientOriginalExtension();
                        $downloadable_resource->storeAs('public/backend/courses/course-chapter-downloadable-resources', $downloadable_resource_name);
                    }

                    array_push($downloadable_resources, [
                        'title' => $downloadable_resource_title,
                        'file' => $downloadable_resource_name ?? null
                    ]);
                }
                $final_downloadable_resources = $downloadable_resources ? json_encode($downloadable_resources) : null;
            }
        // Course downloadable resources store function

        $course_chapter->title = $request->title;
        $course_chapter->about = $request->about;
        $course_chapter->content = $request->content;

        $course_chapter->books = $final_books ?? null;
        $course_chapter->videos = $final_videos ?? null;
        $course_chapter->video_links = $final_video_links ?? null;

        $course_chapter->additional_videos = $final_additional_videos ?? null;
        $course_chapter->additional_video_links = $request->additional_video_links[0] != null ? json_encode($request->additional_video_links) : null;
        $course_chapter->presentation_medias = $final_presentation_medias ?? null;

        $course_chapter->downloadable_resources = $final_downloadable_resources ?? null;

        $course_chapter->status = $request->status;
        $course_chapter->save();

        return redirect()->route('backend.courses.module-chapters.index', $course_module)->with('success', 'Successfully created!');
    }

    public function edit(CourseModule $course_module, CourseChapter $course_chapter)
    {
        $course = Course::where('status', '!=', '0')->find($course_module->course_id);
        $course_language = $course->language;

        return view('backend.course-chapters.edit', [
            'course' => $course,
            'course_module' => $course_module,
            'course_chapter' => $course_chapter,
            'course_language' => $course_language
        ]);
    }

    public function update(Request $request, CourseModule $course_module, CourseChapter $course_chapter)
    {
        $validator = Validator::make($request->all(), [
            'book_files.*' => 'max:2048',
            'video_files.*' => 'max:5120',
            'additional_video_files.*' => 'max:5120',
            'presentation_media_files.*' => 'max:2048',
            'downloadable_resource_files.*' => 'max:2048',
        ], [
            'book_files.*.max' => 'Each book must not be greater than 2MB',
            'video_files.*.max' => 'Each video must not be greater than 5MB',
            'additional_video_files.*.max' => 'Each video must not be greater than 5MB',
            'presentation_media_files.*.max' => 'Each file must not be greater than 2MB',
            'downloadable_resource_files.*.max' => 'Each file must not be greater than 2MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $course_chapter->chapter_no = $request->chapter_no;

        // Course books store function
            $books = [];

            $this->deleteOldRemovedFiles($course_chapter, 'books', $request->old_book_files, 'course-chapter-books/');

            if($request->old_book_titles) {
                foreach($request->old_book_titles as $key => $old_book_title) {
                    array_push($books, [
                        'title' => $old_book_title,
                        'file' => $request->old_book_files[$key] ?? null
                    ]);
                }
            }

            if($request->book_titles) {
                foreach($request->book_titles as $key => $book_title) {
                    if($request->book_files && $request->book_files[$key]) {
                        $book = $request->book_files[$key];
                        $book_name = Str::random(40) . '.' . $book->getClientOriginalExtension();
                        $book->storeAs('public/backend/courses/course-chapter-books', $book_name);
                    }
    
                    array_push($books, [
                        'title' => $book_title,
                        'file' => $book_name ?? null
                    ]);
                }
            }
            $final_books = $books ? json_encode($books) : null;
        // Course books store function

        // Course videos store function
            $videos = [];

            $this->deleteOldRemovedFiles($course_chapter, 'videos', $request->old_video_files, 'course-chapter-videos/');

            if($request->old_video_titles) {
                foreach($request->old_video_titles as $key => $old_video_title) {
                    array_push($videos, [
                        'title' => $old_video_title,
                        'file' => $request->old_video_files[$key] ?? null
                    ]);
                }
            }

            if($request->video_titles) {
                foreach($request->video_titles as $key => $video_title) {
                    if($request->video_files && $request->video_files[$key]) {
                        $video = $request->video_files[$key];
                        $video_name = Str::random(40) . '.' . $video->getClientOriginalExtension();
                        $video->storeAs('public/backend/courses/course-chapter-videos', $video_name);
                    }

                    array_push($videos, [
                        'title' => $video_title,
                        'file' => $video_name ?? null
                    ]);
                }
            }
            $final_videos = $videos ? json_encode($videos) : null;
        // Course videos store function

        // Course video links store function
            $video_links = [];
            if($request->video_link_titles) {
                foreach($request->video_link_titles as $key => $video_link_title) {
                    array_push($video_links, [
                        'title' => $video_link_title,
                        'link' => $request->video_link_urls[$key] ?? null
                    ]);
                }
            }
            $final_video_links = $video_links ? json_encode($video_links) : null;
        // Course video links store function

        // Course additional videos store function
            $additional_videos = [];

            $this->deleteOldRemovedFiles($course_chapter, 'additional_videos', $request->old_additional_video_files, 'course-chapter-additional-videos/');

            if($request->old_additional_video_titles) {
                foreach($request->old_additional_video_titles as $key => $old_additional_video_title) {
                    array_push($additional_videos, [
                        'title' => $old_additional_video_title,
                        'file' => $request->old_additional_video_files[$key] ?? null
                    ]);
                }
            }

            if($request->additional_video_titles) {
                foreach($request->additional_video_titles as $key => $additional_video_title) {
                    if($request->additional_video_files && $request->additional_video_files[$key]) {
                        $additional_video = $request->additional_video_files[$key];
                        $additional_video_name = Str::random(40) . '.' . $additional_video->getClientOriginalExtension();
                        $additional_video->storeAs('public/backend/courses/course-chapter-additional-videos', $additional_video_name);
                    }

                    array_push($additional_videos, [
                        'title' => $additional_video_title,
                        'file' => $additional_video_name ?? null
                    ]);
                }
            }
            $final_additional_videos = $additional_videos ? json_encode($additional_videos) : null;
        // Course additional videos store function

        // Course presentation medias store function
            $presentation_medias = [];

            $this->deleteOldRemovedFiles($course_chapter, 'presentation_medias', $request->old_presentation_media_files, 'course-chapter-presentation-medias/');

            if($request->old_presentation_media_titles) {
                foreach($request->old_presentation_media_titles as $key => $old_presentation_media_title) {
                    array_push($presentation_medias, [
                        'title' => $old_presentation_media_title,
                        'file' => $request->old_presentation_media_files[$key] ?? null
                    ]);
                }
            }

            if($request->presentation_media_titles) {
                foreach($request->presentation_media_titles as $key => $presentation_media_title) {
                    if($request->presentation_media_files && $request->presentation_media_files[$key]) {
                        $presentation_media = $request->presentation_media_files[$key];
                        $presentation_media_name = Str::random(40) . '.' . $presentation_media->getClientOriginalExtension();
                        $presentation_media->storeAs('public/backend/courses/course-chapter-presentation-medias', $presentation_media_name);
                    }
    
                    array_push($presentation_medias, [
                        'title' => $presentation_media_title,
                        'file' => $presentation_media_name ?? null
                    ]);
                }
            }
            $final_presentation_medias = $presentation_medias ? json_encode($presentation_medias) : null;
        // Course presentation medias store function

        // Course downloadable resources store function
            $downloadable_resources = [];

            $this->deleteOldRemovedFiles($course_chapter, 'downloadable_resources', $request->old_downloadable_resource_files, 'course-chapter-downloadable-resources/');

            if($request->old_downloadable_resource_titles) {
                foreach($request->old_downloadable_resource_titles as $key => $old_downloadable_resource_title) {
                    array_push($downloadable_resources, [
                        'title' => $old_downloadable_resource_title,
                        'file' => $request->old_downloadable_resource_files[$key] ?? null
                    ]);
                }
            }

            if($request->downloadable_resource_titles) {
                foreach($request->downloadable_resource_titles as $key => $downloadable_resource_title) {
                    if($request->downloadable_resource_files && $request->downloadable_resource_files[$key]) {
                        $downloadable_resource = $request->downloadable_resource_files[$key];
                        $downloadable_resource_name = Str::random(40) . '.' . $downloadable_resource->getClientOriginalExtension();
                        $downloadable_resource->storeAs('public/backend/courses/course-chapter-downloadable-resources', $downloadable_resource_name);
                    }

                    array_push($downloadable_resources, [
                        'title' => $downloadable_resource_title,
                        'file' => $downloadable_resource_name ?? null
                    ]);
                }
            }
            $final_downloadable_resources = $downloadable_resources ? json_encode($downloadable_resources) : null;
        // Course downloadable resources store function

        $course_chapter->title = $request->title;
        $course_chapter->about = $request->about;
        $course_chapter->content = $request->content;

        $course_chapter->books = $final_books;
        $course_chapter->videos = $final_videos;
        $course_chapter->video_links = $final_video_links;

        $course_chapter->additional_videos = $final_additional_videos;
        $course_chapter->additional_video_links = $request->additional_video_links != null ? json_encode($request->additional_video_links) : null;
        $course_chapter->presentation_medias = $final_presentation_medias;

        $course_chapter->downloadable_resources = $final_downloadable_resources;

        $course_chapter->status = $request->status;
        $course_chapter->save();
        
        return redirect()->route('backend.courses.module-chapters.index', $course_module)->with('success', 'Successfully updated!');
    }

    public function destroy(CourseModule $course_module, CourseChapter $course_chapter)
    {
        $course_chapter->status = '0';
        $course_chapter->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}