@extends('frontend.layouts.app')

@section('title', 'Buy Study Material')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/buy-study-materials.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">
                    <x-frontend.notification></x-frontend.notification>

                    <div class="header-section">
                        <h1>Material & Logistics</h1>
                    </div>

                    <form action="{{ route('frontend.buy-study-materials.checkout') }}" method="POST">
                        @csrf
                        <div class="mb-4 text-left">
                            <label for="course" class="form-label">Select your course</label>
                            <select class="form-control form-select custom-select" name="course_id" required>
                                <option value="">Choose your course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-pay-now">Pay Now</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection