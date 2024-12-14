@extends('frontend.layouts.app')

@section('title', 'Show Course')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-modules.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student" />

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="module-container">
                    <h1 class="module-title">{{ $course->title }}</h1>

                    @if($course_modules->isNotEmpty())
                        @foreach($course_modules as $key => $course_module)
                            @php
                                $all_previous_modules_completed = true;

                                for ($i = 0; $i < $key; $i++) {
                                    $module = $course_modules[$i];
                                    if ($module->module_exam == 'Yes' && hasStudentCompletedModuleExam($student->id, $module->course_id, $module->id)) {
                                        $exam_result = $module->course_module_exam['result'] ?? null;

                                        if ($exam_result !== 'Pass') {
                                            $all_previous_modules_completed = false;
                                            break;
                                        }
                                    } elseif ($module->module_exam == 'Yes' && !hasStudentCompletedModuleExam($student->id, $module->course_id, $module->id)) {
                                        $all_previous_modules_completed = false;
                                        break;
                                    }
                                }
                            @endphp

                            <div class="module module-card {{ $all_previous_modules_completed ? '' : 'disabled-module' }}">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-7 col-12 d-flex align-items-center" style="gap: 10px;">
                                        <h2 class="mb-0">{{ $course_module->title }}</h2>
                                        @if($course_module->module_exam == 'Yes')
                                            @if(hasStudentCompletedModuleExam($student->id, $course_module->course_id, $course_module->id) && $course_module->course_module_exam['result'] == 'Pass')
                                                <span class="completed-badge">{{ $student_dashboard_contents->courses_completed }}</span>
                                            @else
                                                @if($all_previous_modules_completed)
                                                    <span class="in-progress-badge">{{ $student_dashboard_contents->courses_inprogress }}</span>
                                                @else
                                                    <span class="in-pending-badge">{{ $student_dashboard_contents->courses_pending }}</span>
                                                @endif
                                            @endif
                                        @endif
                                    </div>

                                    @if($course_module->module_exam == 'Yes')
                                        <div class="col-md-5 col-12">
                                            @if(hasStudentCompletedModuleExam($student->id, $course_module->course_id, $course_module->id))
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="{{ route('frontend.module-exams.results', [$course, $course_module, $course_module->course_module_exam]) }}" class="results-button text-decoration-none">
                                                            {{ $student_dashboard_contents->courses_view_results }}
                                                        </a>
                                                    </div>

                                                    @if($course_module->course_module_exam['result'] == 'Pass')
                                                        <div class="col-6">
                                                            <button class="exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_module_exam_completed_tooltip }}" data-bs-custom-class="custom-tooltip" disabled>
                                                                {{ $student_dashboard_contents->courses_module_exam_completed }}
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="col-6">
                                                            <a href="{{ route('frontend.module-exams.index', [$course, $course_module]) }}" class="exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_module_take_again_tooltip }}" data-bs-custom-class="custom-tooltip">
                                                                {{ $student_dashboard_contents->courses_module_take_again }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @elseif($all_previous_modules_completed)
                                                <a href="{{ route('frontend.module-exams.index', [$course, $course_module]) }}" class="exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_module_take_module_exam_tooltip }}" data-bs-custom-class="custom-tooltip">
                                                    {{ $student_dashboard_contents->courses_module_take_module_exam }}
                                                </a>
                                            @else
                                                <button class="exam-locked-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_module_exam_locked_tooltip }}" data-bs-custom-class="custom-tooltip" disabled>
                                                    {{ $student_dashboard_contents->courses_module_exam_locked }}
                                                </button>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                @if(count($course_module->chapters) > 0)
                                    @if($all_previous_modules_completed)
                                        <div class="">
                                            @foreach($course_module->chapters as $chapter)
                                                <a href="{{ route('frontend.courses.show-more', ['course' => $course, 'course_module' => $course_module, 'course_chapter' => $chapter]) }}">
                                                    {{ $student_dashboard_contents->courses_module_chapters }}: {{ $chapter->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="disabled">
                                            @foreach($course_module->chapters as $chapter)
                                                <button class="disabled-button" disabled>
                                                    {{ $student_dashboard_contents->courses_module_chapters }}: {{ $chapter->title }}
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
                                        <div class="col-md-6 col-12">
                                            <a href="{{ route('frontend.final-exam.results', [$course, $course->course_final_exam]) }}" class="final-results-button text-decoration-none">
                                                {{ $student_dashboard_contents->courses_view_results }}
                                            </a>
                                        </div>

                                        @if($course->course_final_exam['result'] == 'Pass')
                                            <div class="col-md-6 col-12">
                                                <button class="final-exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_final_exam_completed_tooltip }}" data-bs-custom-class="custom-tooltip" disabled>
                                                    {{ $student_dashboard_contents->courses_final_exam_completed }}
                                                </button>
                                            </div>
                                        @else
                                            <div class="col-6">
                                                <a href="{{ route('frontend.final-exam.index', $course) }}" class="final-exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_final_take_again_tooltip }}" data-bs-custom-class="custom-tooltip">
                                                    {{ $student_dashboard_contents->courses_final_take_again }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <a href="{{ route('frontend.final-exam.index', $course) }}" class="final-exam-button text-decoration-none" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_final_take_final_exam_tooltip }}" data-bs-custom-class="custom-tooltip">
                                        {{ $student_dashboard_contents->courses_final_take_final_exam }}
                                    </a>
                                @endif
                            @else
                                <button class="final-exam-locked-button" data-bs-toggle="tooltip" data-bs-title="{{ $student_dashboard_contents->courses_final_exam_locked_tooltip }}" data-bs-custom-class="custom-tooltip" disabled>
                                    {{ $student_dashboard_contents->courses_final_exam_locked }}
                                </button>
                            @endif
                        @endif
                    @else
                        <p class="no-data">{{ $student_dashboard_contents->courses_no_modules }}</p>
                    @endif

                    <a href="{{ route('frontend.courses.index') }}" class="return-link">
                        <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        {{ $student_dashboard_contents->courses_return }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection