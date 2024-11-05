@extends('frontend.layouts.app')

@section('title', 'Payment Flow')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/payment-flow.css') }}">
@endpush

@section('content')
   
<div class="container my-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 px-5">
                <h2 class="page-title">{{ $translation['page_title'] }}</h2>
                <div class="payment-options">
                    <div class="card-custom mb-3 py-3">
                        <label class="radio-container">
                            <input type="radio" name="paymentMethod" value="oneTimePayment" class="radio" id="oneTimePayment" checked>
                            <span class="radio-custom"></span>
                            <div>
                                <h5 class="payment-option-title">{{ $translation['one_time_payment'] }}</h5>
                                <p class="payment-option-subtitle">{{ $translation['one_time_subtitle'] }}</p>
                            </div>
                        </label>
                    </div>
                    <div class="additional-option" id="additionalOption">
                        <label>
                            <input type="checkbox" name="addCourseMaterial" id="addCourseMaterial">
                            {{ __('Add Course Material & Logistics into order card') }}
                        </label>
                    </div>
                    <div class="card-custom mb-3">
                        <label class="radio-container">
                            <input type="radio" name="paymentMethod" value="monthlyPayment" id="monthlyPayment">
                            <span class="radio-custom"></span>
                            <div>
                                <h5 class="payment-option-title">{{ $translation['monthly_payment'] }}</h5>
                                <p class="payment-option-subtitle">{{ $translation['monthly_subtitle'] }}</p>
                                <ul class="payment-option-subtitle px-3 pt-2">
                                    <li>{{ __('Course material & Logistics needs to be purchased separately') }}</li>
                                </ul>
                            </div>
                        </label>
                    </div>
                    <div id="infoBox" class="information-box" style="display: none;">
                        <img src="storage/frontend/info-note.svg" alt="Info Note">
                        <p>{{ $translation['info_box'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h1 class="pb-4">{{ $translation['order_details'] }}</h1>

                    <div class="d-flex justify-content-between mt-4 section-subtitle">
                        <div>{{ $translation['course_name'] }}</div>
                        <div>{{ $translation['amount'] }}</div>
                    </div>

                    <!-- Dynamically fetched course name and price -->
                    <div class="d-flex justify-content-between my-3 pb-3 PNE-level">
                        <div>{{ $course->title }}</div> 
                        <div id="coursePrice">{{ $course->price }}</div>
                    </div>

                    <!-- Placeholder for the dynamically fetched course material name and price -->
                    <div id="materialDetails" style="display: none;">
                        <div class="d-flex justify-content-between my-3 pb-3 PNE-level">
                            <div>{{ __('Course Material & Logistics') }}</div> <!-- Material name -->
                            <div id="materialLogisticPrice"></div> <!-- Material logistic price -->
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="d-flex justify-content-between my-4 section-title">
                        <div>{{ $translation['sub_total'] }}</div>
                        <div id="subTotal">$0.0</div>
                    </div>

                    <div class="d-flex justify-content-between my-4 section-title">
                        <div>{{ $translation['discount'] }}</div>
                        <div>$0.0</div>
                    </div>

                    <div class="line"></div>

                    <div class="d-flex justify-content-between mt-4 section-title">
                        <div>{{ $translation['total'] }}</div>
                        <div class="total-amount" id="totalAmount">$0.0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')
<script>

document.addEventListener('DOMContentLoaded', function () {
    const oneTimePayment = document.getElementById('oneTimePayment');
    const monthlyPayment = document.getElementById('monthlyPayment');
    const addCourseMaterial = document.getElementById('addCourseMaterial');
    const additionalOption = document.getElementById('additionalOption');
    const infoBox = document.getElementById('infoBox');
    const subTotal = document.getElementById('subTotal');
    const totalAmount = document.getElementById('totalAmount');
    const coursePrice = parseFloat(document.getElementById('coursePrice').textContent);  // Course price from backend
    const materialLogisticPrice = {{ $course->material_logistic_price }};
    const instalmentPrice = {{ $course->instalment_price }};
    
    // Set initial values for one-time payment
    updatePrices();

    // Event listeners for radio buttons
    oneTimePayment.addEventListener('change', function () {
        if (oneTimePayment.checked) {
            additionalOption.style.display = 'block';
            infoBox.style.display = 'none';
            updatePrices();
        }
    });

    monthlyPayment.addEventListener('change', function () {
        if (monthlyPayment.checked) {
            additionalOption.style.display = 'none';
            infoBox.style.display = 'block';
            updatePrices();
        }
    });

    // Event listener for checkbox
    addCourseMaterial.addEventListener('change', function () {
        if (oneTimePayment.checked) {
            updatePrices();
        }
    });

    // Function to update the prices dynamically
    function updatePrices() {
        let finalPrice = 0;
        
        if (oneTimePayment.checked) {
            finalPrice = coursePrice;
            if (addCourseMaterial.checked) {
                finalPrice += materialLogisticPrice;
            }
        } else if (monthlyPayment.checked) {
            finalPrice = instalmentPrice;
        }
        
        subTotal.textContent = `$${finalPrice.toFixed(2)}`;
        totalAmount.textContent = `$${finalPrice.toFixed(2)}`;
    }
});

</script>
@endpush