@extends('backend.layouts.app')

@section('title', 'Create Course Chapter')

@section('content')

    <x-backend.breadcrumb page_name="Create Course Chapter"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.module-chapters.store', $course_module) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Chapter No <span>(Chapter number section)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="chapter_no" class="form-label">Chapter No<span class="asterisk">*</span></label>
                        <input type="number" class="form-control" id="chapter_no" name="chapter_no" value="{{ old('chapter_no') }}" placeholder="Chapter No" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Chapter Details <span>({{ $course_language }})</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="about" class="form-label">About</label>
                            <textarea class="editor" id="about" name="about" value="{{ old('about') }}">{{ old('about') }}</textarea>
                        </div>

                        <div>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="editor" id="content" name="content" value="{{ old('content') }}">{{ old('content') }}</textarea>
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
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            <div class="row single-item">
                                <div class="col-9">
                                    <input type="text" class="form-control" name="book_titles[]" placeholder="Title">
                                </div>
                                <div class="col-3">
                                    <input type="file" class="form-control" name="book_files[]" accept=".pdf, .ppt, .pptx, .xlsx, .xls, .csv, .doc, .docx">
                                </div>
                                <div class="col-12 mt-2">
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
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            <div class="row single-item">
                                <div class="col-9">
                                    <input type="text" class="form-control" name="video_titles[]" placeholder="Title">
                                </div>
                                <div class="col-3">
                                    <input type="file" class="form-control" name="video_files[]" accept="video/*">
                                </div>
                                <div class="col-12 mt-2">
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
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            <div class="row single-item">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="video_link_titles[]" placeholder="Title">
                                </div>
                                <div class="col-6">
                                    <input type="url" class="form-control" name="video_link_urls[]" placeholder="Link">
                                </div>
                            </div>
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
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            <div class="row single-item">
                                <div class="col-9">
                                    <input type="text" class="form-control" name="additional_video_titles[]" placeholder="Title">
                                </div>
                                <div class="col-3">
                                    <input type="file" class="form-control" name="additional_video_files[]" accept="video/*">
                                </div>
                                <div class="col-12 mt-2">
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
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            <div class="row single-item">
                                <div class="col-12">
                                    <input type="url" class="form-control" name="additional_video_links[]" placeholder="Video Link">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Presentation Media/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            <div class="row single-item">
                                <div class="col-9">
                                    <input type="text" class="form-control" name="presentation_media_titles[]" placeholder="Title">
                                </div>
                                <div class="col-3">
                                    <input type="file" class="form-control" name="presentation_media_files[]" accept=".pdf, .ppt, .pptx, .xlsx, .xls, .csv, .doc, .docx">
                                </div>
                                <div class="col-12 mt-2">
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
                                <button type="button" class="add-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        <div class="row single-item">
                            <div class="col-9">
                                <input type="text" class="form-control" name="downloadable_resource_titles[]" placeholder="Title">
                            </div>
                            <div class="col-3">
                                <input type="file" class="form-control" name="downloadable_resource_files[]" accept=".pdf, .ppt, .pptx, .xlsx, .xls, .csv, .doc, .docx">
                            </div>
                            <div class="col-12 mt-2">
                                <x-backend.input-error field="downloadable_resource_files.*"></x-backend.input-error>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
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

        $('.add-row-button').on('click', function() {
            let $row = $(this).closest('.row');
            let $singleItem = $row.next('.single-item');
            let singleItemHtml = $singleItem.html();
            
            let $temp = $('<div>').html(singleItemHtml);
            
            let $firstDiv = $temp.find('div:eq(0)');
            let $secondDiv = $temp.find('div:eq(1)');
            let currentClass;

            if($secondDiv.length > 0) {
                currentClass = $secondDiv.attr('class');
            }
            else {
                currentClass = $firstDiv.attr('class');
            }

            let newClass = currentClass.replace(/col-(\d+)/, function(match, p1) {
                return 'col-' + (parseInt(p1) - 1);
            });

            if($secondDiv.length > 0) {
                $secondDiv.attr('class', newClass);
            }
            else {
                $firstDiv.attr('class', newClass);
            }
            
            let updatedSingleItem = $temp.html();
            
            let html = `<div class="row single-item mt-2">
                            ${updatedSingleItem}
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;
            $row.parent().append(html);
        });
    </script>
@endpush