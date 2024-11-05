@extends('backend.layouts.app')

@section('title', 'Create Article')

@section('content')

    <x-backend.breadcrumb page_name="Create Article"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Article Details</p>

                <div class="row form-input">
                    <div class="col-7">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title" required>
                        </div>

                        <div class="mb-4">
                            <label for="article_category_id" class="form-label">Article Category<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="article_category_id" name="article_category_id" required>
                                <option value="">Select article category</option>
                                @foreach($article_categories as $article_category)
                                    <option value="{{ $article_category->id }}" {{ old('article_category_id') == $article_category->id ? 'selected' : '' }}>{{ $article_category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="language" name="language" required>
                                <option value="">Select language</option>
                                <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="editor" id="content" name="content" value="{{ old('content') }}">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="col-5 full-height">
                        <x-backend.upload-image old_name="old_thumbnail" old_value="{{ old('thumbnail') }}" new_name="new_thumbnail" path="articles" label="Thumbnail" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_thumbnail"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Author Details</p>

                <div class="row form-input">
                    <div class="col-7">
                        <div class="mb-4">
                            <label for="author_name" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}" placeholder="Author Name">
                        </div>

                        <div class="mb-4">
                            <label for="author_designation" class="form-label">Author Designation</label>
                            <input type="text" class="form-control" id="author_designation" name="author_designation" value="{{ old('author_designation') }}" placeholder="Author Designation">
                        </div>
                        
                        <div>
                            <label for="author_description" class="form-label">Author Description</label>
                            <textarea class="form-control" rows="4" id="author_description" name="author_description" value="{{ old('author_description') }}" placeholder="Author Description">{{ old('author_description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-5 full-height">
                        <x-backend.upload-image old_name="old_author_image" old_value="{{ old('author_image') }}" new_name="new_author_image" path="articles" label="Author" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_author_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Details</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="reading_time" class="form-label">Reading Time</label>
                            <input type="text" class="form-control" id="reading_time" name="reading_time" value="{{ old('reading_time') }}" placeholder="Reading Time">
                        </div>
                        
                        <div>
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <textarea class="form-control" rows="4" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Meta Keywords">{{ old('meta_keywords') }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 full-height">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" rows="4" id="meta_description" name="meta_description" value="{{ old('meta_description') }}" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush