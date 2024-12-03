@extends('backend.layouts.app')

@section('title', 'Edit Course Review')

@section('content')

    <x-backend.breadcrumb page_name="Edit Course Review"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.reviews.update', [$course, $course_review]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <div class="row form-input">
                    <div class="col-12 ">
                        <div class="mb-4">
                            <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course_review->name) }}" placeholder="Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Content<span class="asterisk">*</span></label>
                            <textarea class="form-control textarea" id="content" rows="5" name="content" value="{{ old('content', $course_review->content) }}" required>{{ old('content', $course_review->content) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="rating" class="form-label">Rating<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="rating" required>
                                <option value="">Select Rating</option>
                                <option value="1" {{ old('rating', $course_review->rating) == '1' ? "selected" : "" }}>1</option>
                                <option value="2" {{ old('rating', $course_review->rating) == '2' ? "selected" : "" }}>2</option>
                                <option value="3" {{ old('rating', $course_review->rating) == '3' ? "selected" : "" }}>3</option>
                                <option value="4" {{ old('rating', $course_review->rating) == '4' ? "selected" : "" }}>4</option>
                                <option value="5" {{ old('rating', $course_review->rating) == '5' ? "selected" : "" }}>5</option>
                            </select>
                        </div>

                        <div>
                            <x-backend.upload-image old_name="old_image" old_value="{{ $course_review->image ?? old('image') }}" new_name="new_image" path="courses/course-reviews"></x-backend.upload-image>
                            <x-backend.input-error field="new_image"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$course_review"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush