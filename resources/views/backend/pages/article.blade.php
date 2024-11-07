@extends('backend.layouts.app')

@section('title', 'Article')

@section('content')

    <x-backend.breadcrumb page_name="Article"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.article.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_social_title_{{ $short_code }}" class="form-label">Social Title</label>
                        <input type="text" class="form-control" id="section_1_social_title_{{ $short_code }}" name="section_1_social_title_{{ $short_code }}" value="{{ $contents->{'section_1_social_title_' . $short_code} ?? '' }}" placeholder="Social Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_newsletter_title_{{ $short_code }}" class="form-label">Newsletter Title</label>
                        <input type="text" class="form-control" id="section_1_newsletter_title_{{ $short_code }}" name="section_1_newsletter_title_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_title_' . $short_code} ?? '' }}" placeholder="Newsletter Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_newsletter_description_{{ $short_code }}" class="form-label">Newsletter Description</label>
                        <input type="text" class="form-control" id="section_1_newsletter_description_{{ $short_code }}" name="section_1_newsletter_description_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_description_' . $short_code} ?? '' }}" placeholder="Newsletter Description">
                    </div>

                    <div class="col-6">
                        <label for="section_1_newsletter_placeholder_{{ $short_code }}" class="form-label">Newsletter Placeholder</label>
                        <input type="text" class="form-control" id="section_1_newsletter_placeholder_{{ $short_code }}" name="section_1_newsletter_placeholder_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_placeholder_' . $short_code} ?? '' }}" placeholder="Newsletter Placeholder">
                    </div>

                    <div class="col-6">
                        <label for="section_1_newsletter_button_{{ $short_code }}" class="form-label">Newsletter Button</label>
                        <input type="text" class="form-control" id="section_1_newsletter_button_{{ $short_code }}" name="section_1_newsletter_button_{{ $short_code }}" value="{{ $contents->{'section_1_newsletter_button_' . $short_code} ?? '' }}" placeholder="Newsletter Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Instagram)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_2_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="section_2_description_{{ $short_code }}" name="section_2_description_{{ $short_code }}" value="{{ $contents->{'section_2_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_2_description_' . $short_code} ?? '' }}</textarea>
                        </div>
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