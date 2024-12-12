@extends('frontend.layouts.app')

@section('title', $contents->{'payment_page_name_' . $middleware_language} ?? $contents->payment_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/course-payment.css') }}">
@endpush

@section('content')
   
    <div class="container my-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8 px-5">
                    <h2 class="page-title">{{ $contents->{'payment_page_title_' . $middleware_language} ?? $contents->payment_page_title_en }}</h2>
                    <div class="payment-options">
                        <div class="card-custom mb-3 py-3">
                            <label class="radio-container">
                                <input type="radio" name="payment_mode" value="payment" class="radio" id="one-time-payment" checked>
                                <span class="radio-custom"></span>
                                <div>
                                    <h5 class="payment-option-title">{{ $contents->{'payment_page_one_time_payment_' . $middleware_language} ?? $contents->payment_page_one_time_payment_en }}</h5>
                                    @if($course->material_logistic && $course->material_logistic_price)
                                        <p class="payment-option-subtitle">{!! $contents->{'payment_page_one_time_payment_start_description_' . $middleware_language} ?? $contents->payment_page_one_time_payment_start_description_en !!} {{ $currency_symbol }}{{ $course->material_logistic_price }} {!! $contents->{'payment_page_one_time_payment_end_description_' . $middleware_language} ?? $contents->payment_page_one_time_payment_end_description_en !!}</p>
                                    @endif
                                </div>
                            </label>
                        </div>

                        @if($course->material_logistic && $course->material_logistic_price)
                            <div class="additional-option">
                                <input class="form-check-input" type="checkbox" id="checkbox">

                                <label class="form-check-label ms-1" for="checkbox" style="cursor: pointer;">
                                    {{ $contents->{'payment_page_add_material_' . $middleware_language} ?? $contents->payment_page_add_material_en }}
                                </label>
                            </div>
                        @endif

                        @if($course->instalment_months && $course->instalment_price && $course->instalment_price_id)
                            <div class="card-custom mb-3">
                                <label class="radio-container">
                                    <input type="radio" name="payment_mode" value="subscription" class="radio" id="subscription-payment">
                                    <span class="radio-custom"></span>
                                    <div>
                                        <h5 class="payment-option-title">{{ $contents->{'payment_page_monthly_payment_' . $middleware_language} ?? $contents->payment_page_monthly_payment_en }} ({{ $course->instalment_months }} Months)</h5>
                                        <p class="payment-option-subtitle">{{ $contents->{'payment_page_per_month_' . $middleware_language} ?? $contents->payment_page_per_month_en }} {{ $currency_symbol }}{{ $course->instalment_price }}</p>
                                        <ul class="payment-option-subtitle px-3 pt-2">
                                            <li>{{ $contents->{'payment_page_separate_purchase_' . $middleware_language} ?? $contents->payment_page_separate_purchase_en }}</li>
                                        </ul>
                                    </div>
                                </label>
                            </div>
                            <div id="info-box" class="information-box d-none">
                                <img src="{{ asset('storage/frontend/info-note.svg') }}" alt="Info Note">
                                <p>{!! $contents->{'payment_page_info_description_' . $middleware_language} ?? $contents->payment_page_info_description_en !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h1 class="pb-4">{{ $contents->{'payment_page_order_details_' . $middleware_language} ?? $contents->payment_page_order_details_en }}</h1>

                        <div class="d-flex justify-content-between mt-4 section-subtitle">
                            <div>{{ $contents->{'payment_page_course_name_' . $middleware_language} ?? $contents->payment_page_course_name_en }}</div>
                            <div>{{ $contents->{'payment_page_amount_' . $middleware_language} ?? $contents->payment_page_amount_en }}</div>
                        </div>

                        <div class="d-flex justify-content-between my-3 PNE-level">
                            <div>{{ $course->title }}</div> 
                            <div id="course-price">{{ $currency_symbol }}<span>{{ $course->price }}</span></div>
                        </div>

                        <div id="material-details" class="d-none">
                            <div class="d-flex justify-content-between my-3 PNE-level">
                                <div>{{ $contents->{'payment_page_material_logistics_' . $middleware_language} ?? $contents->payment_page_material_logistics_en }}</div>
                                <div id="material-logistic-price">{{ $currency_symbol }}<span>{{ $course->material_logistic_price }}</span></div>
                            </div>
                        </div>

                        <div class="line"></div>

                        <div class="d-flex justify-content-between my-4 title">
                            <div>{{ $contents->{'payment_page_sub_total_' . $middleware_language} ?? $contents->payment_page_sub_total_en }}</div>
                            <div id="sub-total">{{ $currency_symbol }}<span>{{ $course->price }}</span></div>
                        </div>

                        <div class="d-flex justify-content-between my-4 title">
                            <div>{{ $contents->{'payment_page_discount_' . $middleware_language} ?? $contents->payment_page_discount_en }}</div>
                            <div id="course-discount">{{ $currency_symbol }}<span>0.0</span></div>
                        </div>

                        @if($wallet_balance)
                            <div class="d-flex justify-content-between my-4 title gift-amount-div">
                                <div>{{ $contents->{'payment_page_gift_amount_' . $middleware_language} ?? $contents->payment_page_gift_amount_en }}</div>
                                <div id="course-gift">{{ $currency_symbol }}<span>{{ $wallet_balance }}</span></div>
                            </div>
                        @endif

                        <div class="line"></div>

                        <div class="d-flex justify-content-between my-4 title">
                            <div>{{ $contents->{'payment_page_total_' . $middleware_language} ?? $contents->payment_page_total_en }}</div>
                            <div id="total-amount">{{ $currency_symbol }}<span>{{ sprintf('%.2f', $total_amount) }}</span></div>

                            <input type="hidden" id="dynamic-total-price" value="{{ $total_amount }}">
                            <input type="hidden" id="dynamic-gift-price" value="{{ $wallet_balance }}">
                            <input type="hidden" id="dynamic-course-price" value="{{ $course->price }}">
                            <input type="hidden" id="dynamic-material-price" value="{{ $course->material_logistic_price }}">
                            <input type="hidden" id="dynamic-instalment-price" value="{{ $course->instalment_price }}">
                        </div>

                        @if(auth()->check())
                            @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                                <button type="submit" class="btn pay-now">{{ $contents->{'payment_page_already_purchased_' . $middleware_language} ?? $contents->payment_page_already_purchased_en }}</button>
                            @else
                                <form action="{{ route('frontend.certification-courses.checkout') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_name" value="{{ $course->title }}">
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <input type="hidden" id="price" name="price" value="{{ $total_amount }}">
                                    <input type="hidden" name="material_logistic_price" value="{{ $course->material_logistic_price }}">
                                    <input type="hidden" name="price_id" value="{{ $course->instalment_price_id }}">
                                    <input type="hidden" id="material-logistic" name="material_logistic" value="No">
                                    <input type="hidden" id="payment-mode" name="payment_mode" value="payment">

                                    <button type="submit" class="btn pay-now">{{ $contents->{'payment_page_pay_' . $middleware_language} ?? $contents->payment_page_pay_en }}</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn pay-now">{{ $contents->{'payment_page_login_for_pay_' . $middleware_language} ?? $contents->payment_page_login_for_pay_en }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            let initialTotalPrice = parseFloat($('#dynamic-total-price').val());
            let initialGiftPrice = parseFloat($('#dynamic-gift-price').val());
            let initialCoursePrice = parseFloat($('#dynamic-course-price').val());
            let initialMaterialPrice = parseFloat($('#dynamic-material-price').val());
            let initialInstalmentPrice = parseFloat($('#dynamic-instalment-price').val());

            $('#checkbox').on('change', function() {
                if($(this).is(':checked')) {
                    $('#material-details').toggleClass('d-none');
                    $('#material-logistic').val('Yes');

                    let subTotal = parseFloat(initialCoursePrice + initialMaterialPrice).toFixed(2);
                    $('#sub-total span').text(subTotal);

                    console.log(initialGiftPrice, initialCoursePrice, initialMaterialPrice);

                    if(initialGiftPrice < (initialCoursePrice + initialMaterialPrice)) {
                        let totalPrice = parseFloat(initialTotalPrice + initialMaterialPrice).toFixed(2);
                        $('#total-amount span').text(totalPrice);
                        $('#price').val(totalPrice);
                    }
                    else {
                        $('#total-amount span').text('0.00');
                        let totalPrice = '0.00';
                        $('#price').val(totalPrice);
                    }
                }
                else {
                    $('#material-details').toggleClass('d-none');
                    $('#material-logistic').val('No');

                    let subTotal = parseFloat(initialCoursePrice).toFixed(2);
                    let totalPrice = parseFloat((subTotal - initialGiftPrice)).toFixed(2);
                    $('#sub-total span').text(subTotal);
                    $('#total-amount span').text(totalPrice);
                    $('#price').val(totalPrice);
                }
            });

            $('.radio').on('change', function() {
                let payment_mode = $(this).val();

                if(payment_mode == 'payment') {
                    $('#info-box').toggleClass('d-none');
                    $('.additional-option').toggleClass('d-none');
                    $('#payment-mode').val('payment');

                    let totalPrice = (initialTotalPrice).toFixed(2);
                    $('#course-price span').text(totalPrice);
                    $('#sub-total span').text(totalPrice);
                    $('#total-amount span').text(totalPrice);

                    $('.gift-amount-div').toggleClass('d-none');
                }
                else {
                    $('.additional-option').toggleClass('d-none');
                    $('#info-box').toggleClass('d-none');
                    $('#checkbox').prop('checked', false);
                    $('#material-details').addClass('d-none');
                    $('#payment-mode').val('subscription');

                    let totalPrice = (initialInstalmentPrice).toFixed(2);
                    $('#course-price span').text(totalPrice);
                    $('#sub-total span').text(totalPrice);
                    $('#total-amount span').text(totalPrice);

                    $('.gift-amount-div').toggleClass('d-none');
                }
            });
        });
    </script>
@endpush