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
                        <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                        Return to course
                    </a>

                    <h1 class="course-title">{{ $course->title }} : {{ $course_module->title }} - {{ $course_chapter->title }}</h1>

                    <div class="title">About</div>
                    <div class="content">{!! $course_chapter->about !!}</div>

                    <div class="title">Content</div>
                    <div class="content">{!! $course_chapter->content !!}</div>

                    <div class="title">Guides</div>
                    <div class="content mt-2">
                        <div class="accordion" id="accordionContents">
                            @if($books)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBooks" aria-expanded="false" aria-controls="collapseBooks">
                                            Course Book
                                        </button>
                                    </h2>
                                    <div id="collapseBooks" class="accordion-collapse collapse" data-bs-parent="#accordionContents">
                                        <div class="accordion-body pb-0">
                                            @foreach($books as $book)
                                                <div class="chapter-item">
                                                    <span>{{ $book->title }}</span>
                                                    <a href="{{ asset('storage/backend/courses/course-chapter-books/' . $book->file) }}" download class="btn-download">Download</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($videos)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVideos" aria-expanded="false" aria-controls="collapseVideos">
                                            Course Video
                                        </button>
                                    </h2>
                                    <div id="collapseVideos" class="accordion-collapse collapse" data-bs-parent="#accordionContents">
                                        <div class="accordion-body pb-0">
                                            <div class="row">
                                                @foreach($videos as $video)
                                                    <div class="col-6 mb-3">
                                                        <p class="mb-2">{{ $video->title }}</p>
                                                        <video src="{{ asset('storage/backend/courses/course-chapter-videos/' . $video->file) }}" controls class="video-player"></video>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($video_links)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVideoLinks" aria-expanded="false" aria-controls="collapseVideoLinks">
                                            Video Links
                                        </button>
                                    </h2>
                                    <div id="collapseVideoLinks" class="accordion-collapse collapse" data-bs-parent="#accordionContents">
                                        <div class="accordion-body pb-0">
                                            @foreach($video_links as $video_link)
                                                <div class="link-item">
                                                    <a href="{{ $video_link->link }}" target="_blank">{{ $video_link->title }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="title">Additional Resources</div>
                    <div class="content mt-2">
                        <div class="accordion" id="accordionAdditional">
                            @if($additional_videos)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdditionalVideos" aria-expanded="false" aria-controls="collapseAdditionalVideos">
                                            Additional Videos
                                        </button>
                                    </h2>
                                    <div id="collapseAdditionalVideos" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                        <div class="accordion-body pb-0">
                                            <div class="row">
                                                @foreach($additional_videos as $additional_video)
                                                    <div class="col-6 mb-3">
                                                        <p class="mb-2">{{ $additional_video->title }}</p>
                                                        <video src="{{ asset('storage/backend/courses/course-chapter-additional-videos/' . $additional_video->file) }}" controls class="video-player"></video>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($additional_video_links)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdditionalVideoLinks" aria-expanded="false" aria-controls="collapseAdditionalVideoLinks">
                                            Additional Video Links
                                        </button>
                                    </h2>
                                    <div id="collapseAdditionalVideoLinks" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                        <div class="accordion-body pb-0">
                                            @foreach($additional_video_links as $additional_video_link)
                                                <div class="link-item">
                                                    <a href="{{ $additional_video_link }}" target="_blank">{{ $additional_video_link }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($presentation_medias)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePresentationMedias" aria-expanded="false" aria-controls="collapsePresentationMedias">
                                            Presentation Medias
                                        </button>
                                    </h2>
                                    <div id="collapsePresentationMedias" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                        <div class="accordion-body pb-0">
                                            @foreach($presentation_medias as $presentation_media)
                                                <div class="chapter-item">
                                                    <span>{{ $presentation_media->title }}</span>
                                                    <a href="{{ asset('storage/backend/courses/course-chapter-presentation-medias/' . $presentation_media->file) }}" download class="btn-download">Download</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($downloadable_resources)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDownloadableResources" aria-expanded="false" aria-controls="collapseDownloadableResources">
                                            Downloadable Resources
                                        </button>
                                    </h2>
                                    <div id="collapseDownloadableResources" class="accordion-collapse collapse" data-bs-parent="#accordionAdditional">
                                        <div class="accordion-body pb-0">
                                            @foreach($downloadable_resources as $downloadable_resource)
                                                <div class="chapter-item">
                                                    <span>{{ $downloadable_resource->title }}</span>
                                                    <a href="{{ asset('storage/backend/courses/course-chapter-downloadable-resources/' . $downloadable_resource->file) }}" download class="btn-download">Download</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection