@extends('frontend.layouts.app')

@section('title', 'Course List')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-lists.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="course-container">
                    <div class="course-header">
                        <h1>{{ $student_dashboard_contents->courses_title }}</h1>
                    </div>

                    @if($courses->isNotEmpty())
                        @foreach($courses as $course)
                            <div class="course-card">
                                <img src="{{ asset('storage/backend/courses/course-images/' . $course->image) }}" alt="Course image" class="course-image">

                                <div class="course-info">
                                    <h2>{{ $course->title }}</h2>

                                    <p>
                                    {{ $student_dashboard_contents->courses_started }}: {{ $course->date }} | {{ $student_dashboard_contents->courses_completed }}: {{ $course->completion_date ?? $student_dashboard_contents->courses_not_yet }}
                                        
                                        @if(hasStudentCompletedFinalExam($student->id, $course->id))
                                            <span class="badge-completed">{{ $student_dashboard_contents->courses_completed }}</span>
                                        @else
                                            <span class="badge-in-progress">{{ $student_dashboard_contents->courses_inprogress }}</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="course-actions">
                                    <a href="{{ route('frontend.courses.show', $course) }}">
                                        {{ $student_dashboard_contents->courses_view_details }}
                                        <img src="{{ asset('storage/frontend/arrow-icon.svg') }}" alt="Arrow">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="no-data">{{ $student_dashboard_contents->courses_no_courses }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection