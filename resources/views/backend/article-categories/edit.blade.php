@extends('backend.layouts.app')

@section('title', 'Edit Article Category')

@section('content')

    <x-backend.breadcrumb page_name="Edit Article Category"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.article-categories.update', $article_category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section ">
                <p class="inner-page-title">Article Category Details</p>

                <div class="row form-input">
                    <div class="col-6">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $article_category->name) }}" placeholder="Name">
                    </div>

                    <div class="col-6">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="English" {{ old('language', $article_category->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $article_category->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $article_category->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$article_category"></x-backend.edit-status>
        </form>
    </div>

@endsection