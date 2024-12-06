@extends('backend.layouts.app')

@section('title', 'Why We Are Different')

@section('content')

    <x-backend.breadcrumb page_name="Why We Are Different"></x-backend.breadcrumb>

    <div class="static-pages">

        <p class="page-language">{{ ucfirst($language) }} Language</p>
    
        <form action="{{ route('backend.pages.why-we-are-different.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>
                </div>
            </div>
            
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero section)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-video old_name="old_section_1_video" old_value="{{ $contents->{'section_1_video_' . $short_code} ?? '' }}" new_name="new_section_1_video" path="pages"></x-backend.upload-video>
                            <x-backend.input-error field="new_section_1_video"></x-backend.input-error>
                        </div>

                        <div>
                            <label for="section_1_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Regions & languages)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-image old_name="old_section_2_image" old_value="{{ $contents->{'section_2_image_' . $short_code} ?? '' }}" new_name="new_section_2_image" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_2_image"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="section_2_top_description_{{ $short_code }}" class="form-label">Top Content</label>
                            <textarea class="editor" id="section_2_top_description_{{ $short_code }}" name="section_2_top_description_{{ $short_code }}" value="{{ $contents->{'section_2_top_description_' . $short_code} ?? '' }}">{{ $contents->{'section_2_top_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_2_bottom_description_{{ $short_code }}" class="form-label">Bottom Content</label>
                            <textarea class="editor" id="section_2_bottom_description_{{ $short_code }}" name="section_2_bottom_description_{{ $short_code }}" value="{{ $contents->{'section_2_bottom_description_' . $short_code} ?? '' }}">{{ $contents->{'section_2_bottom_description_' . $short_code} ?? '' }}</textarea>
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