@extends('frontend.layouts.app')

@section('title', 'Module Exam Result')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-exam-result.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="exam-header">
        <div class="exam-title-section">
            <div>
                <p class="exam-title fs-39">{{ $student_dashboard_contents->courses_exam_result_title }}</p>
                <p class="exam-details fs-20">{{ $course->title }} | {{ $course_module->title }}</p>
            </div>

            <a href="{{ route('frontend.courses.show', $course) }}" class="return fs-20">
                <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                {{ $student_dashboard_contents->courses_return }}
            </a>
        </div>
        
        <div class="exam-result d-flex flex-wrap justify-content-between align-items-center">
            <div class="result-item flex-fill p-2">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_total_questions }}</div>
                <div class="result-value">{{ $course_module_exam->total_questions }}</div>
            </div>
        
            <div class="result-item flex-fill p-2">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_total_correct_answers }}</div>
                <div class="result-value">{{ $course_module_exam->total_correct_answers }}</div>
            </div>
        
            <div class="result-item flex-fill p-2">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_total_unattended_answers }}</div>
                <div class="result-value">{{ $course_module_exam->total_un_attended_answers }}</div>
            </div>
        
            <div class="result-item flex-fill p-2">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_marks }}</div>
                <div class="result-value">{{ $course_module_exam->marks }}</div>
            </div>
        
            @if($course_module_exam->result == 'Pass')
                <div class="result-item result-highlight flex-fill text-center p-2">
                    <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_result }}</div>
                    <div class="result-value">{{ $student_dashboard_contents->courses_exam_result_pass }}</div>
                </div>
            @else
                <div class="result-item result-highlight-fail flex-fill text-center p-2">
                    <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_result }}</div>
                    <div class="result-value">{{ $student_dashboard_contents->courses_exam_result_fail }}</div>
                </div>
            @endif
        </div>
    </div>

    <div class="question-answer">
        @foreach($questions_answers as $key => $question_answer)
            <div class="question-card">
                <div class="info p-3 p-md-4">
                    <div class="question mb-2">
                        <p class="me-2">Q{{ $key + 1}}.</p>
                        <div class="flex-grow-1">{!! $question_answer['question'] !!}</div>
                    </div>
    
                    @if($question_answer['selected_answer'] && $question_answer['is_correct'] == 'Yes')
                        <div class="status correct w-100 w-md-75 w-lg-50">
                            <img src="https://placeholder.pics/svg/20x20" alt="Correct Icon" class="me-2">
                            <span>{{ $student_dashboard_contents->courses_exam_result_correct_answer }}</span>
                        </div>
                    @elseif($question_answer['selected_answer'] && $question_answer['is_correct'] == 'No')
                        <div class="status incorrect w-100 w-md-75 w-lg-50">
                            <img src="https://placeholder.pics/svg/20x20" alt="Correct Icon" class="me-2">
                            <span>{{ $student_dashboard_contents->courses_exam_result_incorrect_answer }} {{ $question_answer['correct_answer'] }}.</span>
                        </div>
                    @else
                        <div class="status unattempted w-100 w-md-75 w-lg-50">
                            <img src="https://placeholder.pics/svg/20x20" alt="Correct Icon" class="me-2">
                            <span>{{ $student_dashboard_contents->courses_exam_result_un_attempted }} {{ $question_answer['correct_answer'] }}.</span>
                        </div>
                    @endif
    
                    <div class="answers">
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'A' ? 'checked' : ''}} disabled>
                            <label class="form-check-label flex-wrap {{ $question_answer['selected_answer'] == 'A' ? 'selected' : 'disabled' }}">
                                <span class="me-2">A)</span> <span>{!! $question_answer['options']['A'] !!}</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'B' ? 'checked' : ''}} disabled>
                            <label class="form-check-label flex-wrap {{ $question_answer['selected_answer'] == 'B' ? 'selected' : 'disabled' }}">
                                <span class="me-2">B)</span> <span>{!! $question_answer['options']['B'] !!}</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'C' ? 'checked' : ''}} disabled>
                            <label class="form-check-label flex-wrap {{ $question_answer['selected_answer'] == 'C' ? 'selected' : 'disabled' }}">
                                <span class="me-2">C)</span> <span>{!! $question_answer['options']['C'] !!}</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'D' ? 'checked' : ''}} disabled>
                            <label class="form-check-label flex-wrap {{ $question_answer['selected_answer'] == 'D' ? 'selected' : 'disabled' }}">
                                <span class="me-2">D)</span> <span>{!! $question_answer['options']['D'] !!}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection