@extends('backend.layouts.app')

@section('title', 'Gift Card')

@section('content')

    <x-backend.breadcrumb page_name="Gift Card"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.gift-card.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Section <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="sub_title_{{ $short_code }}" name="sub_title_{{ $short_code }}" value="{{ $contents->{'sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>

                        <div class="mb-4">
                            <label for="description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" id="description_{{ $short_code }}" name="description_{{ $short_code }}" value="{{ $contents->{'description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-multi-images image_count="5" old_name="old_images" old_value="{{ $contents->{'images_' . $short_code} ?? '' }}" new_name="new_images[]" path="pages"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_images.*"></x-backend.input-error>
                        </div>

                        <div>
                            <label class="form-label">Button</label>
                            <input class="form-control" type="text" id="button_{{ $short_code }}" name="button_{{ $short_code }}" value="{{ $contents->{'button_' . $short_code} ?? '' }}" placeholder="Button">
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


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
@endpush