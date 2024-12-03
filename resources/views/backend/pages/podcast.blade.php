@extends('backend.layouts.app')

@section('title', 'Podcast')

@section('content')

    <x-backend.breadcrumb page_name="Podcast"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.podcast.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Podcasts)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3 <span>(Journey)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
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
                <p class="inner-page-title">Section 4 <span>(Instagram)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="section_4_description_{{ $short_code }}" name="section_4_description_{{ $short_code }}" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
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