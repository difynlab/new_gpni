@extends('backend.layouts.app')

@section('title', 'Edit Media')

@section('content')

    <x-backend.breadcrumb page_name="Edit Media"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.medias.update', $media) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Media Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $media->name) }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="location" class="form-label">Location<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="location" name="location" required>
                            <option value="">Select location</option>
                            <option value="Student Center" {{ old('language', $media->location) == 'Student Center' ? 'selected' : '' }}>Student Center</option>
                            <option value="Member Corner" {{ old('language', $media->location) == 'Member Corner' ? 'selected' : '' }}>Member Corner</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $media->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $media->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $media->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="type" name="type" disabled>
                            <option value="">Select type</option>
                            <option value="Image" {{ old('type', $media->type) == 'Image' ? 'selected' : '' }}>Image</option>
                            <option value="Video" {{ old('type', $media->type) == 'Video' ? 'selected' : '' }}>Video</option>
                            <option value="Vimeo Video Link" {{ old('type', $media->type) == 'Vimeo Video Link' ? 'selected' : '' }}>Vimeo Video Link</option>
                            <option value="PDF" {{ old('type', $media->type) == 'PDF' ? 'selected' : '' }}>PDF</option>
                            <option value="Word" {{ old('type', $media->type) == 'Word' ? 'selected' : '' }}>Word</option>
                            <option value="Excel" {{ old('type', $media->type) == 'Excel' ? 'selected' : '' }}>Excel</option>
                            <option value="PPT" {{ old('type', $media->type) == 'PPT' ? 'selected' : '' }}>PPT</option>
                            <option value="Audio" {{ old('type', $media->type) == 'Audio' ? 'selected' : '' }}>Audio</option>
                        </select>
                    </div>

                    <div class="col-12 mt-4 image">
                        @if($media->image)
                            <img src="{{ asset('storage/backend/medias/' . $media->image) }}" alt="Image" class="old-image">
                            <input type="hidden" class="form-control" name="old_image" value="{{ $media->image }}">
                    
                            <div class="mt-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="new_image" placeholder="Image" accept="image/*">
                                <x-backend.input-error field="new_image"></x-backend.input-error>
                            </div>
                        @else
                            <label for="image" class="form-label">Image<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="image" name="new_image" placeholder="Image" accept="image/*" required>
                            <x-backend.input-error field="new_image"></x-backend.input-error>
                        @endif
                    </div>

                    <div class="col-12 mt-4 video">
                        @if($media->video)
                            <video controls src="{{ asset('storage/backend/medias/' . $media->video) }}" alt="Video" class="old-video"></video>
                            <input type="hidden" class="form-control" name="old_video" value="{{ $media->video }}">
                    
                            <div class="mt-2">
                                <label for="video" class="form-label">Video</label>
                                <input type="file" class="form-control" id="video" name="new_video" placeholder="Video" accept="video/*">
                                <x-backend.input-error field="new_video"></x-backend.input-error>
                            </div>
                        @else
                            <label for="video" class="form-label">Video<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="video" name="new_video" placeholder="Video" accept="video/*" required>
                            <x-backend.input-error field="new_video"></x-backend.input-error>
                        @endif
                    </div>

                    <div class="col-12 mt-4 vimeo-video-link">
                        <label for="vimeo-video-link" class="form-label">Vimeo Video Link<span class="asterisk">*</span></label>
                        <input type="url" class="form-control" id="vimeo-video-link" name="vimeo_video_link" value="{{ $media->vimeo_video_link }}" placeholder="Vimeo Video Link">
                    </div>

                    <div class="col-12 mt-4 pdf">
                        @if($media->pdf)
                            <label for="pdf" class="form-label">PDF</label>

                            <div class="row align-items-center">
                                <div class="col-11">
                                    <input type="file" class="form-control" id="pdf" name="new_pdf" placeholder="PDF" accept=".pdf">
                                    <x-backend.input-error field="new_pdf"></x-backend.input-error>
                                </div>
                                <div class="col-1">
                                    <a href="{{ asset('storage/backend/medias/' . $media->pdf) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                    <input type="hidden" class="form-control" name="old_pdf" value="{{ $media->pdf }}">
                                </div>
                            </div>
                        @else
                            <label for="pdf" class="form-label">PDF<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="pdf" name="new_pdf" placeholder="PDF" accept=".pdf" required>
                            <x-backend.input-error field="new_pdf"></x-backend.input-error>
                        @endif
                    </div>

                    <div class="col-12 mt-4 word">
                        @if($media->word)
                            <label for="word" class="form-label">Word</label>

                            <div class="row align-items-center">
                                <div class="col-11">
                                    <input type="file" class="form-control" id="word" name="new_word" placeholder="Word" accept=".doc,.docx,.rtf">
                                    <x-backend.input-error field="new_word"></x-backend.input-error>
                                </div>
                                <div class="col-1">
                                    <a href="{{ asset('storage/backend/medias/' . $media->word) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                    <input type="hidden" class="form-control" name="old_word" value="{{ $media->word }}">
                                </div>
                            </div>
                        @else
                            <label for="word" class="form-label">Word<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="word" name="new_word" placeholder="Word" accept=".doc,.docx,.rtf" required>
                            <x-backend.input-error field="new_word"></x-backend.input-error>
                        @endif
                    </div>

                    <div class="col-12 mt-4 excel">
                        @if($media->excel)
                            <label for="excel" class="form-label">Excel</label>

                            <div class="row align-items-center">
                                <div class="col-11">
                                    <input type="file" class="form-control" id="excel" name="new_excel" placeholder="Excel" accept=".xls,.xlsx,.csv">
                                    <x-backend.input-error field="new_excel"></x-backend.input-error>
                                </div>
                                <div class="col-1">
                                    <a href="{{ asset('storage/backend/medias/' . $media->excel) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                    <input type="hidden" class="form-control" name="old_excel" value="{{ $media->excel }}">
                                </div>
                            </div>
                        @else
                            <label for="excel" class="form-label">Excel<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="excel" name="new_excel" placeholder="Excel" accept=".xls,.xlsx,.csv" required>
                            <x-backend.input-error field="new_excel"></x-backend.input-error>
                        @endif
                    </div>

                    <div class="col-12 mt-4 ppt">
                        @if($media->ppt)
                            <label for="ppt" class="form-label">Powerpoint</label>

                            <div class="row align-items-center">
                                <div class="col-11">
                                    <input type="file" class="form-control" id="ppt" name="new_ppt" placeholder="Powerpoint" accept=".ppt,.pptx">
                                    <x-backend.input-error field="new_ppt"></x-backend.input-error>
                                </div>
                                <div class="col-1">
                                    <a href="{{ asset('storage/backend/medias/' . $media->ppt) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                    <input type="hidden" class="form-control" name="old_ppt" value="{{ $media->ppt }}">
                                </div>
                            </div>
                        @else
                            <label for="ppt" class="form-label">Powerpoint<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="ppt" name="new_ppt" placeholder="Powerpoint" accept=".ppt,.pptx" required>
                            <x-backend.input-error field="new_ppt"></x-backend.input-error>
                        @endif
                    </div>

                    <div class="col-12 mt-4 audio">
                        @if($media->audio)
                            <label for="audio" class="form-label">Audio</label>

                            <div class="row align-items-center">
                                <div class="col-11">
                                    <input type="file" class="form-control" id="audio" name="new_audio" placeholder="Audio" accept="audio/*">
                                    <x-backend.input-error field="new_audio"></x-backend.input-error>
                                </div>
                                <div class="col-1">
                                    <a href="{{ asset('storage/backend/medias/' . $media->audio) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                    <input type="hidden" class="form-control" name="old_audio" value="{{ $media->audio }}">
                                </div>
                            </div>
                        @else
                            <label for="audio" class="form-label">Audio<span class="asterisk">*</span></label>
                            <input type="file" class="form-control" id="audio" name="new_audio" placeholder="Audio" accept="audio/*" required>
                            <x-backend.input-error field="new_audio"></x-backend.input-error>
                        @endif
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$media"></x-backend.edit-status>
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
                    // fields[selectedType].input.attr('required', 'required');
                }
            });

            $typeSelect.trigger('change');
        });
    </script>
@endpush