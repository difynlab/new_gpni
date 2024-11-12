@extends('frontend.layouts.app')

@section('title', 'Show Course Chapters')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/course-chapters.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="course-details-container">
                    <a href="{{ route('frontend.courses.show', $course) }}" class="return-link pt-2">
                        <img src="{{ asset('storage/frontend/student/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        Return to course
                    </a>

                    <h1 class="course-title">{{ $course->title }} : {{ $course_module->title }} - {{ $course_chapter->title }}</h1>

                    <div class="title">About</div>
                    <div class="content">{!! $course_chapter->about !!}</div>

                    <div class="title">Content</div>
                    <div class="content">{!! $course_chapter->content !!}</div>

                    <div class="title">Guides</div>
                    <div class="content">

                    </div>

                    <div class="title">Additional Resources</div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection