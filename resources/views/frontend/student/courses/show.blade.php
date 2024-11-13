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
    
                    @foreach($course_modules as $course_module)
                        <div class="module">
                            <h2>{{ $course_module->title }}</h2>

                            @if(count($course_module->chapters) > 0)
                                <div class="module-card">
                                    @foreach($course_module->chapters as $chapter)
                                        <a href="{{ route('frontend.courses.show-more', ['course' => $course, 'course_module' => $course_module, 'course_chapter' => $chapter]) }}">
                                            Module Chapters: {{ $chapter->title }}
                                            <div class="completed-badge">{{ $course_module->status == 1 ? 'Completed' : 'In Progress' }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <a href="{{ route('frontend.courses.index') }}" class="return-link pt-2">
                        <img src="{{ asset('storage/frontend/student/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        Return to course
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection