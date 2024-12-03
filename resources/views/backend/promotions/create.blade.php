@extends('backend.layouts.app')

@section('title', 'Create Promotion')

@section('content')

    <x-backend.breadcrumb page_name="Create Promotion"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.promotions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Promotion Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="type" id="type" required>
                                <option value="">Select type</option>
                                <option value="Course Discount" {{ old('type') == 'Course Discount' ? 'selected' : '' }}>Course discount</option>
                                <option value="Coupon Code" {{ old('type') == 'Coupon Code' ? 'selected' : '' }}>Coupon code</option>
                            </select>
                        </div>

                        @if(old('type') == 'Course Discount')
                            <div class="course-discount-fields">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title">
                                </div>

                                <div class="mb-4">
                                    <label for="old_course_id" class="form-label">Old Course<span class="asterisk">*</span></label>
                                    <select class="form-control form-select" name="old_course_id">
                                        <option value="">Select old course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $course->id == old('old_course_id') ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="new_course_id" class="form-label">New Course<span class="asterisk">*</span></label>
                                    <select class="form-control form-select" name="new_course_id">
                                        <option value="">Select new course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $course->id == old('new_course_id') ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    <x-backend.input-error field="new_course_id"></x-backend.input-error>
                                </div>
                            </div>
                        @else
                            <div class="course-discount-fields d-none">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title">
                                </div>

                                <div class="mb-4">
                                    <label for="old_course_id" class="form-label">Old Course<span class="asterisk">*</span></label>
                                    <select class="form-control form-select" name="old_course_id">
                                        <option value="">Select old course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $course->id == old('old_course_id') ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="new_course_id" class="form-label">New Course<span class="asterisk">*</span></label>
                                    <select class="form-control form-select" name="new_course_id">
                                        <option value="">Select new course</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $course->id == old('new_course_id') ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    <x-backend.input-error field="new_course_id"></x-backend.input-error>
                                </div>
                            </div>
                        @endif

                        @if(old('type') == 'Coupon Code')
                            <div class="coupon-code-fields">
                                <div class="mb-4">
                                    <label for="coupon_code" class="form-label">Coupon Code<span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{ old('coupon_code') }}" placeholder="Coupon Code">
                                </div>

                                <div class="mb-4">
                                    <label for="coupon_code" class="form-label">Coupon Code Type<span class="asterisk">*</span></label>
                                    <select class="form-control form-select" name="coupon_code_type">
                                        <option value="">Select coupon code type</option>
                                        <option value="Amount">By amount</option>
                                        <option value="Percentage">By percentage</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="start_date" class="form-label">Start Date<span class="asterisk">*</span></label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" placeholder="Start Date">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="end_date" class="form-label">End Date<span class="asterisk">*</span></label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" placeholder="End Date">
                                </div>
                            </div>
                        @else
                            <div class="coupon-code-fields d-none">
                                <div class="mb-4">
                                    <label for="coupon_code" class="form-label">Coupon Code<span class="asterisk">*</span></label>
                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{ old('coupon_code') }}" placeholder="Coupon Code">
                                </div>

                                <div class="mb-4">
                                    <label for="coupon_code" class="form-label">Coupon Code Type<span class="asterisk">*</span></label>
                                    <select class="form-control form-select" name="coupon_code_type">
                                        <option value="">Select coupon code type</option>
                                        <option value="Amount">By amount</option>
                                        <option value="Percentage">By percentage</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="start_date" class="form-label">Start Date<span class="asterisk">*</span></label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" placeholder="Start Date">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="end_date" class="form-label">End Date<span class="asterisk">*</span></label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" placeholder="End Date">
                                </div>
                            </div>
                        @endif

                        <div>
                            <label for="value" class="form-label">Value<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}" placeholder="Value" required>
                            <x-backend.input-error field="value"></x-backend.input-error>
                        </div>
                        
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script>
        $('#type').on('change', function() {
            let value = $(this).val();

            if(value == 'Course Discount') {
                $('.course-discount-fields').removeClass('d-none');
                $('.coupon-code-fields').addClass('d-none');

                $('.course-discount-fields').find('input').attr('required', true);
                $('.coupon-code-fields').find('input').val('');
                $('.coupon-code-fields').find('input').attr('required', false);
            }
            else {
                $('.course-discount-fields').addClass('d-none');
                $('.coupon-code-fields').removeClass('d-none');

                $('.coupon-code-fields').find('input').attr('required', true);
                $('.course-discount-fields').find('input').val('');
                $('.course-discount-fields').find('input').attr('required', false);
            }
        });
    </script>
@endpush