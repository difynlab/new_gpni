@extends('backend.layouts.app')

@section('title', 'Create Course Final Exam Question')

@section('content')

    <x-backend.breadcrumb page_name="Create Course Final Exam Question"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.final-exam-questions.store', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Question & Answers <span>({{ $course_language }})</span></p>

                <div class="row form-input">
                    <div class="col-12 ">
                        <div class="mb-4">
                            <label for="question" class="form-label">Question<span class="asterisk">*</span></label>
                            <textarea class="editor" id="question" name="question" value="{{ old('question') }}">{{ old('question') }}</textarea>
                            <x-backend.input-error field="question"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="option_a" class="form-label">Option A<span class="asterisk">*</span></label>
                            <textarea class="editor" id="option_a" name="option_a" value="{{ old('option_a') }}">{{ old('option_a') }}</textarea>
                            <x-backend.input-error field="option_a"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="option_b" class="form-label">Option B<span class="asterisk">*</span></label>
                            <textarea class="editor" id="option_b" name="option_b" value="{{ old('option_b') }}">{{ old('option_b') }}</textarea>
                            <x-backend.input-error field="option_b"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="option_c" class="form-label">Option C<span class="asterisk">*</span></label>
                            <textarea class="editor" id="option_c" name="option_c" value="{{ old('option_c') }}">{{ old('option_c') }}</textarea>
                            <x-backend.input-error field="option_c"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="option_d" class="form-label">Option D<span class="asterisk">*</span></label>
                            <textarea class="editor" id="option_d" name="option_d" value="{{ old('option_d') }}">{{ old('option_d') }}</textarea>
                            <x-backend.input-error field="option_d"></x-backend.input-error>
                        </div>

                        <div>
                            <label for="answer" class="form-label">Answer<span class="asterisk">*</span></label>
                            <select class="form-control form-select" name="answer" required>
                                <option value="">Select answer</option>
                                <option value="A" {{ old('answer') == 'A' ? 'selected' : '' }}>Option A</option>
                                <option value="B" {{ old('answer') == 'B' ? 'selected' : '' }}>Option B</option>
                                <option value="C" {{ old('answer') == 'C' ? 'selected' : '' }}>Option C</option>
                                <option value="D" {{ old('answer') == 'D' ? 'selected' : '' }}>Option D</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection