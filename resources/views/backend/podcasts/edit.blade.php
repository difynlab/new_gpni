@extends('backend.layouts.app')

@section('title', 'Edit Podcast')

@section('content')

    <x-backend.breadcrumb page_name="Edit Podcast"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.podcasts.update', $podcast) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Podcast Details</p>

                <div class="row form-input">
                    <div class="col-7">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $podcast->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="language" name="language" required>
                                <option value="">Select language</option>
                                <option value="English" {{ old('language', $podcast->language) == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Chinese" {{ old('language', $podcast->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Japanese" {{ old('language', $podcast->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            </select>
                        </div>

                        <div>
                            @if($podcast->video)
                                <video controls src="{{ asset('storage/backend/podcasts/' . $podcast->video) }}" alt="Video" class="old-video"></video>
                                <input type="hidden" class="form-control" name="old_video" value="{{ $podcast->video }}">
                        
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
                    </div>

                    <div class="col-5 full-height">
                        <x-backend.upload-image old_name="old_thumbnail" old_value="{{ $podcast->thumbnail ?? old('thumbnail') }}" new_name="new_thumbnail" path="podcasts" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_thumbnail"></x-backend.input-error>
                    </div>
                    

                    <div class="col-12 mt-4">
                        <label for="content" class="form-label">Content<span class="asterisk">*</span></label>
                        <textarea class="editor" id="content" name="content" value="{{ old('content', $podcast->content) }}">{{ old('content', $podcast->content) }}</textarea>
                        <x-backend.input-error field="content"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$podcast"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush