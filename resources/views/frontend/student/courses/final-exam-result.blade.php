@extends('frontend.layouts.app')

@section('title', 'Final Exam Result')

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
                <p class="exam-details fs-20">{{ $course->title }}</p>
            </div>

            <a href="{{ route('frontend.courses.show', $course) }}" class="return fs-20">
                <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                {{ $student_dashboard_contents->courses_return }}
            </a>
        </div>
        
        <div class="exam-result">
            <div class="result-item">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_total_questions }}</div>
                <div class="result-value">{{ $course_final_exam->total_questions }}</div>
            </div>

            <div class="result-item">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_total_correct_answers }}</div>
                <div class="result-value">{{ $course_final_exam->total_correct_answers }}</div>
            </div>

            <div class="result-item">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_total_unattended_answers }}</div>
                <div class="result-value">{{ $course_final_exam->total_un_attended_answers }}</div>
            </div>

            <div class="result-item">
                <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_marks }}</div>
                <div class="result-value">{{ $course_final_exam->marks }}</div>
            </div>

            @if($course_final_exam->result == 'Pass')
                <div class="result-item result-highlight">
                    <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_result }}</div>
                    <div class="result-value">{{ $student_dashboard_contents->courses_exam_result_pass }}</div>
                </div>
            @else
                <div class="result-item result-highlight-fail">
                    <div class="result-heading">{{ $student_dashboard_contents->courses_exam_result_result }}</div>
                    <div class="result-value">{{ $student_dashboard_contents->courses_exam_result_fail }}</div>
                </div>
            @endif
        </div>
    </div>

    <div class="question-answer">
        @foreach($questions_answers as $key => $question_answer)
            <div class="question-card">
                <div class="info">
                    <div class="question mb-2">
                        <p>Q{{ $key + 1}}.</p>
                        <div>{!! $question_answer['question'] !!}</div>
                    </div>

                    @if($question_answer['selected_answer'] && $question_answer['is_correct'] == 'Yes')
                        <div class="status correct">
                            <img src="https://placeholder.pics/svg/20x20" alt="Correct Icon">
                            {{ $student_dashboard_contents->courses_exam_result_correct_answer }}
                        </div>
                    @elseif($question_answer['selected_answer'] && $question_answer['is_correct'] == 'No')
                        <div class="status incorrect">
                            <img src="https://placeholder.pics/svg/20x20" alt="Correct Icon">
                            {{ $student_dashboard_contents->courses_exam_result_incorrect_answer }} {{ $question_answer['correct_answer'] }}.
                        </div>
                    @else
                        <div class="status unattempted">
                            <img src="https://placeholder.pics/svg/20x20" alt="Correct Icon">
                            {{ $student_dashboard_contents->courses_exam_result_un_attempted }} {{ $question_answer['correct_answer'] }}.
                        </div>
                    @endif

                    <div class="answers">
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'A' ? 'checked' : ''}}>
                            <label class="form-check-label">
                                A) {!! $question_answer['options']['A'] !!}
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'B' ? 'checked' : ''}}>
                            <label class="form-check-label">
                                B) {!! $question_answer['options']['B'] !!}
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'C' ? 'checked' : ''}}>
                            <label class="form-check-label">
                                C) {!! $question_answer['options']['C'] !!}
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="radio" {{ $question_answer['selected_answer'] == 'D' ? 'checked' : ''}}>
                            <label class="form-check-label">
                                D) {!! $question_answer['options']['D'] !!}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection