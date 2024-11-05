@extends('backend.layouts.app')

@section('title', 'Create Podcast')

@section('content')

    <x-backend.breadcrumb page_name="Create Podcast"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.podcasts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Podcast Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}" required>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="video" class="form-label">Video<span class="asterisk">*</span></label>
                        <input type="file" class="form-control" id="video" name="video" placeholder="Video" accept="video/*" required>
                        <x-backend.input-error field="video"></x-backend.input-error>
                    </div>

                    <div class="col-12">
                        <label for="content" class="form-label">Content<span class="asterisk">*</span></label>
                        <textarea class="editor" id="content" name="content" value="{{ old('content') }}">{{ old('content') }}</textarea>
                        <x-backend.input-error field="content"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection