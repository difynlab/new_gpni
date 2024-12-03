@extends('backend.layouts.app')

@section('title', 'Module Exam Result')

@section('content')

    <x-backend.breadcrumb page_name="Module Exam Result"></x-backend.breadcrumb>

    <div class="static-pages">
        <div class="exam-header">
            <div class="exam-title-section">
                <p class="exam-title">Exam Result</p>
                <p class="exam-details">{{ $course->title }}</p>
            </div>
            
            <div class="exam-result">
                <div class="result-item">
                    <p class="result-heading">Total Question</p>
                    <p class="result-value">{{ $course_final_exam->total_questions }}</p>
                </div>

                <div class="result-item">
                    <p class="result-heading">Total Correct Answers</p>
                    <p class="result-value">{{ $course_final_exam->total_correct_answers }}</p>
                </div>

                <div class="result-item">
                    <p class="result-heading">Total un attended  Answers</p>
                    <p class="result-value">{{ $course_final_exam->total_un_attended_answers }}</p>
                </div>

                <div class="result-item">
                    <p class="result-heading">Marks(%)</p>
                    <p class="result-value">{{ $course_final_exam->marks }}</p>
                </div>

                @if($course_final_exam->result == 'Pass')
                    <div class="result-item result-highlight">
                        <p class="result-heading">Result</p>
                        <p class="result-value">PASS</p>
                    </div>
                @else
                    <div class="result-item result-highlight-fail">
                        <p class="result-heading">Result</p>
                        <p class="result-value">FAIL</p>
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
                                Correct Answer!
                            </div>
                        @elseif($question_answer['selected_answer'] && $question_answer['is_correct'] == 'No')
                            <div class="status incorrect">
                                Incorrect Answer! The correct answer is {{ $question_answer['correct_answer'] }}
                            </div>
                        @else
                            <div class="status unattempted">
                                Un attempted Question! The correct answer is {{ $question_answer['correct_answer'] }}
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
    </div>

@endsection