@extends('frontend.layouts.app')

@section('title', 'Show Course')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-modules.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="module-container">
                    <h1 class="module-title">{{ $course->title }}</h1>

                    @foreach($course_modules as $key => $course_module)
                        <div class="module">
                            <div class="row mb-3 align-items-center">
                                <div class="col-8">
                                    <h2>{{ $course_module->title }}</h2>
                                    @if($course_module->module_exam == 'Yes')
                                        @if(hasStudentCompletedModuleExam($student->id, $course_module->course_id, $course_module->id))
                                            <span class="completed-badge">Completed</span>
                                        @else
                                            <span class="in-progress-badge">In Progress</span>
                                        @endif
                                    @endif
                                </div>

                                @php
                                    $all_previous_modules_completed = true;

                                    for($i = 0; $i < $key; $i++) {
                                        if(
                                            $course_modules[$i]->module_exam == 'Yes' &&
                                            !hasStudentCompletedModuleExam($student->id, $course_modules[$i]->course_id, $course_modules[$i]->id)
                                        ) {
                                            $all_previous_modules_completed = false;
                                            break;
                                        }
                                    }
                                @endphp

                                @if($course_module->module_exam == 'Yes')
                                    <div class="col-4">
                                        @if(hasStudentCompletedModuleExam($student->id, $course_module->course_id, $course_module->id))
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ route('frontend.module-exams.results', [$course, $course_module, $course_module->course_module_exam]) }}" class="results-button text-decoration-none">View Results</a>
                                                </div>

                                                @if($course_module->course_module_exam['result'] == 'Pass')
                                                    <div class="col-6">
                                                        <button class="exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="You already passed this module exam" data-bs-custom-class="custom-tooltip" disabled>Exam Completed</button>
                                                    </div>
                                                @else
                                                    <div class="col-6">
                                                        <a href="{{ route('frontend.module-exams.index', [$course, $course_module]) }}" class="exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="You can proceed to the next module only after passing this test exam" data-bs-custom-class="custom-tooltip">Take Again</a>
                                                    </div>
                                                @endif
                                            </div>
                                        @elseif($all_previous_modules_completed)
                                            <a href="{{ route('frontend.module-exams.index', [$course, $course_module]) }}" class="exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="You can proceed to the next module only after passing this test exam" data-bs-custom-class="custom-tooltip">Take Module Exam</a>
                                        @else
                                            <button class="exam-locked-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="You must complete all previous module exams first" data-bs-custom-class="custom-tooltip" disabled>Exam Locked</button>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            @if(count($course_module->chapters) > 0)
                                @if($all_previous_modules_completed)
                                    <div class="module-card">
                                        @foreach($course_module->chapters as $chapter)
                                            <a href="{{ route('frontend.courses.show-more', ['course' => $course, 'course_module' => $course_module, 'course_chapter' => $chapter]) }}">
                                                Module Chapters: {{ $chapter->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="module-card disabled">
                                        @foreach($course_module->chapters as $chapter)
                                            <button class="disabled-button" disabled>
                                                Module Chapters: {{ $chapter->title }}
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endforeach

                    @if($course->final_exam == 'Yes')
                        @if(hasStudentCompletedAllModuleExams($student->id, $course->id))
                            @if(hasStudentCompletedFinalExam($student->id, $course->id))
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('frontend.final-exam.results', [$course, $course->course_final_exam]) }}" class="final-results-button text-decoration-none">View Results</a>
                                    </div>

                                    @if($course->course_final_exam['result'] == 'Pass')
                                        <div class="col-6">
                                            <button class="final-exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="You already passed this final exam" data-bs-custom-class="custom-tooltip" disabled>Exam Completed</button>
                                        </div>
                                    @else
                                        <div class="col-6">
                                            <a href="{{ route('frontend.final-exam.index', $course) }}" class="final-exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="Take the final exam to obtain the certificate" data-bs-custom-class="custom-tooltip">Take Final Exam Again</a>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <a href="{{ route('frontend.final-exam.index', $course) }}" class="final-exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="Take the final exam to obtain the certificate" data-bs-custom-class="custom-tooltip">Take Final Exam</a>
                            @endif
                        @else
                            <button class="final-exam-button" data-bs-toggle="tooltip" data-bs-title="You must complete all the module exams" data-bs-custom-class="custom-tooltip" disabled>Final Exam Locked</button>
                        @endif
                    @endif

                    <a href="{{ route('frontend.courses.index') }}" class="return-link">
                        <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        Return to course
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection