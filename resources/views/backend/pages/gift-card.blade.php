@extends('backend.layouts.app')

@section('title', 'Gift Card')

@section('content')

    <x-backend.breadcrumb page_name="Gift Card"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.gift-card.update', $language) }}" method="POST" enctype="multipart/form-data">
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

                        <div class="mb-4">
                            <label for="sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="sub_title_{{ $short_code }}" name="sub_title_{{ $short_code }}" value="{{ $contents->{'sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>

                        <div class="mb-4">
                            <label for="description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" id="description_{{ $short_code }}" name="description_{{ $short_code }}" value="{{ $contents->{'description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <x-backend.upload-multi-images image_count="5" old_name="old_images" old_value="{{ $contents->{'images_' . $short_code} ?? '' }}" new_name="new_images[]" path="pages"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_images.*"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Common Words</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="choose_gift_{{ $short_code }}" class="form-label">Choose Gift</label>
                            <input type="text" class="form-control" id="choose_gift_{{ $short_code }}" name="choose_gift_{{ $short_code }}" value="{{ $contents->{'choose_gift_' . $short_code} ?? '' }}" placeholder="Choose Gift">
                        </div>

                        <div class="mb-4">
                            <label for="receiver_name_{{ $short_code }}" class="form-label">Receiver Name</label>
                            <input type="text" class="form-control" id="receiver_name_{{ $short_code }}" name="receiver_name_{{ $short_code }}" value="{{ $contents->{'receiver_name_' . $short_code} ?? '' }}" placeholder="Receiver Name">
                        </div>

                        <div class="mb-4">
                            <label for="receiver_email_{{ $short_code }}" class="form-label">Receiver Email</label>
                            <input type="text" class="form-control" id="receiver_email_{{ $short_code }}" name="receiver_email_{{ $short_code }}" value="{{ $contents->{'receiver_email_' . $short_code} ?? '' }}" placeholder="Receiver Email">
                        </div>

                        <div>
                            <label for="select_amount_{{ $short_code }}" class="form-label">Select Amount</label>
                            <input type="text" class="form-control" id="select_amount_{{ $short_code }}" name="select_amount_{{ $short_code }}" value="{{ $contents->{'select_amount_' . $short_code} ?? '' }}" placeholder="Select Amount">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="custom_{{ $short_code }}" class="form-label">Custom</label>
                            <input type="text" class="form-control" id="custom_{{ $short_code }}" name="custom_{{ $short_code }}" value="{{ $contents->{'custom_' . $short_code} ?? '' }}" placeholder="Custom">
                        </div>

                        <div class="mb-4">
                            <label for="enter_the_amount_{{ $short_code }}" class="form-label">Enter the Amount</label>
                            <input type="text" class="form-control" id="enter_the_amount_{{ $short_code }}" name="enter_the_amount_{{ $short_code }}" value="{{ $contents->{'enter_the_amount_' . $short_code} ?? '' }}" placeholder="Enter the Amount">
                        </div>

                        <div class="mb-4">
                            <label for="message_{{ $short_code }}" class="form-label">Message</label>
                            <input type="text" class="form-control" id="message_{{ $short_code }}" name="message_{{ $short_code }}" value="{{ $contents->{'message_' . $short_code} ?? '' }}" placeholder="Message">
                        </div>

                        <div>
                            <label for="button_{{ $short_code }}" class="form-label">Button</label>
                            <input type="text" class="form-control" id="button_{{ $short_code }}" name="button_{{ $short_code }}" value="{{ $contents->{'button_' . $short_code} ?? '' }}" placeholder="Button">
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


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
@endpush