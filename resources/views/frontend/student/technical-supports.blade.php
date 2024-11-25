
@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/technical-supports.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">
                    <x-frontend.notification></x-frontend.notification>

                    <div class="header-section">
                        <h1>Technical Supports</h1>
                    </div>

                    <form action="{{ route('frontend.technical-supports.store') }}" method="POST">
                        @csrf
                        <div class="row mb-5">
                            <div class="col-12 mb-4">
                                <label for="subject" class="form-label">Subject<span class="asterisk">*</span></label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label">Message<span class="asterisk">*</span></label>
                                <textarea class="form-control form-textarea" id="message" rows="5" name="message" required></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection