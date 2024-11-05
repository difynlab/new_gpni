
@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/contact-us.css') }}">
@endpush

@section('content')

    <main class="container my-5">
        <!-- First Title -->
        <h1 class="header-title">{{ $title }}</h1>
        <!-- Description Text -->
        <p class="description">{{ $description }}</p>

        <div class="form-container">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName" class="required">{{ $form_labels['first_name'] }}</label>
                        <input type="text" class="form-control" id="firstName">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName" class="required">{{ $form_labels['last_name'] }}</label>
                        <input type="text" class="form-control" id="lastName">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email" class="required">{{ $form_labels['email'] }}</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phoneNumber" class="required">{{ $form_labels['phone'] }}</label>
                        <input type="tel" class="form-control" id="phoneNumber">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 reason-group">
                        <label for="reason" class="required">{{ $form_labels['reason'] }}</label>
                        <input type="text" class="form-control" id="reason">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 comments-group">
                        <label for="comments" class="required">{{ $form_labels['comments'] }}</label>
                        <textarea class="form-control form-textarea" id="comments" rows="4"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">{{ $form_labels['submit'] }}</button>
            </form>
        </div>

        <div class="contact-info">
            <div class="contact-info-row">
                <div class="info-item">
                    <div class="icon-background">
                        <img src="storage/frontend/mdi-email-outline.svg" alt="Email Icon">
                    </div>
                    <div class="info-item-content">
                        <p class="title">Email</p>
                        <p class="info">{{ $contact_info['email'] }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon-background">
                        <img src="storage/frontend/solar-phone-linear.svg" alt="Phone Icon">
                    </div>
                    <div class="info-item-content">
                        <p class="title">Phone</p>
                        <p class="info">{{ $contact_info['phone'] }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon-background">
                        <img src="storage/frontend/la-fax.svg" alt="Fax Icon">
                    </div>
                    <div class="info-item-content">
                        <p class="title">Fax</p>
                        <p class="info">{{ $contact_info['fax'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection