@extends('backend.layouts.app')

@section('title', 'ISSN Official Partners and Affiliates')

@section('content')

    <x-backend.breadcrumb page_name="ISSN Official Partners and Affiliates"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.issn-official-partners-and-affiliates.update', $language) }}" method="POST" enctype="multipart/form-data">
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
                            <textarea class="form-control" rows="5" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Affiliates)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_2_description_{{ $short_code }}" name="section_2_description_{{ $short_code }}" value="{{ $contents->{'section_2_description_' . $short_code} ?? '' }}">{{ $contents->{'section_2_description_' . $short_code} ?? '' }}</textarea>
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
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input type="text" class="form-control mb-3" name="section_3_button_labels[]" placeholder="Label" value="{{ json_decode($contents->{'section_3_labels_links_' . $short_code})[0]->label ?? '' }}">

                        <input type="text" class="form-control" name="section_3_button_labels[]" placeholder="Label" value="{{ json_decode($contents->{'section_3_labels_links_' . $short_code})[1]->label ?? '' }}">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input type="url" class="form-control mb-3" name="section_3_button_links[]" placeholder="Link" value="{{ json_decode($contents->{'section_3_labels_links_' . $short_code})[0]->link ?? '' }}">

                        <input type="url" class="form-control" name="section_3_button_links[]" placeholder="Link" value="{{ json_decode($contents->{'section_3_labels_links_' . $short_code})[1]->link ?? '' }}">
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