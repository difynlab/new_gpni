@extends('frontend.layouts.app')

@section('title', 'ISSN Official Partners Affiliates')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/issn-official-partners.css') }}">
@endpush

@section('content')
    <main>
        @if($contents->{'section_1_title_en'})
            <section class="container issn-heading text-center mt-5 pt-5">
                <h1 class="pt-5">{{ $contents->{'section_1_title_'. $language} ?? $contents->{'section_1_title_en'} }}</h1>

                <div class="partners-section container pt-5">
                    <h2>{{ $contents->{'section_1_sub_title_'. $language} ?? $contents->{'section_1_sub_title_en'} }}</h2>
                    <div>{!! $contents->{'section_1_description_'. $language} ?? $contents->{'section_1_description_en'} !!}</div>

                    <div class="image-container">
                        @if(count($partners) > 0)
                            @foreach($partners as $partner)
                                <div class="image-container">
                                    <img src="{{ asset('storage/backend/persons/issn-partners/' . $partner->image) }}" alt="Partner Logo">
                                </div>
                            @endforeach
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"  alt="No Image">
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($contents->{'section_2_title_en'})
            <section class="affiliates-section d-flex align-items-center">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="content">
                        <h2>{{ $contents->{'section_2_title_'. $language} ?? $contents->{'section_2_title_en'} }}</h2>
                        <div>{!! $contents->{'section_2_description_'. $language} ?? $contents->{'section_2_description_en'} !!}</div>
                    </div>
                    <div class="image">
                        @if($contents->{'section_2_image_' . $language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $language}) }}"  alt="Affiliates Image">
                        @elseif($contents->{'section_2_image_en'})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_en'}) }}"  alt="Affiliates Image">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"  alt="Affiliates Image">
                        @endif
                    </div>
                </div>
            </section>
        @endif
        
        <!-- THERE IS NO BACKEND TABLE COLUMNS TO STORE DATA FOR THIS SECTION DETAILS. PLEASE CHECK -->
        <section class="text-center" style="padding: 60px 0;">
            <h2>Get in contact with us below to learn more.</h2>
            <p>If you are in a country or region with a large influence or business, feel free to talk with us also
                about the Country Partner franchise program.</p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary me-3">Contact Us Now</button>
                <button class="btn btn-outline-primary">Sign Up Now</button>
            </div>
        </section>
    </main>
@endsection