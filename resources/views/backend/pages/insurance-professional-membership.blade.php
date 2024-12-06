@extends('backend.layouts.app')

@section('title', 'Insurance & Professional Membership')

@section('content')

    <x-backend.breadcrumb page_name="Insurance & Professional Membership"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.insurance-professional-membership.update', $language) }}" method="POST" enctype="multipart/form-data">
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
                <p class="inner-page-title">Section 1 <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
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
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Approval)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div>
                            <label for="section_2_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_2_content_{{ $short_code }}" name="section_2_content_{{ $short_code }}" value="{{ $contents->{'section_2_content_' . $short_code} ?? '' }}">{{ $contents->{'section_2_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_2_image" old_value="{{ $contents->{'section_2_image_' . $short_code} ?? '' }}" new_name="new_section_2_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_2_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_3_content_{{ $short_code }}" class="form-label">Content</label>
                        <textarea class="editor" id="section_3_content_{{ $short_code }}" name="section_3_content_{{ $short_code }}" value="{{ $contents->{'section_3_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_content_' . $short_code} ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4 <span>(Importance)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_4_content_{{ $short_code }}" class="form-label">Content</label>
                            <textarea class="editor" id="section_4_content_{{ $short_code }}" name="section_4_content_{{ $short_code }}" value="{{ $contents->{'section_4_content_' . $short_code} ?? '' }}">{{ $contents->{'section_4_content_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_4_sub_content_{{ $short_code }}" class="form-label">Sub Content</label>
                            <textarea class="editor" id="section_4_sub_content_{{ $short_code }}" name="section_4_sub_content_{{ $short_code }}" value="{{ $contents->{'section_4_sub_content_' . $short_code} ?? '' }}">{{ $contents->{'section_4_sub_content_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_4_image" old_value="{{ $contents->{'section_4_image_' . $short_code} ?? '' }}" new_name="new_section_4_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_4_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_5_content_{{ $short_code }}" class="form-label">Content</label>
                        <textarea class="editor" id="section_5_content_{{ $short_code }}" name="section_5_content_{{ $short_code }}" value="{{ $contents->{'section_5_content_' . $short_code} ?? '' }}">{{ $contents->{'section_5_content_' . $short_code} ?? '' }}</textarea>
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
@endpush