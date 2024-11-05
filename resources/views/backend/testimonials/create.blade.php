@extends('backend.layouts.app')

@section('title', 'Create Testimonial')

@section('content')

    <x-backend.breadcrumb page_name="Create Testimonial"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Testimonial Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="designation" class="form-label">Designation<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}" placeholder="Designation" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="rate" class="form-label">Rate<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="rate" name="rate" required>
                            <option value="">Select rate</option>
                            <option value="1" {{ old('rate') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('rate') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('rate') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('rate') == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('rate') == '5' ? 'selected' : '' }}>5</option>
                        </select>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="type" name="type" required>
                            <option value="">Select type</option>
                            <option value="Common" {{ old('type') == 'Common' ? 'selected' : '' }}>Common</option>
                            <option value="Master Class" {{ old('type') == 'Master Class' ? 'selected' : '' }}>Master Class</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="content" class="form-label">Content<span class="asterisk">*</span></label>
                        <textarea class="form-control" id="content" rows="5" name="content" value="{{ old('content') }}" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ old('image') }}" new_name="new_image" path="testimonials"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
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