@extends('frontend.layouts.app')

@section('title', 'Show Conference')

@push('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/css/conference.css') }}">
@endpush

@section('content')
<div class="container mt-lg-5 py-lg-5">
    <div class="main-container">

        <x-frontend.notification></x-frontend.notification>

        <section class="container-shadow">
            <div class="event-title-wrapper text-center">
                <div class="title-container">
                    <div class="event-title-container">
                        <h1 class="event-title fs-61">
                            <span>{{ $conference->title }}</span>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-shadow">
            <div class="table-container">
                <img src="{{ asset('storage/frontend/conference-image.svg') }}" alt="Conference Image"
                    class="img-fluid">
            </div>

            <div class="event-info-container">
                <div class="event-info-row d-flex flex-column flex-md-row">
                    <div class="event-info-title fs-25">Date</div>
                    <div class="event-info-value fs-20">{{ $conference->date }}</div>
                </div>
                <div class="event-info-row d-flex flex-column flex-md-row">
                    <div class="event-info-title fs-25">Where</div>
                    <div class="event-info-value fs-20">{{ $conference->where }}</div>
                </div>
                <div class="event-info-row d-flex flex-column flex-md-row">
                    <div class="event-info-title event-info-warning-title fs-25">Early Registration Deadline</div>
                    <div class="event-info-value event-info-warning-value fs-20">{{
                        $conference->early_registration_deadline }}</div>
                </div>

                @if($conference->more_details)
                @foreach(json_decode($conference->more_details) as $more_detail)
                <div class="event-info-row d-flex flex-column flex-md-row">
                    <div class="event-info-title fs-20">{{ $more_detail->title }}</div>
                    <div class="event-info-value fs-16">{{ $more_detail->value }}</div>
                </div>
                @endforeach
                @endif

            </div>
        </section>

        @if($conference->price_details)
        <section class="container-shadow">
            <div class="price-details">
                <h2 class="mb-4 fs-39">Price Details</h2>

                <div class="table-responsive">
                    <table class="price-table table">
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
            </div>
        </section>
        @endif

        <section class="container-shadow">
            <h1 class="get-in-touch-header fs-39">Get in Touch</h1>

            <div class="form-container">
                <form action="{{ route('frontend.contact-us.store') }}" method="POST">
                    @csrf
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <label for="first-name" class="required fs-16 fs-md-13">First Name</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name" class="required fs-16 fs-md-13">Last Name</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <label for="email" class="required fs-16">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="required fs-16">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-row row">
                        <div class="form-group col-md-12 reason-group">
                            <label for="question" class="required fs-16">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                    </div>

                    <div class="form-row row">
                        <div class="form-group col-md-12 comments-group">
                            <label for="comments" class="required fs-16">Comments</label>
                            <textarea class="form-control form-textarea" id="comments" rows="4" name="comments"
                                required></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-submit btn-responsive fs-20">Submit</button>
                    </div>                </form>
            </div>

            <div class="contact-info text-center">
                <div class="contact-info-row row">
                    <div class="info-item col-md-4">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/email.svg') }}" alt="Email Icon">
                        </div>
                        <div class="info-item-content text-truncate">
                            <p class="title fs-20">Email</p>
                            <p class="info fs-16">{{ $settings->email }}</p>
                        </div>
                    </div>
                    <div class="info-item col-md-4">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/phone.svg') }}" alt="Phone Icon">
                        </div>
                        <div class="info-item-content text-truncate">
                            <p class="title fs-20">Phone</p>
                            <p class="info fs-16">{{ $settings->phone }}</p>
                        </div>
                    </div>
                    <div class="info-item col-md-4">
                        <div class="icon-background">
                            <img src="{{ asset('storage/frontend/fax.svg') }}" alt="Fax Icon">
                        </div>
                        <div class="info-item-content text-truncate">
                            <p class="title fs-20">Fax</p>
                            <p class="info fs-16">{{ $settings->fax }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection