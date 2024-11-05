@extends('backend.layouts.app')

@section('title', 'History Of GPNi')

@section('content')

    <x-backend.breadcrumb page_name="History Of GPNi"></x-backend.breadcrumb>

    <div class="static-pages">

        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.history-of-gpni.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Background banner)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_large_title_{{ $short_code }}" class="form-label">Large Title</label>
                            <input type="text" class="form-control" id="section_1_large_title_{{ $short_code }}" name="section_1_large_title_{{ $short_code }}" value="{{ $contents->{'section_1_large_title_' . $short_code} ?? '' }}" placeholder="Large Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_year_{{ $short_code }}" class="form-label">Year</label>
                            <input type="text" class="form-control" id="section_1_year_{{ $short_code }}" name="section_1_year_{{ $short_code }}" value="{{ $contents->{'section_1_year_' . $short_code} ?? '' }}" placeholder="Year">
                        </div>

                        <div>
                            <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->{'section_1_image_' . $short_code} ?? '' }}" new_name="new_section_1_image" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Who we are)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_2_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_2_sub_title_{{ $short_code }}" name="section_2_sub_title_{{ $short_code }}" value="{{ $contents->{'section_2_sub_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_2_description_{{ $short_code }}" value="{{ $contents->{'section_2_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_2_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3 <span>(Our story)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_3_image" old_value="{{ $contents->{'section_3_image_' . $short_code} ?? '' }}" new_name="new_section_3_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_3_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4 <span>(Our founders)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div>
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5 <span>(Official partners)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <x-backend.upload-image old_name="old_section_5_image" old_value="{{ $contents->{'section_5_image_' . $short_code} ?? '' }}" new_name="new_section_5_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_5_image"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
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
            </div>

            <div class="section">
                <p class="inner-page-title">Section 6 <span>(Gold standard)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_6_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_6_title_{{ $short_code }}" name="section_6_title_{{ $short_code }}" value="{{ $contents->{'section_6_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_6_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_6_description_{{ $short_code }}" name="section_6_description_{{ $short_code }}" value="{{ $contents->{'section_6_description_' . $short_code} ?? '' }}">{{ $contents->{'section_6_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_6_image" old_value="{{ $contents->{'section_6_image_' . $short_code} ?? '' }}" new_name="new_section_6_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_6_image"></x-backend.input-error>
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