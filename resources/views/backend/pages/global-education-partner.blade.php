@extends('backend.layouts.app')

@section('title', 'Global Education Partner')

@section('content')

    <x-backend.breadcrumb page_name="Global Education Partner"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.global-education-partner.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero section)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_1_sub_title_{{ $short_code }}" name="section_1_sub_title_{{ $short_code }}" value="{{ $contents->{'section_1_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>

                        <div>
                            <label for="section_1_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(CEC Points)</span></p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4">
                        <label for="section_2_first_column_title_{{ $short_code }}" class="form-label">First Column Title</label>
                        <input type="text" class="form-control" id="section_2_first_column_title_{{ $short_code }}" name="section_2_first_column_title_{{ $short_code }}" value="{{ $contents->{'section_2_first_column_title_' . $short_code} ?? '' }}" placeholder="First Column Title">
                    </div>

                    <div class="col-4">
                        <label for="section_2_second_column_title_{{ $short_code }}" class="form-label">Second Column Title</label>
                        <input type="text" class="form-control" id="section_2_second_column_title_{{ $short_code }}" name="section_2_second_column_title_{{ $short_code }}" value="{{ $contents->{'section_2_second_column_title_' . $short_code} ?? '' }}" placeholder="Second Column Title">
                    </div>

                    <div class="col-4">
                        <label for="section_2_third_column_title_{{ $short_code }}" class="form-label">Third Column Title</label>
                        <input type="text" class="form-control" id="section_2_third_column_title_{{ $short_code }}" name="section_2_third_column_title_{{ $short_code }}" value="{{ $contents->{'section_2_third_column_title_' . $short_code} ?? '' }}" placeholder="Third Column Title">
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label class="form-label mb-0">Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-point-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        @if($contents->{'section_2_points_' . $short_code})
                            @foreach(json_decode($contents->{'section_2_points_' . $short_code}) as $section_2_point)
                                <div class="row single-item mt-4">
                                    <div class="col">
                                        <textarea class="editor ckeditor-initialized" id="section_2_points_partner_name" name="section_2_points_partner_name[]" value="{{ $section_2_point->partner_name }}" placeholder="Partner Name">{{ $section_2_point->partner_name }}</textarea>
                                    </div>

                                    <div class="col">
                                        <textarea class="editor ckeditor-initialized" id="section_2_points_course_name" name="section_2_points_course_name[]" value="{{ $section_2_point->course_name }}" placeholder="Course Name">{{ $section_2_point->course_name }}</textarea>
                                    </div>

                                    <div class="col">
                                        <textarea class="editor ckeditor-initialized" id="section_2_points" name="section_2_points[]" value="{{ $section_2_point->points }}" placeholder="Points">{{ $section_2_point->points }}</textarea>
                                    </div>

                                    <div class="col-1 d-flex align-items-center">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row single-item mt-4">
                                <div class="col-4">
                                    <textarea class="editor ckeditor-initialized" id="section_2_points_partner_name" name="section_2_points_partner_name[]" placeholder="Partner Name"></textarea>
                                </div>
                                <div class="col-4">
                                    <textarea class="editor ckeditor-initialized" id="section_2_points_course_name" name="section_2_points_course_name[]" placeholder="Course Name"></textarea>
                                </div>
                                <div class="col-4">
                                    <textarea class="editor ckeditor-initialized" id="section_2_points" name="section_2_points[]" placeholder="Points"></textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="section_3_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_3_sub_title_{{ $short_code }}" name="section_3_sub_title_{{ $short_code }}" value="{{ $contents->{'section_3_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>

                        <div>
                            <label for="section_3_language_title_{{ $short_code }}" class="form-label">Language Title</label>
                            <input type="text" class="form-control" id="section_3_language_title_{{ $short_code }}" name="section_3_language_title_{{ $short_code }}" value="{{ $contents->{'section_3_language_title_' . $short_code} ?? '' }}" placeholder="Language Title">
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label class="form-label mb-0">Languages</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-language-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        @if($contents->{'section_3_languages_' . $short_code})
                            @foreach(json_decode($contents->{'section_3_languages_' . $short_code}) as $section_3_language)
                                <div class="row single-item mt-4">
                                    <div class="col-11">
                                        <input type="text" class="form-control" id="section_3_languages" name="section_3_languages[]" value="{{ $section_3_language }}" placeholder="Language">
                                    </div>

                                    <div class="col-1 d-flex align-items-center">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row single-item mt-4">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="section_3_languages" name="section_3_languages[]" placeholder="Language">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_4_description_{{ $short_code }}" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control mb-3" type="text" name="section_4_button_label" value="{{ json_decode($contents->{'section_4_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control mb-3" type="text" name="section_4_button_link" value="{{ json_decode($contents->{'section_4_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_5_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_5_title_{{ $short_code }}" name="section_5_title_{{ $short_code }}" value="{{ $contents->{'section_5_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_5_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_5_description_{{ $short_code }}" name="section_5_description_{{ $short_code }}" value="{{ $contents->{'section_5_description_' . $short_code} ?? '' }}">{{ $contents->{'section_5_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <label class="form-label mb-0">Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-key-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        @if($contents->{'section_5_points_' . $short_code})
                            @foreach(json_decode($contents->{'section_5_points_' . $short_code}) as $section_5_point)
                                <div class="row single-item mt-4">
                                    <div class="col-7">
                                        <textarea class="editor ckeditor-initialized" id="section_5_point_contents" name="section_5_point_contents[]" value="{{ $section_5_point->content }}">{{ $section_5_point->content }}</textarea>
                                    </div>

                                    <div class="col-4">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_point->image) }}" alt="Image" class="page-image">

                                        <input type="hidden" name="section_5_old_point_images[]" value="{{ $section_5_point->image }}">

                                        <input type="file" class="form-control" id="section_5_point_images" name="section_5_point_images[]" placeholder="Image" accept="image/*">

                                        <x-backend.input-error field="section_5_point_images"></x-backend.input-error>
                                    </div>

                                    <div class="col-1 d-flex align-items-center">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row single-item mt-4 align-items-center">
                                <div class="col-8">
                                    <textarea class="editor ckeditor-initialized" id="section_5_point_contents" name="section_5_point_contents[]"></textarea>
                                </div>
                                <div class="col-4">
                                    <input type="file" class="form-control" id="section_5_point_images" name="section_5_point_images[]" placeholder="Image" accept="image/*">
                                    <x-backend.input-error field="section_5_point_images"></x-backend.input-error>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-point-button').on('click', function() {
            let html = `<div class="row single-item mt-4">
                            <div class="col">
                                <textarea class="editor" id="section_2_points_partner_name" name="section_2_points_partner_name[]" placeholder="Partner Name"></textarea>
                            </div>
                            <div class="col">
                                <textarea class="editor" id="section_2_points_course_name" name="section_2_points_course_name[]" placeholder="Course Name"></textarea>
                            </div>
                            <div class="col">
                                <textarea class="editor" id="section_2_points" name="section_2_points[]" placeholder="Points"></textarea>
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            const $newRow = $(this).closest('.row').parent().append(html);

            $newRow.find('.editor').each((index, element) => {
                if(!element.classList.contains('ckeditor-initialized')) {
                    ClassicEditor
                        .create(element)
                        .then(new_editor => {
                            element.classList.add('ckeditor-initialized');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });

        $('.add-language-button').on('click', function() {
            let html = `<div class="row single-item mt-4">
                            <div class="col-11">
                                <input type="text" class="form-control" id="section_3_languages" name="section_3_languages[]" placeholder="Language">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });
        
        $('.add-key-button').on('click', function() {
            let html = `<div class="row single-item mt-4 align-items-center">
                            <div class="col-7">
                                <textarea class="editor" id="section_5_point_contents" name="section_5_point_contents[]"></textarea>
                            </div>
                            <div class="col-4">
                                <input type="file" class="form-control" id="section_5_point_images" name="section_5_point_images[]" placeholder="Image" accept="image/*">
                                <x-backend.input-error field="section_5_point_images"></x-backend.input-error>
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            const $newRow = $(this).closest('.row').parent().append(html);

            $newRow.find('.editor').each((index, element) => {
                if(!element.classList.contains('ckeditor-initialized')) {
                    ClassicEditor
                        .create(element)
                        .then(new_editor => {
                            element.classList.add('ckeditor-initialized');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });
    </script>
@endpush