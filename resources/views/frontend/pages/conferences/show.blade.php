@extends('frontend.layouts.app')

@section('title', 'Show Conference')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/conference.css') }}">
@endpush

@section('content')
    <div class="container mt-5 pt-5">
        <div class="main-container">
            
            <x-frontend.notification></x-frontend.notification>

            <section class="container-shadow">
                <div class="event-title-wrapper">
                    <div class="title-container">
                        <div class="event-title-container">
                            <h1 class="event-title">
                                <span>{{ $conference->title }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container-shadow">
                <div class="table-container">
                    <img src="{{ asset('storage/frontend/conference-image.svg') }}" alt="Conference Image">
                </div>

                <div class="event-info-container">
                    <div class="event-info-row">
                        <div class="event-info-title">Date</div>
                        <div class="event-info-value">{{ $conference->date }}</div>
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title">Where</div>
                        <div class="event-info-value">{{ $conference->where }}</div>
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title event-info-warning-title">Early Registration Deadline</div>
                        <div class="event-info-value event-info-warning-value">{{ $conference->early_registration_deadline }}</div>
                    </div>

                    @if($conference->more_details)
                        @foreach(json_decode($conference->more_details) as $more_detail)
                            <div class="event-info-row">
                                <div class="event-info-title">{{ $more_detail->title }}</div>
                                <div class="event-info-value">{{ $more_detail->value }}</div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </section>

            @if($conference->price_details)
                <section class="container-shadow">
                    <div class="price-details">
                        <h2 class="mb-4">Price Details</h2>

                        <table class="price-table">
                            <thead>
                                <tr>
                                    <th>Member Type</th>
                                    <th>Early Reg. Price</th>
                                    <th>Regular Reg. Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(json_decode($conference->price_details) as $price_detail)
                                    <tr>
                                        <td>{{ $price_detail->member_type }}</td>
                                        <td>{{ $price_detail->early_registration_price }}</td>
                                        <td>{{ $price_detail->regular_registration_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @endif

            <section class="container-shadow">
                <h1 class="get-in-touch-header">Get in Touch</h1>

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
            </section>
        </div> 
    </div>
@endsection