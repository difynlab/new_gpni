@extends('backend.layouts.app')

@section('title', 'Conference')

@section('content')

    <x-backend.breadcrumb page_name="Conference"></x-backend.breadcrumb>

    <div class="static-pages">
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.conference.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                        </div>
                        
                        <div>
                            <label for="single_conference_page_name_{{ $short_code }}" class="form-label">Single Page Name</label>
                            <input type="text" class="form-control" id="single_conference_page_name_{{ $short_code }}" name="single_conference_page_name_{{ $short_code }}" value="{{ $contents->{'single_conference_page_name_' . $short_code} ?? '' }}" placeholder="Single Page Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div>
                            <label for="title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Common Words</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="date_{{ $short_code }}" class="form-label">Date</label>
                            <input type="text" class="form-control" id="date_{{ $short_code }}" name="date_{{ $short_code }}" value="{{ $contents->{'date_' . $short_code} ?? '' }}" placeholder="Date">
                        </div>

                        <div class="mb-4">
                            <label for="venue_{{ $short_code }}" class="form-label">Venue</label>
                            <input type="text" class="form-control" id="venue_{{ $short_code }}" name="venue_{{ $short_code }}" value="{{ $contents->{'venue_' . $short_code} ?? '' }}" placeholder="Venue">
                        </div>

                        <div class="mb-4">
                            <label for="view_{{ $short_code }}" class="form-label">View</label>
                            <input type="text" class="form-control" id="view_{{ $short_code }}" name="view_{{ $short_code }}" value="{{ $contents->{'view_' . $short_code} ?? '' }}" placeholder="View">
                        </div>

                        <div class="mb-4">
                            <label for="back_{{ $short_code }}" class="form-label">Back</label>
                            <input type="text" class="form-control" id="back_{{ $short_code }}" name="back_{{ $short_code }}" value="{{ $contents->{'back_' . $short_code} ?? '' }}" placeholder="Back">
                        </div>

                        <div class="mb-4">
                            <label for="where_{{ $short_code }}" class="form-label">Where</label>
                            <input type="text" class="form-control" id="where_{{ $short_code }}" name="where_{{ $short_code }}" value="{{ $contents->{'where_' . $short_code} ?? '' }}" placeholder="Where">
                        </div>

                        <div class="mb-4">
                            <label for="early_registration_deadline_{{ $short_code }}" class="form-label">Early Registration Deadline</label>
                            <input type="text" class="form-control" id="early_registration_deadline_{{ $short_code }}" name="early_registration_deadline_{{ $short_code }}" value="{{ $contents->{'early_registration_deadline_' . $short_code} ?? '' }}" placeholder="Early Registration Deadline">
                        </div>

                        <div class="mb-4">
                            <label for="price_details_{{ $short_code }}" class="form-label">Price Details</label>
                            <input type="text" class="form-control" id="price_details_{{ $short_code }}" name="price_details_{{ $short_code }}" value="{{ $contents->{'price_details_' . $short_code} ?? '' }}" placeholder="Price Details">
                        </div>

                        <div class="mb-4">
                            <label for="member_type_{{ $short_code }}" class="form-label">Member Type</label>
                            <input type="text" class="form-control" id="member_type_{{ $short_code }}" name="member_type_{{ $short_code }}" value="{{ $contents->{'member_type_' . $short_code} ?? '' }}" placeholder="Member Type">
                        </div>

                        <div class="mb-4">
                            <label for="early_registration_price_{{ $short_code }}" class="form-label">Early Registration Price</label>
                            <input type="text" class="form-control" id="early_registration_price_{{ $short_code }}" name="early_registration_price_{{ $short_code }}" value="{{ $contents->{'early_registration_price_' . $short_code} ?? '' }}" placeholder="Early Registration Price">
                        </div>

                        <div class="mb-4">
                            <label for="regular_registration_price_{{ $short_code }}" class="form-label">Regular Registration Price</label>
                            <input type="text" class="form-control" id="regular_registration_price_{{ $short_code }}" name="regular_registration_price_{{ $short_code }}" value="{{ $contents->{'regular_registration_price_' . $short_code} ?? '' }}" placeholder="Regular Registration Price">
                        </div>

                        <div>
                            <label for="get_in_touch_{{ $short_code }}" class="form-label">Get in Touch</label>
                            <input type="text" class="form-control" id="get_in_touch_{{ $short_code }}" name="get_in_touch_{{ $short_code }}" value="{{ $contents->{'get_in_touch_' . $short_code} ?? '' }}" placeholder="Get in Touch">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="first_name_{{ $short_code }}" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name_{{ $short_code }}" name="first_name_{{ $short_code }}" value="{{ $contents->{'first_name_' . $short_code} ?? '' }}" placeholder="First Name">
                        </div>

                        <div class="mb-4">
                            <label for="last_name_{{ $short_code }}" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name_{{ $short_code }}" name="last_name_{{ $short_code }}" value="{{ $contents->{'last_name_' . $short_code} ?? '' }}" placeholder="Last Name">
                        </div>

                        <div class="mb-4">
                            <label for="email_{{ $short_code }}" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email_{{ $short_code }}" name="email_{{ $short_code }}" value="{{ $contents->{'email_' . $short_code} ?? '' }}" placeholder="Email">
                        </div>

                        <div class="mb-4">
                            <label for="phone_{{ $short_code }}" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone_{{ $short_code }}" name="phone_{{ $short_code }}" value="{{ $contents->{'phone_' . $short_code} ?? '' }}" placeholder="Phone">
                        </div>

                        <div class="mb-4">
                            <label for="question_{{ $short_code }}" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question_{{ $short_code }}" name="question_{{ $short_code }}" value="{{ $contents->{'question_' . $short_code} ?? '' }}" placeholder="Question">
                        </div>

                        <div class="mb-4">
                            <label for="comments_{{ $short_code }}" class="form-label">Comments</label>
                            <input type="text" class="form-control" id="comments_{{ $short_code }}" name="comments_{{ $short_code }}" value="{{ $contents->{'comments_' . $short_code} ?? '' }}" placeholder="Comments">
                        </div>

                        <div class="mb-4">
                            <label for="button_{{ $short_code }}" class="form-label">Button</label>
                            <input type="text" class="form-control" id="button_{{ $short_code }}" name="button_{{ $short_code }}" value="{{ $contents->{'button_' . $short_code} ?? '' }}" placeholder="Button">
                        </div>

                        <div class="mb-4">
                            <label for="contact_email_{{ $short_code }}" class="form-label">Contact Email</label>
                            <input type="text" class="form-control" id="contact_email_{{ $short_code }}" name="contact_email_{{ $short_code }}" value="{{ $contents->{'contact_email_' . $short_code} ?? '' }}" placeholder="Contact Email">
                        </div>

                        <div class="mb-4">
                            <label for="contact_phone_{{ $short_code }}" class="form-label">Contact Phone</label>
                            <input type="text" class="form-control" id="contact_phone_{{ $short_code }}" name="contact_phone_{{ $short_code }}" value="{{ $contents->{'contact_phone_' . $short_code} ?? '' }}" placeholder="Contact Phone">
                        </div>

                        <div>
                            <label for="contact_fax_{{ $short_code }}" class="form-label">Contact Fax</label>
                            <input type="text" class="form-control" id="contact_fax_{{ $short_code }}" name="contact_fax_{{ $short_code }}" value="{{ $contents->{'contact_fax_' . $short_code} ?? '' }}" placeholder="Contact Fax">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection