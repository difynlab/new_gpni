@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/membership.css') }}">
@endpush

@section('content')

    <div class="container-fluid membership-section">
        <x-frontend.notification></x-frontend.notification>

        @if($contents->section_1_title_en)
            <h2 class="ff-poppins-medium fs-61">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h2>
            <div class="px-4 ff-poppins-regular fs-25 pt-2">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}
            </div>
        @endif

        <div class="row d-flex align-items-center py-4">
            <div class="col-12 col-md-6">
                @if($contents->{'section_2_image_' . $middleware_language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}" class="img-fluid">
                @elseif($contents->section_2_image_en)
                    <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" class="img-fluid">
                @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" class="img-fluid">
                @endif
            </div>

            @if($contents->section_2_top_description_en)
                <div class="col-12 col-md-6 py-md-0 py-2">
                    @if($contents->section_2_top_description_en)
                        <div class="feature d-flex align-items-center mb-4">
                            <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick Icon" class="feature-icon">
                            <div>
                                {!! $contents->{'section_2_top_description_' . $middleware_language} ?? $contents->section_2_top_description_en !!}
                            </div>
                        </div>
                    @endif

                    @if($contents->section_2_bottom_description_en)
                        <div class="feature d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick Icon" class="feature-icon">
                            <div>
                                {!! $contents->{'section_2_bottom_description_' . $middleware_language} ?? $contents->section_2_bottom_description_en !!}
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            
            @if($contents->section_3_title_en)
                <div class="benefits-section py-5">
                    <h2 class="text-center mb-4 pt-3 fs-49 ff-poppins-medium">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h2>
                    <div class="text-center mb-5 fs-25 ff-poppins-regular">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>

                    @if(auth()->check())
                        @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name))
                            @if(hasUserPurchasedMembership(auth()->user()->id))
                                @if(auth()->user()->member == 'Yes')
                                    <button class="btn-pay-now">{{ $contents->{'section_3_already_purchased_' . $middleware_language} ?? $contents->section_3_already_purchased_en }}</button>
                                @else
                                    <button class="btn-pay-now">{{ $contents->{'section_3_membership_disabled_' . $middleware_language} ?? $contents->section_3_membership_disabled_en }}</button>
                                @endif
                            @else
                                <form action="{{ route('frontend.membership.checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-pay-now" name="type" value="Lifetime">{{ $contents->{'section_3_lifetime_proceed_' . $middleware_language} ?? $contents->section_3_lifetime_proceed_en }}</button>

                                    <button type="submit" class="btn-pay-now" name="type" value="Annual">{{ $contents->{'section_3_annual_proceed_' . $middleware_language} ?? $contents->section_3_annual_proceed_en }}</button>
                                </form>
                            @endif
                        @else
                            <button class="btn-pay-now">{{ $contents->{'section_3_change_language_' . $middleware_language} ?? $contents->section_3_change_language_en }}</button>
                        @endif
                    @else
                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn-pay-now text-decoration-none">{{ $contents->{'section_3_login_for_purchase_' . $middleware_language} ?? $contents->section_3_login_for_purchase_en }}</a>
                    @endif

                    @if($contents->section_3_labels_contents_en)
                        <div class="accordion px-5" id="benefitsAccordion">
                            @foreach(json_decode($contents->{'section_3_labels_contents_' . $middleware_language} ?? $contents->section_3_labels_contents_en) as $key => $label_content)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}"> {{ $label_content->title }}</button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $key }}" data-bs-parent="#benefitsAccordion">
                                        <div class="accordion-body">
                                            <div>{!! $label_content->content !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            @if($contents->section_4_title_en)
                <div class="container-fluid journey-section">

                    <h2 class="fs-49 ff-poppins-medium">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h2>

                    <div class="fs-25 ff-poppins-regular">{!! $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en !!}</div>

                    <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap">
                        <a href="{{ json_decode($contents->{'section_4_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_4_labels_links_en)[0]->link }}" class="btn btn-secondary register-button fd-20 ff-poppins-medium mb-2 mb-md-0 me-md-3 py-3 px-5">{{ json_decode($contents->{'section_4_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_4_labels_links_en)[0]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_4_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_4_labels_links_en)[1]->link }}" class="btn explore-lesson ff-poppins-medium fs-20 py-3 px-4">
                            {{ json_decode($contents->{'section_4_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_4_labels_links_en)[1]->label }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                                <path d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

            @if($contents->section_5_title_en)
                <div class="faq-section">
                    <h2>{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</h2>

                    <div>{!! $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en !!}</div>

                    @if($faqs->isNotEmpty())
                        <div class="accordion px-5" id="faqAccordion">
                            @foreach($faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                        {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection