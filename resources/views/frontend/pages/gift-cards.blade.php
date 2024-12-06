@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gift-cards.css') }}">
@endpush

@section('content')

    @if($contents->title_en)
        <main class="container my-5 pt-5">
            <div class="pt-5">
                <x-frontend.notification></x-frontend.notification>
            </div>

            <h1 class="header-title fs-49 pt-5 text-center">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>

            <p class="description fs-25 text-center">{{ $contents->{'sub_title_' . $middleware_language} ?? $contents->sub_title_en }}</p>

            <p class="description fs-25 text-center">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</p>

            <div class="row mt-5">
                <div class="col-lg-6 col-md-12">
                    <div class="selected-card mb-4">
                        <div class="card-image-container" id="cardImageContainer">
                            @if($images)
                                <img src="{{ asset('storage/backend/pages/' . $images[0]) }}" alt="Gift Card" id="main-card-image" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    <div class="custom-selection">
                        <h5 class="text-primary fs-20">{{ $contents->{'choose_gift_' . $middleware_language} ?? $contents->choose_gift_en }}</h5>
                        <div class="d-flex flex-wrap">
                            @if($images)
                                @foreach($images as $image)
                                    <div class="style-card">
                                        <img src="{{ asset('storage/backend/pages/' . $image) }}" alt="Gift Card Image" class="img-fluid">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <form action="{{ route('frontend.gift-cards.checkout') }}" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group">
                            <label for="receiver-name" class="fs-16">{{ $contents->{'receiver_name_' . $middleware_language} ?? $contents->receiver_name_en }}</label>
                            <input type="text" class="form-control" id="receiver-name" name="receiver_name" required>
                        </div>

                        <div class="form-group">
                            <label for="receiver-email" class="required fs-16">{{ $contents->{'receiver_email_' . $middleware_language} ?? $contents->receiver_email_en }}</label>
                            <input type="email" class="form-control" id="receiver-email" name="receiver_email" required>
                        </div>

                        <div class="form-group">
                            <label class="required fs-16">{{ $contents->{'select_amount_' . $middleware_language} ?? $contents->select_amount_en }}</label>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-start">
                                @foreach($amounts as $amount)
                                    <button type="button" class="btn btn-outline-primary mx-1 my-2 btn-responsive" onclick="setAmount({{ $amount }})">{{ $currency_symbol }}{{ $amount }}</button>
                                @endforeach
                                <button type="button" class="btn btn-outline-primary mx-1 my-2 btn-responsive" onclick="customAmount()">{{ $contents->{'custom_' . $middleware_language} ?? $contents->custom_en }}</button>
                            </div>
                        </div>

                        <div class="form-group d-none" id="custom-amount-section">
                            <label for="custom-amount" class="fs-16">{{ $contents->{'enter_the_amount_' . $middleware_language} ?? $contents->enter_the_amount_en }}</label>
                            <input type="number" class="form-control" id="custom-amount" name="amount">
                        </div>

                        <div class="form-group">
                            <label for="message" class="required fs-16">{{ $contents->{'message_' . $middleware_language} ?? $contents->message_en }}</label>
                            <textarea class="form-control form-textarea" id="message" rows="3" name="message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit btn-responsive">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                    </form>
                </div>
            </div>
        </main>
    @endif

@endsection

@push('after-scripts')
    <script>
        $('.style-card img').on('click', function() {
            let url = $(this).attr('src');
            $('#main-card-image').attr('src', url);
        });

        function setAmount(value) {
            const customAmountSection = document.getElementById('custom-amount-section');
            const customAmountInput = document.getElementById('custom-amount');
            
            customAmountSection.classList.add('d-none');
            customAmountInput.value = value;
            
            setActiveButton(value);
        }

        function customAmount() {
            const customAmountSection = document.getElementById('custom-amount-section');
            customAmountSection.classList.remove('d-none');
            document.getElementById('custom-amount').value = '';
            
            setActiveButton(null);
        }

        function setActiveButton(value) {
            let currency_symbol = '<?php echo $currency_symbol; ?>';
            const buttons = document.querySelectorAll('.d-flex .btn');
            buttons.forEach(button => {
                button.classList.remove('active');
                if(button.textContent.trim() === `${currency_symbol}${value}`) {
                    button.classList.add('active');
                }
            });
        }

        function validateForm() {
            const customAmountInput = document.getElementById('custom-amount');
            const selectedAmount = customAmountInput.value;
            
            if(!selectedAmount || isNaN(selectedAmount) || Number(selectedAmount) <= 0) {
                alert('Please select or enter a valid amount');
                return false;
            }

            return true;
        }
    </script>
@endpush