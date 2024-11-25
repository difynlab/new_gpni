
@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/contact-us.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <main class="container my-5">

            <x-frontend.notification></x-frontend.notification>

            <h1 class="header-title">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>

            <p class="description">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</p>

            <div class="form-container">
                <form action="{{ route('frontend.contact-us.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first-name" class="required">First Name</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name" class="required">Last Name</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" class="required">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="required">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 reason-group">
                            <label for="question" class="required">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 comments-group">
                            <label for="comments" class="required">Comments</label>
                            <textarea class="form-control form-textarea" id="comments" rows="4" name="comments" required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </form>
            </div>

            <div class="contact-info">
                <div class="contact-info-row">
                    <div class="info-item">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/email.svg') }}" alt="Email Icon">
                        </div>
                        <div class="info-item-content">
                            <p class="title">Email</p>
                            <p class="info">{{ $settings->email }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/phone.svg') }}" alt="Phone Icon">
                        </div>
                        <div class="info-item-content">
                            <p class="title">Phone</p>
                            <p class="info">{{ $settings->phone }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/fax.svg') }}" alt="Fax Icon">
                        </div>
                        <div class="info-item-content">
                            <p class="title">Fax</p>
                            <p class="info">{{ $settings->fax }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif

@endsection