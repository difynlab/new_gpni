@extends('frontend.layouts.app')

@section('title', 'Conference')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/conferences.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <div class="container mt-5 pt-5">
            <h1 class="heading pt-5">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
            <div class="card-container">
                @foreach($conferences as $conference)
                    <div class="conference-card">
                        <div class="text-section">
                            <div class="title"> {{ $conference->title }}</div>
                            <div class="item">
                                <div class="label">Date:</div>
                                <div class="value">{{ $conference->date }}</div>
                            </div>
                            <div class="item">
                                <div class="label">Venue:</div>
                                <div class="value">{{ $conference->where }}</div>
                            </div>
                        </div>
                        <a href="{{ route('frontend.conferences.show', $conference) }}" class="view-more">
                            <span>View More details</span>
                            <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection