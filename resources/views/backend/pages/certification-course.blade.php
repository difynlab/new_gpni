@extends('backend.layouts.app')

@section('title', 'Certification Course')

@section('content')

    <x-backend.breadcrumb page_name="Certification Course"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.certification-course.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-4">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-4">
                        <label for="single_page_name_{{ $short_code }}" class="form-label">Single Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="single_page_name_{{ $short_code }}" name="single_page_name_{{ $short_code }}" value="{{ $contents->{'single_page_name_' . $short_code} ?? '' }}" placeholder="Single Page Name" required>
                    </div>

                    <div class="col-4">
                        <label for="payment_page_name_{{ $short_code }}" class="form-label">Payment Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="payment_page_name_{{ $short_code }}" name="payment_page_name_{{ $short_code }}" value="{{ $contents->{'payment_page_name_' . $short_code} ?? '' }}" placeholder="Payment Page Name" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Single Page</p>

                <div class="row form-input">
                    <div class="col-4 mb-4">
                        <label for="single_page_already_purchased_{{ $short_code }}" class="form-label">Already Purchased</label>
                        <input type="text" class="form-control" id="single_page_already_purchased_{{ $short_code }}" name="single_page_already_purchased_{{ $short_code }}" value="{{ $contents->{'single_page_already_purchased_' . $short_code} ?? '' }}" placeholder="Already Purchased">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_enroll_now_{{ $short_code }}" class="form-label">Enroll Now</label>
                        <input type="text" class="form-control" id="single_page_enroll_now_{{ $short_code }}" name="single_page_enroll_now_{{ $short_code }}" value="{{ $contents->{'single_page_enroll_now_' . $short_code} ?? '' }}" placeholder="Enroll Now">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_not_available_{{ $short_code }}" class="form-label">Not Available</label>
                        <input type="text" class="form-control" id="single_page_not_available_{{ $short_code }}" name="single_page_not_available_{{ $short_code }}" value="{{ $contents->{'single_page_not_available_' . $short_code} ?? '' }}" placeholder="Not Available">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_login_for_enroll_{{ $short_code }}" class="form-label">Login for Enroll</label>
                        <input type="text" class="form-control" id="single_page_login_for_enroll_{{ $short_code }}" name="single_page_login_for_enroll_{{ $short_code }}" value="{{ $contents->{'single_page_login_for_enroll_' . $short_code} ?? '' }}" placeholder="Login for Enroll">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_no_of_modules_{{ $short_code }}" class="form-label">No of Modules</label>
                        <input type="text" class="form-control" id="single_page_no_of_modules_{{ $short_code }}" name="single_page_no_of_modules_{{ $short_code }}" value="{{ $contents->{'single_page_no_of_modules_' . $short_code} ?? '' }}" placeholder="No of Modules">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_course_type_{{ $short_code }}" class="form-label">Course Type</label>
                        <input type="text" class="form-control" id="single_page_course_type_{{ $short_code }}" name="single_page_course_type_{{ $short_code }}" value="{{ $contents->{'single_page_course_type_' . $short_code} ?? '' }}" placeholder="Course Type">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_course_duration_{{ $short_code }}" class="form-label">Course Duration</label>
                        <input type="text" class="form-control" id="single_page_course_duration_{{ $short_code }}" name="single_page_course_duration_{{ $short_code }}" value="{{ $contents->{'single_page_course_duration_' . $short_code} ?? '' }}" placeholder="Course Duration">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_course_language_{{ $short_code }}" class="form-label">Course Language</label>
                        <input type="text" class="form-control" id="single_page_course_language_{{ $short_code }}" name="single_page_course_language_{{ $short_code }}" value="{{ $contents->{'single_page_course_language_' . $short_code} ?? '' }}" placeholder="Course Language">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_first_tab_{{ $short_code }}" class="form-label">First Tab</label>
                        <input type="text" class="form-control" id="single_page_first_tab_{{ $short_code }}" name="single_page_first_tab_{{ $short_code }}" value="{{ $contents->{'single_page_first_tab_' . $short_code} ?? '' }}" placeholder="First Tab">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_second_tab_{{ $short_code }}" class="form-label">Second Tab</label>
                        <input type="text" class="form-control" id="single_page_second_tab_{{ $short_code }}" name="single_page_second_tab_{{ $short_code }}" value="{{ $contents->{'single_page_second_tab_' . $short_code} ?? '' }}" placeholder="Second Tab">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_third_tab_{{ $short_code }}" class="form-label">Third Tab</label>
                        <input type="text" class="form-control" id="single_page_third_tab_{{ $short_code }}" name="single_page_third_tab_{{ $short_code }}" value="{{ $contents->{'single_page_third_tab_' . $short_code} ?? '' }}" placeholder="Third Tab">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="single_page_fourth_tab_{{ $short_code }}" class="form-label">Fourth Tab</label>
                        <input type="text" class="form-control" id="single_page_fourth_tab_{{ $short_code }}" name="single_page_fourth_tab_{{ $short_code }}" value="{{ $contents->{'single_page_fourth_tab_' . $short_code} ?? '' }}" placeholder="Fourth Tab">
                    </div>

                    <div class="col-4">
                        <label for="single_page_rated_{{ $short_code }}" class="form-label">Rated</label>
                        <input type="text" class="form-control" id="single_page_rated_{{ $short_code }}" name="single_page_rated_{{ $short_code }}" value="{{ $contents->{'single_page_rated_' . $short_code} ?? '' }}" placeholder="Rated">
                    </div>

                    <div class="col-4">
                        <label for="single_page_stars_{{ $short_code }}" class="form-label">Stars</label>
                        <input type="text" class="form-control" id="single_page_stars_{{ $short_code }}" name="single_page_stars_{{ $short_code }}" value="{{ $contents->{'single_page_stars_' . $short_code} ?? '' }}" placeholder="Stars">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Payment Page</p>

                <div class="row form-input">
                    <div class="col-4 mb-4">
                        <label for="payment_page_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="payment_page_title_{{ $short_code }}" name="payment_page_title_{{ $short_code }}" value="{{ $contents->{'payment_page_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_one_time_payment_{{ $short_code }}" class="form-label">One Time Payment</label>
                        <input type="text" class="form-control" id="payment_page_one_time_payment_{{ $short_code }}" name="payment_page_one_time_payment_{{ $short_code }}" value="{{ $contents->{'payment_page_one_time_payment_' . $short_code} ?? '' }}" placeholder="One Time Payment">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_one_time_payment_start_description_{{ $short_code }}" class="form-label">One Time Payment Start Description</label>
                        <input type="text" class="form-control" id="payment_page_one_time_payment_start_description_{{ $short_code }}" name="payment_page_one_time_payment_start_description_{{ $short_code }}" value="{{ $contents->{'payment_page_one_time_payment_start_description_' . $short_code} ?? '' }}" placeholder="One Time Payment Start Description">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_one_time_payment_end_description_{{ $short_code }}" class="form-label">One Time Payment End Description</label>
                        <input type="text" class="form-control" id="payment_page_one_time_payment_end_description_{{ $short_code }}" name="payment_page_one_time_payment_end_description_{{ $short_code }}" value="{{ $contents->{'payment_page_one_time_payment_end_description_' . $short_code} ?? '' }}" placeholder="One Time Payment End Description">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_add_material_{{ $short_code }}" class="form-label">Add Material</label>
                        <input type="text" class="form-control" id="payment_page_add_material_{{ $short_code }}" name="payment_page_add_material_{{ $short_code }}" value="{{ $contents->{'payment_page_add_material_' . $short_code} ?? '' }}" placeholder="Add Material">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_monthly_payment_{{ $short_code }}" class="form-label">Monthly Payment</label>
                        <input type="text" class="form-control" id="payment_page_monthly_payment_{{ $short_code }}" name="payment_page_monthly_payment_{{ $short_code }}" value="{{ $contents->{'payment_page_monthly_payment_' . $short_code} ?? '' }}" placeholder="Monthly Payment">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_per_month_{{ $short_code }}" class="form-label">Per Month</label>
                        <input type="text" class="form-control" id="payment_page_per_month_{{ $short_code }}" name="payment_page_per_month_{{ $short_code }}" value="{{ $contents->{'payment_page_per_month_' . $short_code} ?? '' }}" placeholder="Per Month">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_separate_purchase_{{ $short_code }}" class="form-label">Separate Purchase</label>
                        <input type="text" class="form-control" id="payment_page_separate_purchase_{{ $short_code }}" name="payment_page_separate_purchase_{{ $short_code }}" value="{{ $contents->{'payment_page_separate_purchase_' . $short_code} ?? '' }}" placeholder="Separate Purchase">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_info_description_{{ $short_code }}" class="form-label">Info Description</label>
                        <input type="text" class="form-control" id="payment_page_info_description_{{ $short_code }}" name="payment_page_info_description_{{ $short_code }}" value="{{ $contents->{'payment_page_info_description_' . $short_code} ?? '' }}" placeholder="Info Description">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_order_details_{{ $short_code }}" class="form-label">Order Details</label>
                        <input type="text" class="form-control" id="payment_page_order_details_{{ $short_code }}" name="payment_page_order_details_{{ $short_code }}" value="{{ $contents->{'payment_page_order_details_' . $short_code} ?? '' }}" placeholder="Order Details">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_course_name_{{ $short_code }}" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="payment_page_course_name_{{ $short_code }}" name="payment_page_course_name_{{ $short_code }}" value="{{ $contents->{'payment_page_course_name_' . $short_code} ?? '' }}" placeholder="Course Name">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_amount_{{ $short_code }}" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="payment_page_amount_{{ $short_code }}" name="payment_page_amount_{{ $short_code }}" value="{{ $contents->{'payment_page_amount_' . $short_code} ?? '' }}" placeholder="Amount">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_material_logistics_{{ $short_code }}" class="form-label">Material Logistics</label>
                        <input type="text" class="form-control" id="payment_page_material_logistics_{{ $short_code }}" name="payment_page_material_logistics_{{ $short_code }}" value="{{ $contents->{'payment_page_material_logistics_' . $short_code} ?? '' }}" placeholder="Material Logistics">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_sub_total_{{ $short_code }}" class="form-label">Sub Total</label>
                        <input type="text" class="form-control" id="payment_page_sub_total_{{ $short_code }}" name="payment_page_sub_total_{{ $short_code }}" value="{{ $contents->{'payment_page_sub_total_' . $short_code} ?? '' }}" placeholder="Sub Total">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_discount_{{ $short_code }}" class="form-label">Discount</label>
                        <input type="text" class="form-control" id="payment_page_discount_{{ $short_code }}" name="payment_page_discount_{{ $short_code }}" value="{{ $contents->{'payment_page_discount_' . $short_code} ?? '' }}" placeholder="Discount">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_gift_amount_{{ $short_code }}" class="form-label">Gift Amount</label>
                        <input type="text" class="form-control" id="payment_page_gift_amount_{{ $short_code }}" name="payment_page_gift_amount_{{ $short_code }}" value="{{ $contents->{'payment_page_gift_amount_' . $short_code} ?? '' }}" placeholder="Gift Amount">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_total_{{ $short_code }}" class="form-label">Total</label>
                        <input type="text" class="form-control" id="payment_page_total_{{ $short_code }}" name="payment_page_total_{{ $short_code }}" value="{{ $contents->{'payment_page_total_' . $short_code} ?? '' }}" placeholder="Total">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="payment_page_already_purchased_{{ $short_code }}" class="form-label">Already Purchased</label>
                        <input type="text" class="form-control" id="payment_page_already_purchased_{{ $short_code }}" name="payment_page_already_purchased_{{ $short_code }}" value="{{ $contents->{'payment_page_already_purchased_' . $short_code} ?? '' }}" placeholder="Already Purchased">
                    </div>

                    <div class="col-4">
                        <label for="payment_page_pay_{{ $short_code }}" class="form-label">Pay</label>
                        <input type="text" class="form-control" id="payment_page_pay_{{ $short_code }}" name="payment_page_pay_{{ $short_code }}" value="{{ $contents->{'payment_page_pay_' . $short_code} ?? '' }}" placeholder="Pay">
                    </div>

                    <div class="col-4">
                        <label for="payment_page_login_for_pay_{{ $short_code }}" class="form-label">Login For Pay</label>
                        <input type="text" class="form-control" id="payment_page_login_for_pay_{{ $short_code }}" name="payment_page_login_for_pay_{{ $short_code }}" value="{{ $contents->{'payment_page_login_for_pay_' . $short_code} ?? '' }}" placeholder="Login For Pay">
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
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                                <div class="col-8">
                                    <textarea class="form-control textarea" name="section_3_point_descriptions[]" rows="5" placeholder="Description"></textarea>
                                    <x-backend.input-error field="section_3_point_files.*"></x-backend.input-error>
                                </div>
                                <div class="col-4 d-flex">
                                    <input type="file" class="form-control" name="section_3_point_files[]" accept="image/*">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>

                            </div>`;
            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush