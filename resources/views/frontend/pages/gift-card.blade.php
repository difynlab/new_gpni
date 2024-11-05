@extends('frontend.layouts.app')

@section('title', 'Gift Card')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gift-card.css') }}">
@endpush

@php
    $images = json_decode($contents->{'images_' . $language} ?? $contents->images_en, true);
@endphp

@section('content')

@if($contents->{'title_en'})

<div id="navbar-placeholder"></div>

<main class="container my-5 pt-5">
    <!-- First Title -->
    <h1 class="header-title pt-5">{{ $contents->{'title_' . $language} ?? $contents->{'title_en'} }}</h1>
    <!-- Second Title -->
    <p class="description">{{ $contents->{'sub_title_' . $language} ?? $contents->{'sub_title_en'} }}</p>
    <!-- Description Text -->
    <p class="description">
        {{ $contents->{'description_' . $language} ?? $contents->{'description_en'} }}  
    </p>
    <div class="row mt-5">
        <div class="col-lg-6 col-md-12">
            <div class="selected-card mb-4">
                <div class="card-image-container" id="cardImageContainer">
                    <img src="/storage/backend/pages/{{ $images[0] }}" alt="Gift Card" id="mainCardImage">
                </div>
            </div>
            <div class="custom-selection">
                <h5 class="text-primary">Choose Gift Card Style</h5>
                <div class="d-flex flex-wrap">
                    @foreach($images as $key => $image)
                        <div class="style-card {{ $key == 0 ? 'active' : '' }}" onclick="changeCardStyle(this, '/storage/backend/pages/{{ $image }}')">
                            <img src="/storage/backend/pages/{{ $image }}" alt="Gift Card Style {{ $key + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- THERE WAS NO DATABASE TABLE TO GET LANGUAGE BASED DATA FOR FOLLOWING LABLES -->
        <div class="col-lg-6 col-md-12">
            <form>
                <div class="form-group">
                    <label for="receiverName" class="required">Receiver's Name</label>
                    <input type="text" class="form-control" id="receiverName"
                        placeholder="Enter the receiver’s name">
                </div>
                <div class="form-group">
                    <label for="receiverEmail" class="required">Receiver's Email</label>
                    <input type="email" class="form-control" id="receiverEmail" placeholder="Ex: sample@gmail.com">
                </div>
                <div class="form-group">
                    <label class="required">Select Amount</label>
                    <div class="d-flex flex-wrap">
                        <button type="button" class="btn btn-outline-primary mx-1 my-2">$50</button>
                        <button type="button" class="btn btn-outline-primary mx-1 my-2">$100</button>
                        <button type="button" class="btn btn-outline-primary mx-1 my-2">$250</button>
                        <button type="button" class="btn btn-outline-primary mx-1 my-2">$500</button>
                        <button type="button" class="btn btn-outline-primary mx-1 my-2"
                            id="customAmountBtn">Custom</button>
                    </div>
                </div>
                <div class="form-group d-none" id="customAmountSection">
                    <label for="customAmount" class="required">Enter the amount you want to proceed with</label>
                    <input type="number" class="form-control" id="customAmount"
                        placeholder="Please enter the amount here">
                </div>
                <div class="form-group">
                    <label for="message" class="required">Message</label>
                    <textarea class="form-control form-textarea" id="message" rows="3"
                        placeholder="Leave your message here . . ."></textarea>
                </div>
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</main>

<!-- Footer Start -->
<div id="footer-placeholder"></div>

@endif

@endsection

@push('after-scripts')
<script src="{{ asset('frontend/js/gift-card.js') }}"></script>
@endpush