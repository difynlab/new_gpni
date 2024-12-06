@extends('backend.layouts.app')

@section('title', 'Contact Us')

@section('content')

    <x-backend.breadcrumb page_name="Contact Us"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.contact-us.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" id="description_{{ $short_code }}" name="description_{{ $short_code }}" value="{{ $contents->{'description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Common Words</p>

                <div class="row form-input">
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

                        <div>
                            <label for="question_{{ $short_code }}" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question_{{ $short_code }}" name="question_{{ $short_code }}" value="{{ $contents->{'question_' . $short_code} ?? '' }}" placeholder="Question">
                        </div>
                    </div>

                    <div class="col-6">
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