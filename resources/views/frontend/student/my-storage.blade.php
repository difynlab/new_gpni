@extends('frontend.layouts.app')

@section('title', 'My Storage')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-storage-corner.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="header">My Storage</div>
                    </div>
                    
                    <ul class="nav nav-pills justify-content-evenly mb-4" id="pills-tab" role="tablist">
                        @php
                            $media_types = ['All', 'Image', 'Video', 'Vimeo Video Link', 'PDF', 'Word', 'Excel', 'PPT', 'Audio'];
                        @endphp

                        @foreach($media_types as $media_type)
                            <li class="nav-item">
                                <a class="nav-link {{ $type == $media_type ? 'active' : '' }}" href="{{ route('frontend.my-storage', ['type' => $media_type]) }}" role="tab">
                                    {{ $media_type }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" role="tabpanel" tabindex="0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Media</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($medias->isNotEmpty())
                                        @foreach($medias as $media)
                                            <tr>
                                                <td>{{ $media->id }}</td>
                                                <td>
                                                    {{ $media->name }}
                                                </td>
                                                <td>
                                                    @if($media->type == 'Image')
                                                        <img src="{{ asset('storage/backend/medias/' . $media->image) }}" alt="{{ $media->name }}" style="width: 300px; height: 170px; object-fit: cover;">
                                                    @elseif($media->type == 'Video')
                                                        <video class="video-player" src="{{ asset('storage/backend/medias/' . $media->video) }}" controls style="width: 300px; height: 170px; object-fit: cover;"></video>
                                                    @elseif($media->type == 'Vimeo Video Link')
                                                        <a class="text-decoration-none" href="{{ $media->vimeo_video_link }}" target="_blank">Watch on Vimeo</a>
                                                    @elseif($media->type == 'PDF')
                                                        <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->pdf) }}" target="_blank">Download</a>
                                                    @elseif($media->type == 'Word')
                                                        <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->word) }}" target="_blank">Download</a>
                                                    @elseif($media->type == 'Excel')
                                                        <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->excel) }}" target="_blank">Download</a>
                                                    @elseif($media->type == 'PPT')
                                                        <a class="text-decoration-none" href="{{ asset('storage/backend/medias/' . $media->ppt) }}" target="_blank">Download</a>
                                                    @elseif($media->type == 'Audio')
                                                        <audio src="{{ asset('storage/backend/medias/' . $media->audio) }}" type="audio/mpeg" controls></audio>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            {{ $medias->appends(['type' => $type])->links("pagination::bootstrap-5") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection