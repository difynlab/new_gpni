@extends('backend.layouts.app')

@section('title', 'Tv')

@section('content')

    <x-backend.breadcrumb page_name="Tv"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.tv.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero section)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_rating_title_{{ $short_code }}" class="form-label">Rating Title</label>
                            <input type="text" class="form-control" id="section_1_rating_title_{{ $short_code }}" name="section_1_rating_title_{{ $short_code }}" value="{{ $contents->{'section_1_rating_title_' . $short_code} ?? '' }}" placeholder="Rating Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_rating_{{ $short_code }}" class="form-label">Rating</label>
                            <select class="form-control form-select" name="section_1_rating_{{ $short_code }}">
                                <option value="">Select Rating</option>
                                <option value="1" {{ $contents->{'section_1_rating_' . $short_code} == '1' ? "selected" : "" }}>1</option>
                                <option value="2" {{ $contents->{'section_1_rating_' . $short_code} == '2' ? "selected" : "" }}>2</option>
                                <option value="3" {{ $contents->{'section_1_rating_' . $short_code} == '3' ? "selected" : "" }}>3</option>
                                <option value="4" {{ $contents->{'section_1_rating_' . $short_code} == '4' ? "selected" : "" }}>4</option>
                                <option value="5" {{ $contents->{'section_1_rating_' . $short_code} == '5' ? "selected" : "" }}>5</option>
                            </select>
                        </div>

                        <div>
                            <label for="section_1_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_1_content_{{ $short_code }}" name="section_1_content_{{ $short_code }}" value="{{ $contents->{'section_1_content_' . $short_code} ?? '' }}">{{ $contents->{'section_1_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->{'section_1_image_' . $short_code} ?? '' }}" new_name="new_section_1_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control" type="text" name="section_1_button_label" value="{{ json_decode($contents->{'section_1_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control" type="text" name="section_1_button_link" value="{{ json_decode($contents->{'section_1_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_2_sub_title_{{ $short_code }}" name="section_2_sub_title_{{ $short_code }}" value="{{ $contents->{'section_2_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_3_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_3_content_{{ $short_code }}" name="section_3_content_{{ $short_code }}" value="{{ $contents->{'section_3_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_3_image" old_value="{{ $contents->{'section_3_image_' . $short_code} ?? '' }}" new_name="new_section_3_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_3_image"></x-backend.input-error>
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
                            <label for="section_4_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_4_content_{{ $short_code }}" name="section_4_content_{{ $short_code }}" value="{{ $contents->{'section_4_content_' . $short_code} ?? '' }}">{{ $contents->{'section_4_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div>
                            <label for="section_5_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_5_content_{{ $short_code }}" name="section_5_content_{{ $short_code }}" value="{{ $contents->{'section_5_content_' . $short_code} ?? '' }}">{{ $contents->{'section_5_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_5_image" old_value="{{ $contents->{'section_5_image_' . $short_code} ?? '' }}" new_name="new_section_5_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_5_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 6</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_6_image" old_value="{{ $contents->{'section_6_image_' . $short_code} ?? '' }}" new_name="new_section_6_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_6_image"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <div>
                            <label for="section_6_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_6_content_{{ $short_code }}" name="section_6_content_{{ $short_code }}" value="{{ $contents->{'section_6_content_' . $short_code} ?? '' }}">{{ $contents->{'section_6_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 7</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div>
                            <label for="section_7_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_7_content_{{ $short_code }}" name="section_7_content_{{ $short_code }}" value="{{ $contents->{'section_7_content_' . $short_code} ?? '' }}">{{ $contents->{'section_7_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-video old_name="old_section_7_video" old_value="{{ $contents->{'section_7_video_' . $short_code} ?? '' }}" new_name="new_section_7_video" path="pages" class="side-box-uploader"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_7_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 8</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_8_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_8_title_{{ $short_code }}" name="section_8_title_{{ $short_code }}" value="{{ $contents->{'section_8_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_8_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_8_content_{{ $short_code }}" name="section_8_content_{{ $short_code }}" value="{{ $contents->{'section_8_content_' . $short_code} ?? '' }}">{{ $contents->{'section_8_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control" type="text" name="section_8_button_label" value="{{ json_decode($contents->{'section_8_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control" type="text" name="section_8_button_link" value="{{ json_decode($contents->{'section_8_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 9</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_9_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_9_title_{{ $short_code }}" name="section_9_title_{{ $short_code }}" value="{{ $contents->{'section_9_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_9_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_9_content_{{ $short_code }}" name="section_9_content_{{ $short_code }}" value="{{ $contents->{'section_9_content_' . $short_code} ?? '' }}">{{ $contents->{'section_9_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 10</p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_10_image" old_value="{{ $contents->{'section_10_image_' . $short_code} ?? '' }}" new_name="new_section_10_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_10_image"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <div>
                            <label for="section_10_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_10_content_{{ $short_code }}" name="section_10_content_{{ $short_code }}" value="{{ $contents->{'section_10_content_' . $short_code} ?? '' }}">{{ $contents->{'section_10_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 11</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_11_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_11_title_{{ $short_code }}" name="section_11_title_{{ $short_code }}" value="{{ $contents->{'section_11_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_11_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_11_sub_title_{{ $short_code }}" name="section_11_sub_title_{{ $short_code }}" value="{{ $contents->{'section_11_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>

                        <div>
                            <label for="section_11_message_{{ $short_code }}" class="form-label">Message</label>
                            <input type="text" class="form-control" id="section_11_message_{{ $short_code }}" name="section_11_message_{{ $short_code }}" value="{{ $contents->{'section_11_message_' . $short_code} ?? '' }}" placeholder="Message">
                        </div>
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
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
@endpush