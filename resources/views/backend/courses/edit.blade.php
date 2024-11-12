@extends('backend.layouts.app')

@section('title', 'Edit Course')

@section('content')

    <x-backend.breadcrumb page_name="Edit Course"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Course details section)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course->title) }}" placeholder="Title" required>
                        </div>

                        <div class="mb-4">
                            <label for="duration" class="form-label">Duration<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $course->duration) }}" placeholder="Duration" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="language" name="language" required>
                                <option value="English" {{ old('language', $course->language) == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Chinese" {{ old('language', $course->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Japanese" {{ old('language', $course->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="type" name="type" required>
                                <option value="Certification" {{ old('type', $course->type) == 'Certification' ? 'selected' : '' }}>Certification</option>
                                <option value="Masters" {{ old('type', $course->type) == 'Masters' ? 'selected' : '' }}>Masters</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="course_status" class="form-label">Course Status<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="course_status" name="course_status" required>
                                <option value="Present" {{ old('course_status', $course->course_status) == 'Present' ? 'selected' : '' }}>Present</option>
                                <option value="Upcoming" {{ old('course_status', $course->course_status) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="no_of_modules" class="form-label">No of Modules<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="no_of_modules" name="no_of_modules" value="{{ old('no_of_modules', $course->no_of_modules) }}" placeholder="No of Modules" required>
                        </div>

                        <div class="mb-4">
                            <label for="no_of_students_enrolled" class="form-label">No of Students Enrolled<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="no_of_students_enrolled" name="no_of_students_enrolled" value="{{ old('no_of_students_enrolled', $course->no_of_students_enrolled) }}" placeholder="No of Students Enrolled" required>
                        </div>

                        <div>
                            <label for="price" class="form-label">Price<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $course->price) }}" placeholder="Price" required>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_image" old_value="{{ old('image', $course->image) }}" new_name="new_image" path="courses/course-images" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="instructor_name" class="form-label">Instructor Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="instructor_name" name="instructor_name" value="{{ old('instructor_name', $course->instructor_name) }}" placeholder="Instructor Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="instructor_designation" class="form-label">Instructor Designation<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="instructor_designation" name="instructor_designation" value="{{ old('instructor_designation', $course->instructor_designation) }}" placeholder="Instructor Designation" required>
                        </div>

                        <div>
                            <x-backend.upload-image old_name="old_instructor_profile_image" old_value="{{ old('instructor_profile_image', $course->instructor_profile_image) }}" new_name="new_instructor_profile_image" label="Instructor Profile" path="courses/course-instructors"></x-backend.upload-image>
                            <x-backend.input-error field="new_instructor_profile_image"></x-backend.input-error>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <div class="mb-4">
                            <x-backend.upload-video old_name="old_video" old_value="{{ $course->video ?? old('video') }}" new_name="new_video" path="courses/course-videos"></x-backend.upload-video>
                            <x-backend.input-error field="new_video"></x-backend.input-error>
                        </div>

                        <label for="short_description" class="form-label">Short Description<span class="asterisk">*</span></label>
                        <textarea class="form-control" name="short_description" value="{{ old('short_description', $course->short_description) }}" placeholder="Short Description" required>{{ old('short_description', $course->short_description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Instalment Details</p>

                <div class="row form-input">
                    <div class="col-4">
                        <label for="instalment_months" class="form-label">Instalment Months</label>
                        <input type="number" class="form-control" id="instalment_months" name="instalment_months" value="{{ old('instalment_months', $course->instalment_months) }}" placeholder="Instalment Months">
                    </div>
                    
                    <div class="col-4">
                        <label for="instalment_price" class="form-label">Instalment Price</label>
                        <input type="text" class="form-control" id="instalment_price" name="instalment_price" value="{{ old('instalment_price', $course->instalment_price) }}" placeholder="Instalment Price">
                    </div>

                    <div class="col-4">
                        <label for="instalment_price_id" class="form-label">Instalment Price ID</label>
                        <input type="text" class="form-control" id="instalment_price_id" name="instalment_price_id" value="{{ old('instalment_price_id', $course->instalment_price_id) }}" placeholder="Instalment Price ID">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Course Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="course_introduction" class="form-label">Course Introduction</label>
                            <textarea class="editor" id="course_introduction" name="course_introduction" value="{{ old('course_introduction', $course->course_introduction) }}">{{ old('course_introduction', $course->course_introduction) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="course_content" class="form-label">Course Content</label>
                            <textarea class="editor" id="course_content" name="course_content" value="{{ old('course_content', $course->course_content) }}">{{ old('course_content', $course->course_content) }}</textarea>
                        </div>

                        <div>
                            <label for="course_chapter" class="form-label">Course Chapter</label>
                            <textarea class="editor" id="course_chapter" name="course_chapter" value="{{ old('course_chapter', $course->course_chapter) }}">{{ old('course_chapter', $course->course_chapter) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Material & Logistics</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            @if($course->material_logistic)
                                <label for="pdf" class="form-label">PDF</label>

                                <div class="row align-items-center">
                                    <div class="col-11">
                                        <input type="file" class="form-control" id="new_material_logistic" name="new_material_logistic" placeholder="PDF" accept=".pdf">
                                        <x-backend.input-error field="new_material_logistic"></x-backend.input-error>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ asset('storage/backend/courses/material-and-logistics/' . $course->material_logistic) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                        <input type="hidden" class="form-control" name="old_material_logistic" value="{{ $course->material_logistic }}">
                                    </div>
                                </div>
                            @else
                                <label for="new_material_logistic" class="form-label">PDF</label>
                                <input type="file" class="form-control" id="new_material_logistic" name="new_material_logistic" placeholder="PDF" accept=".pdf">
                                <x-backend.input-error field="new_material_logistic"></x-backend.input-error>
                            @endif
                        </div>

                        <div>
                            <label for="material_logistic_price" class="form-label">Material & Logistic Price</label>
                            <input type="text" class="form-control" id="material_logistic_price" name="material_logistic_price" value="{{ old('material_logistic_price', $course->material_logistic_price) }}" placeholder="Material & Logistic Price">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Final Exam</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div>
                            <label for="final_exam" class="form-label">Final Exam<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="final_exam" name="final_exam" required>
                                <option value="">Select final exam</option>
                                <option value="Yes" {{ old('final_exam', $course->final_exam) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('final_exam', $course->final_exam) == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$course"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
@endpush