@extends('frontend.layouts.app')

@section('title', 'Conference')

@push('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/css/conferences.css') }}">
@endpush

@section('content')

@if($contents->title_en)
<div class="container mt-5 pt-lg-5 pt-0">
    <h1 class="heading py-lg-5 my-5">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
    <div class="row card-container">
        @if($conferences->isNotEmpty())
        @foreach($conferences as $conference)
        <div class="col-12 col-md-6 mb-4">
            <div class="conference-card">
                <div class="text-section">
                    <div class="title fs-20 line-clamp-2">{{ $conference->title }}</div>
                    <div class="item">
                        <div class="label fs-16">Date:</div>
                        <div class="value fs-16">{{ $conference->date }}</div>
                    </div>
                    <div class="item">
                        <div class="label fs-16">Venue:</div>
                        <div class="value fs-16 text-truncate">{{ $conference->where }}</div>
                    </div>
                </div>
                <a href="{{ route('frontend.conferences.show', $conference) }}" class="view-more fs-16">
                    <span>View More details</span>
                    <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon">
                </a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endif

@endsection