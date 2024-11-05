@extends('backend.layouts.app')

@section('title', 'Edit Conference')

@section('content')

    <x-backend.breadcrumb page_name="Edit Conference"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.conferences.update', $conference) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Conference Important Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $conference->title) }}" placeholder="Event Title" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="date" class="form-label">Date<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $conference->date) }}" placeholder="Date" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="where" class="form-label">Where<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="where" name="where" value="{{ old('where', $conference->where) }}" placeholder="Location" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="early_registration_deadline" class="form-label">Early Registration Deadline<span class="asterisk">*</span></label>
                        <input type="date" class="form-control" id="early_registration_deadline" name="early_registration_deadline" value="{{ old('early_registration_deadline', $conference->early_registration_deadline) }}" placeholder="Early Registration Deadline" required>
                    </div>

                    <div class="col-12">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="English" {{ old('language', $conference->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $conference->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $conference->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="inner-page-title mb-0">Conference More Details</p>
                    </div>
                    <div class="col-3 text-end">
                        <button type="button" class="add-row-button add-more-details-button">
                            <i class="bi bi-plus-lg"></i>
                            Add More Detail
                        </button>
                    </div>
                </div>

                <div class="form-input">
                    @if($conference->more_details)
                        @foreach(json_decode($conference->more_details) as $conference_more_detail)
                            <div class="row single-item mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" name="more_detail_titles[]" value="{{ $conference_more_detail->title }}" placeholder="Title">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="more_detail_values[]" value="{{ $conference_more_detail->value }}" placeholder="Text">
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="section">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="inner-page-title mb-0">Pricing Details</p>
                    </div>
                    <div class="col-3 text-end">
                        <button type="button" class="add-row-button add-pricing-details-button">
                            <i class="bi bi-plus-lg"></i>
                            Add More Detail
                        </button>
                    </div>
                </div>

                <div class="form-input">
                    @if($conference->price_details)
                        @foreach(json_decode($conference->price_details) as $conference_price_detail)
                            <div class="row single-item mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" name="price_detail_member_types[]" value="{{ $conference_price_detail->member_type }}" placeholder="Member Type">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="price_detail_early_registration_prices[]" value="{{ $conference_price_detail->early_registration_price }}" placeholder="Early Registration Price">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="price_detail_regular_registration_prices[]" value="{{ $conference_price_detail->regular_registration_price }}" placeholder="Regular Registration Price">
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <x-backend.edit-status :data="$conference"></x-backend.edit-status>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-more-details-button').on('click', function() {
            let html = `<div class="row single-item mt-3">
                            <div class="col">
                                <input type="text" class="form-control" name="more_detail_titles[]" placeholder="Title">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="more_detail_values[]" placeholder="Value">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;
            $(this).closest('.row').next('.form-input').append(html);
        });

        $('.add-pricing-details-button').on('click', function() {
            let html = `<div class="row single-item mt-3">
                            <div class="col">
                                <input type="text" class="form-control" name="price_detail_member_types[]" placeholder="Member Type">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="price_detail_early_registration_prices[]" placeholder="Early Registration Price">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="price_detail_regular_registration_prices[]" placeholder="Regular Registration Price">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;
            $(this).closest('.row').next('.form-input').append(html);
        });
    </script>
@endpush