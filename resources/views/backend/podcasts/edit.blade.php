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
                    <div class="col-12 mb-4">
                        <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $podcast->title) }}" required>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $podcast->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $podcast->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $podcast->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
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

                    <div>
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