@extends('frontend.layouts.app')

@section('title', $contents->{'single_conference_page_name_' . $middleware_language} ?? $contents->single_conference_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/conference.css') }}">
@endpush

@section('content')
    <div class="container mt-lg-5 py-lg-5">
        <div class="main-container">
            <x-frontend.notification></x-frontend.notification>

            <section class="container-shadow">
                <a href="{{ route('frontend.conferences.index') }}" class="return-link">
                    <img src="{{ asset('storage/frontend/left-chevron-icon.svg') }}" alt="Arrow Left" width="20" height="20">
                    {{ $contents->{'back_' . $middleware_language} ?? $contents->back_en }}
                </a>

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
                    <img src="{{ asset('storage/frontend/conference-image.svg') }}" alt="Conference Image" class="img-fluid">
                </div>

                <div class="event-info-container">
                    <div class="event-info-row d-flex flex-column flex-md-row">
                        <div class="event-info-title fs-25">{{ $contents->{'date_' . $middleware_language} ?? $contents->date_en }}</div>
                        <div class="event-info-value fs-20">{{ $conference->date }}</div>
                    </div>
                    <div class="event-info-row d-flex flex-column flex-md-row">
                        <div class="event-info-title fs-25">{{ $contents->{'where_' . $middleware_language} ?? $contents->where_en }}</div>
                        <div class="event-info-value fs-20">{{ $conference->where }}</div>
                    </div>
                    <div class="event-info-row d-flex flex-column flex-md-row">
                        <div class="event-info-title event-info-warning-title fs-25">{{ $contents->{'early_registration_deadline_' . $middleware_language} ?? $contents->early_registration_deadline_en }}</div>
                        <div class="event-info-value event-info-warning-value fs-20">{{ $conference->early_registration_deadline }}</div>
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
                        <h2 class="mb-4 fs-39">{{ $contents->{'price_details_' . $middleware_language} ?? $contents->price_details_en }}</h2>

                        <div class="table-responsive">
                            <table class="price-table table">
                                <thead>
                                    <tr>
                                        <th>{{ $contents->{'member_type_' . $middleware_language} ?? $contents->member_type_en }}</th>
                                        <th>{{ $contents->{'early_registration_price_' . $middleware_language} ?? $contents->early_registration_price_en }}</th>
                                        <th>{{ $contents->{'regular_registration_price_' . $middleware_language} ?? $contents->regular_registration_price_en }}</th>
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
                <h1 class="get-in-touch-header fs-39">{{ $contents->{'get_in_touch_' . $middleware_language} ?? $contents->get_in_touch_en }}</h1>

                <div class="form-container">
                    <form action="{{ route('frontend.contact-us.store') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="first-name" class="required fs-16 fs-md-13">{{ $contents->{'first_name_' . $middleware_language} ?? $contents->first_name_en }}</label>
                                <input type="text" class="form-control" id="first-name" name="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last-name" class="required fs-16 fs-md-13">{{ $contents->{'last_name_' . $middleware_language} ?? $contents->last_name_en }}</label>
                                <input type="text" class="form-control" id="last-name" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="form-group col-md-6">
                                <label for="email" class="required fs-16">{{ $contents->{'email_' . $middleware_language} ?? $contents->email_en }}</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="required fs-16">{{ $contents->{'phone_' . $middleware_language} ?? $contents->phone_en }}</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="form-group col-md-12 reason-group">
                                <label for="question" class="required fs-16">{{ $contents->{'question_' . $middleware_language} ?? $contents->question_en }}</label>
                                <input type="text" class="form-control" id="question" name="question" required>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="form-group col-md-12 comments-group">
                                <label for="comments" class="required fs-16">{{ $contents->{'comments_' . $middleware_language} ?? $contents->comments_en }}</label>
                                <textarea class="form-control form-textarea" id="comments" rows="4" name="comments" required></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-submit btn-responsive fs-20">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                        </div>
                    </form>
                </div>

                <div class="contact-info text-center">
                    <div class="contact-info-row row">
                        <div class="info-item col-md-4">
                            <div class="icon-background">
                                <img src="{{ asset('storage/frontend/email.svg') }}" alt="Email Icon">
                            </div>
                            <div class="info-item-content text-truncate">
                                <p class="title fs-20">{{ $contents->{'contact_email_' . $middleware_language} ?? $contents->contact_email_en }}</p>
                                <p class="info fs-16">{{ $settings->email }}</p>
                            </div>
                        </div>
                        <div class="info-item col-md-4">
                            <div class="icon-background">
                                <img src="{{ asset('storage/frontend/phone.svg') }}" alt="Phone Icon">
                            </div>
                            <div class="info-item-content text-truncate">
                                <p class="title fs-20">{{ $contents->{'contact_phone_' . $middleware_language} ?? $contents->contact_phone_en }}</p>
                                <p class="info fs-16">{{ $settings->phone }}</p>
                            </div>
                        </div>
                        <div class="info-item col-md-4">
                            <div class="icon-background">
                                <img src="{{ asset('storage/frontend/fax.svg') }}" alt="Fax Icon">
                            </div>
                            <div class="info-item-content text-truncate">
                                <p class="title fs-20">{{ $contents->{'contact_fax_' . $middleware_language} ?? $contents->contact_fax_en }}</p>
                                <p class="info fs-16">{{ $settings->fax }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection