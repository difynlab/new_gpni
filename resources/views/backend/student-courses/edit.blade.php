@extends('backend.layouts.app')

@section('title', 'Edit Course')

@section('content')

    <x-backend.breadcrumb page_name="Edit Course"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.students.courses.update', [$student, $course_purchase]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="course_id" class="form-label">Course<span class="asterisk">*</span></label>
                        <select class="form-control js-example-basic-single course" name="course_id" id="course_id" required disabled readonly>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $course_purchase->course_id == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="course_id" value="{{ $course_purchase->course_id }}">
                    </div>

                    <div class="col-12">
                        <label for="course_access_status" class="form-label">Course Access Status<span class="asterisk">*</span></label>
                        <select class="form-control" name="course_access_status" id="course_access_status" required>
                            <option value="Active" {{ $course_purchase->course_access_status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Revoked" {{ $course_purchase->course_access_status == 'Revoked' ? 'selected' : '' }}>Revoked</option>
                        </select>
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
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>

    <script>
        $('.time-required').on('change', function() {
            let value = $(this).val();

            if(value == 'Yes') {
                $(this).closest('div').next().removeClass('d-none');
                $(this).closest('div').next().find('input').attr('required', true);
            }
            else {
                $(this).closest('div').next().addClass('d-none');
                $(this).closest('div').next().find('input').attr('required', false);
            }
        });
    </script>
@endpush