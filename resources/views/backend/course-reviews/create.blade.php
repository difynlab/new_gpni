@extends('backend.layouts.app')

@section('title', 'Create Course Review')

@section('content')

    <x-backend.breadcrumb page_name="Create Course Review"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.reviews.store', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <div class="row form-input">
                    <div class="col-12 ">
                        <div class="mb-4">
                            <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Content<span class="asterisk">*</span></label>
                            <textarea class="form-control textarea" id="content" rows="5" name="content" value="{{ old('content') }}" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="rating" class="form-label">Rating<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="rating" required>
                                <option value="">Select Rating</option>
                                <option value="1" {{ old('rating') == '1' ? "selected" : "" }}>1</option>
                                <option value="2" {{ old('rating') == '2' ? "selected" : "" }}>2</option>
                                <option value="3" {{ old('rating') == '3' ? "selected" : "" }}>3</option>
                                <option value="4" {{ old('rating') == '4' ? "selected" : "" }}>4</option>
                                <option value="5" {{ old('rating') == '5' ? "selected" : "" }}>5</option>
                            </select>
                        </div>

                        <div>
                            <x-backend.upload-video old_name="old_video" old_value="{{ $course->video ?? '' }}" new_name="new_video" path="courses/course-reviews"></x-backend.upload-video>
                            <x-backend.input-error field="new_video"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
@endpush