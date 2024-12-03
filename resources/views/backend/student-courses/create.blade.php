@extends('backend.layouts.app')

@section('title', 'Add Course')

@section('content')

    <x-backend.breadcrumb page_name="Add Course"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.students.courses.store', $student) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <div class="row form-input">
                    <div class="col-12">
                        <label for="course_id" class="form-label">Course<span class="asterisk">*</span></label>
                        <select class="form-control js-example-basic-single course" name="course_id" id="course_id" required>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
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
    <script>
        $('.js-example-basic-single').select2({
        });
    </script>
@endpush