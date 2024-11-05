@extends('backend.layouts.app')

@section('title', 'Edit Course Chapter')

@section('content')

    <x-backend.breadcrumb page_name="Edit Course Chapter"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.module-chapters.update', [$course_module, $course_chapter]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Chapter <span>(Chapter number section)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="chapter_no" class="form-label">Chapter No<span class="asterisk">*</span></label>
                        <input type="number" class="form-control" id="chapter_no" name="chapter_no" value="{{ old('chapter_no', $course_chapter->chapter_no) }}" placeholder="Chapter No" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Chapter Details <span>({{ $course_language }})</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course_chapter->title) }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="about" class="form-label">About</label>
                            <textarea class="editor" id="about" name="about" value="{{ old('about', $course_chapter->about) }}">{{ old('about', $course_chapter->about) }}</textarea>
                        </div>

                        <div>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="editor" id="content" name="content" value="{{ old('content', $course_chapter->content) }}">{{ old('content', $course_chapter->content) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Chapter Contents <span>({{ $course_language }})</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label mb-0">Book/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button books">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            @if($course_chapter->books)
                                @foreach(json_decode($course_chapter->books) as $book)
                                    <div class="row single-item mt-2">
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="old_book_titles[]" value="{{ $book->title }}" placeholder="Title">
                                        </div>
                                        <div class="col-1 d-flex align-items-center">
                                            <input type="hidden" name="old_book_files[]" value="{{ $book->file }}">

                                            <a href="{{ asset('storage/backend/courses/course-chapter-books/' . $book->file) }}" class="download-button" download><i class="bi bi-download"></i></a>

                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-2">
                                <div class="col-12">
                                    <x-backend.input-error field="book_files.*"></x-backend.input-error>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Video/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button videos">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($course_chapter->videos)
                                @foreach(json_decode($course_chapter->videos) as $video)
                                    <div class="row single-item mt-2 align-items-center">
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="old_video_titles[]" value="{{ $video->title }}" placeholder="Title">
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <input type="hidden" name="old_video_files[]" value="{{ $video->file }}">

                                            <video class="video-player" src="{{ asset('storage/backend/courses/course-chapter-videos/' . $video->file) }}" controls></video>

                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-2">
                                <div class="col-12">
                                    <x-backend.input-error field="video_files.*"></x-backend.input-error>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Video Link/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button video-links">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($course_chapter->video_links)
                                @foreach(json_decode($course_chapter->video_links) as $video_link)
                                    <div class="row single-item mt-2">
                                        <div class="col">
                                            <input type="text" class="form-control" name="video_link_titles[]" value="{{ $video_link->title }}" placeholder="Title">
                                        </div>
                                        <div class="col">
                                            <input type="url" class="form-control" name="video_link_urls[]" value="{{ $video_link->link }}" placeholder="Link">
                                        </div>
                                        <div class="col-1 d-flex align-items-center">
                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Chapter Additional Resources <span>({{ $course_language }})</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label mb-0">Additional Video/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button additional-videos">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($course_chapter->additional_videos)
                                @foreach(json_decode($course_chapter->additional_videos) as $additional_video)
                                    <div class="row single-item mt-2 align-items-center">
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="old_additional_video_titles[]" value="{{ $additional_video->title }}" placeholder="Title">
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <input type="hidden" name="old_additional_video_files[]" value="{{ $additional_video->file }}">

                                            <video class="video-player" src="{{ asset('storage/backend/courses/course-chapter-additional-videos/' . $additional_video->file) }}" controls></video>

                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-2">
                                <div class="col-12">
                                    <x-backend.input-error field="additional_video_files.*"></x-backend.input-error>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Additional Video Link/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button additional-video-links">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            @if($course_chapter->additional_video_links)
                                @foreach(json_decode($course_chapter->additional_video_links) as $additional_video_link)
                                    <div class="row single-item mt-2">
                                        <div class="col-11">
                                            <input type="url" class="form-control" name="additional_video_links[]" value="{{ $additional_video_link }}" placeholder="Video Link">
                                        </div>
                                        <div class="col-1 d-flex align-items-center">
                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div>
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Presentation Media/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button presentation-medias">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($course_chapter->presentation_medias)
                                @foreach(json_decode($course_chapter->presentation_medias) as $presentation_media)
                                    <div class="row single-item mt-2">
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="old_presentation_media_titles[]" value="{{ $presentation_media->title }}" placeholder="Title">
                                        </div>
                                        <div class="col-1 d-flex align-items-center">
                                            <input type="hidden" name="old_presentation_media_files[]" value="{{ $presentation_media->file }}">

                                            <a href="{{ asset('storage/backend/courses/course-chapter-presentation-medias/' . $presentation_media->file) }}" class="download-button" download><i class="bi bi-download"></i></a>

                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-2">
                                <div class="col-12">
                                    <x-backend.input-error field="presentation_media_files.*"></x-backend.input-error>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section">
                <p class="inner-page-title">Chapter Downloadable Resources <span>({{ $course_language }})</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label mb-0">Downloadable Resource/s</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button downloadable-resources">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>

                        @if($course_chapter->downloadable_resources)
                            @foreach(json_decode($course_chapter->downloadable_resources) as $downloadable_resource)
                                <div class="row single-item mt-2">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="old_downloadable_resource_titles[]" value="{{ $downloadable_resource->title }}" placeholder="Title">
                                    </div>
                                    <div class="col-1 d-flex align-items-center">
                                        <input type="hidden" name="old_downloadable_resource_files[]" value="{{ $downloadable_resource->file }}">

                                        <a href="{{ asset('storage/backend/courses/course-chapter-downloadable-resources/' . $downloadable_resource->file) }}" class="download-button" download><i class="bi bi-download"></i></a>

                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="row mt-2">
                            <div class="col-12">
                                <x-backend.input-error field="downloadable_resource_files.*"></x-backend.input-error>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$course_chapter"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button.books').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-9">
                                <input type="text" class="form-control" name="book_titles[]" placeholder="Title">
                            </div>
                            <div class="col-2">
                                <input type="file" class="form-control" name="book_files[]" accept=".pdf, .ppt, .pptx, .xlsx, .xls, .csv, .doc, .docx">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.videos').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-9">
                                <input type="text" class="form-control" name="video_titles[]" placeholder="Title">
                            </div>
                            <div class="col-2">
                                <input type="file" class="form-control" name="video_files[]" accept="video/*">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.video-links').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-6">
                                <input type="text" class="form-control" name="video_link_titles[]" placeholder="Title">
                            </div>
                            <div class="col-5">
                                <input type="url" class="form-control" name="video_link_urls[]" placeholder="Link">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.additional-videos').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-9">
                                <input type="text" class="form-control" name="additional_video_titles[]" placeholder="Title">
                            </div>
                            <div class="col-2">
                                <input type="file" class="form-control" name="additional_video_files[]" accept="video/*">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.additional-video-links').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-11">
                                    <input type="url" class="form-control" name="additional_video_links[]" placeholder="Video Link">
                                </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.presentation-medias').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-9">
                                <input type="text" class="form-control" name="presentation_media_titles[]" placeholder="Title">
                            </div>
                            <div class="col-2">
                                <input type="file" class="form-control" name="presentation_media_files[]" accept=".pdf, .ppt, .pptx, .xlsx, .xls, .csv, .doc, .docx">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.downloadable-resources').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-9">
                                <input type="text" class="form-control" name="downloadable_resource_titles[]" placeholder="Title">
                            </div>
                            <div class="col-2">
                                <input type="file" class="form-control" name="downloadable_resource_files[]" accept=".pdf, .ppt, .pptx, .xlsx, .xls, .csv, .doc, .docx">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush