@extends('backend.layouts.app')

@section('title', 'Create Media')

@section('content')

    <x-backend.breadcrumb page_name="Create Media"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.medias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Media Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="location" class="form-label">Location<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="location" name="location" required>
                            <option value="">Select location</option>
                            <option value="Student Center" {{ old('location') == 'Student Center' ? 'selected' : '' }}>Student Center</option>
                            <option value="Member Corner" {{ old('location') == 'Member Corner' ? 'selected' : '' }}>Member Corner</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="type" name="type" required>
                            <option value="">Select type</option>
                            <option value="Image" {{ old('type') == 'Image' ? 'selected' : '' }}>Image</option>
                            <option value="Video" {{ old('type') == 'Video' ? 'selected' : '' }}>Video</option>
                            <option value="Vimeo Video Link" {{ old('type') == 'Vimeo Video Link' ? 'selected' : '' }}>Vimeo Video Link</option>
                            <option value="PDF" {{ old('type') == 'PDF' ? 'selected' : '' }}>PDF</option>
                            <option value="Word" {{ old('type') == 'Word' ? 'selected' : '' }}>Word</option>
                            <option value="Excel" {{ old('type') == 'Excel' ? 'selected' : '' }}>Excel</option>
                            <option value="PPT" {{ old('type') == 'PPT' ? 'selected' : '' }}>PPT</option>
                            <option value="Audio" {{ old('type') == 'Audio' ? 'selected' : '' }}>Audio</option>
                        </select>
                    </div>

                    <div class="col-12 mt-4 image">
                        <label for="image" class="form-label">Image<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Image" accept="image/*">
                        <x-backend.input-error field="image"></x-backend.input-error>
                    </div>

                    <div class="col-12 mt-4 video">
                        <label for="video" class="form-label">Video<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="video" name="video" placeholder="Video" accept="video/*">
                        <x-backend.input-error field="video"></x-backend.input-error>
                    </div>

                    <div class="col-12 mt-4 vimeo-video-link">
                        <label for="vimeo-video-link" class="form-label">Vimeo Video Link<span class="asterisk">*</span></label>
                        <input type="url" class="form-control" id="vimeo-video-link" name="vimeo_video_link" placeholder="Vimeo Video Link">
                    </div>

                    <div class="col-12 mt-4 pdf">
                        <label for="pdf" class="form-label">PDF<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="pdf" name="pdf" placeholder="PDF" accept=".pdf">
                        <x-backend.input-error field="pdf"></x-backend.input-error>
                    </div>

                    <div class="col-12 mt-4 word">
                        <label for="word" class="form-label">Word<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="word" name="word" placeholder="Word" accept=".doc,.docx,.rtf">
                        <x-backend.input-error field="word"></x-backend.input-error>
                    </div>

                    <div class="col-12 mt-4 excel">
                        <label for="excel" class="form-label">Excel<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="excel" name="excel" placeholder="Excel" accept=".xls,.xlsx,.csv">
                        <x-backend.input-error field="excel"></x-backend.input-error>
                    </div>

                    <div class="col-12 mt-4 ppt">
                        <label for="ppt" class="form-label">Powerpoint<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="ppt" name="ppt" placeholder="Powerpoint" accept=".ppt,.pptx">
                        <x-backend.input-error field="ppt"></x-backend.input-error>
                    </div>

                    <div class="col-12 mt-4 audio">
                        <label for="audio" class="form-label">Audio<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="audio" name="audio" placeholder="Audio" accept="audio/*">
                        <x-backend.input-error field="audio"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            const $typeSelect = $('#type');

            const fields = {
                'Image': {
                    element: $('.image'),
                    input: $('#image')
                },
                'Video': {
                    element: $('.video'),
                    input: $('#video')
                },
                'Vimeo Video Link': {
                    element: $('.vimeo-video-link'),
                    input: $('#vimeo-video-link')
                },
                'PDF': {
                    element: $('.pdf'),
                    input: $('#pdf')
                },
                'Word': {
                    element: $('.word'),
                    input: $('#word')
                },
                'Excel': {
                    element: $('.excel'),
                    input: $('#excel')
                },
                'PPT': {
                    element: $('.ppt'),
                    input: $('#ppt')
                },
                'Audio': {
                    element: $('.audio'),
                    input: $('#audio')
                }
            };

            $typeSelect.on('change', function() {
                const selectedType = $(this).val();
                
                $.each(fields, function(key, field) {
                    field.element.addClass('d-none');
                    field.input.removeAttr('required');
                });

                if(fields[selectedType]) {
                    fields[selectedType].element.removeClass('d-none');
                    fields[selectedType].input.attr('required', 'required');
                }
            });

            $typeSelect.trigger('change');
        });
    </script>
@endpush