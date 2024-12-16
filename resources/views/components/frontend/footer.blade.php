@php
    $contents = App\Models\CommonContent::find(1);
@endphp

<div class="footer">
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-md-4 text-start">
                <a href="{{ route('frontend.homepage') }}">
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->footer_logo) }}" alt="GPNi" style="width: 286px; margin-bottom: 20px;">
                    <p>{{ $contents->{'footer_powered_' . $middleware_language} ?? $contents->footer_powered_en }} <img src="{{ asset('storage/frontend/powered-by-white.svg') }}" alt="Power Logo" style="width: 20px;"></p>
                </a>
            </div>

            <div class="col-md-4 text-start">
                <div class="footer-title">{{ $contents->{'footer_get_in_touch_' . $middleware_language} ?? $contents->footer_get_in_touch_en }}</div>

                <div class="d-flex flex-wrap justify-content-start">
                    <a href="{{ App\Models\Setting::find(1)->instagram }}" class="social-icon" target="blank">
                        <img src="{{ asset('storage/frontend/instagram.svg') }}" alt="Instagram" width="12" height="13">
                        {{ $contents->{'footer_instagram_' . $middleware_language} ?? $contents->footer_instagram_en }}
                    </a>
                    <a href="{{ App\Models\Setting::find(1)->fb }}" class="social-icon" target="blank">
                        <img src="{{ asset('storage/frontend/facebook.svg') }}" alt="Facebook" width=" 8" height="15" ;>
                        {{ $contents->{'footer_facebook_' . $middleware_language} ?? $contents->footer_facebook_en }}
                    </a>
                    <a href="{{ App\Models\Setting::find(1)->youtube }}" class="social-icon" target="blank">
                        <img src="{{ asset('storage/frontend/youtube.svg') }}" alt="YouTube" width="15" height="10">
                        {{ $contents->{'footer_youtube_' . $middleware_language} ?? $contents->footer_youtube_en }}
                    </a>
                    <a href="{{ App\Models\Setting::find(1)->twitter }}" class="social-icon" target="blank">
                        <img src="{{ asset('storage/frontend/twitter.svg') }}" alt="Twitter" width="12" height="12">
                        {{ $contents->{'footer_twitter_' . $middleware_language} ?? $contents->footer_twitter_en }}
                    </a>
                    <a href="{{ App\Models\Setting::find(1)->linkedin }}" class="social-icon" target="blank">
                        <img src="{{ asset('storage/frontend/linkedin.svg') }}" alt="LinkedIn" width="13" height="12">
                        {{ $contents->{'footer_linkedin_' . $middleware_language} ?? $contents->footer_linkedin_en }}
                    </a>
                </div>
            </div>

            <div class="col-md-4 text-start">
                <div class="footer-title">{{ $contents->{'footer_get_latest_' . $middleware_language} ?? $contents->footer_get_latest_en }}</div>

                <form action="{{ route('frontend.subscription') }}" method="POST">
                    @csrf
                    <div class="subscribe-form pb-3">
                        <div class="d-flex flex-column flex-md-row align-items-md-center mb-3">
                            <input type="email" class="form-control subscribe-input flex-grow-1 mb-3 mb-md-0 mr-md-3" name="email" placeholder="{{ $contents->{'footer_placeholder_' . $middleware_language} ?? $contents->footer_placeholder_en }}" required>
                            <button type="submit" class="btn subscribe-button">{{ $contents->{'footer_button_' . $middleware_language} ?? $contents->footer_button_en }}</button>
                        </div>

                        <x-frontend.input-error field="email"></x-frontend.input-error>

                        <x-frontend.notification></x-frontend.notification>
                    </div>
                </form>

                <div>
                    <a href="#"><img src="{{ asset('storage/frontend/app-store.svg') }}" alt="App Store" style="width: 120px; margin-right: 10px;"></a>
                    <a href="#"><img src="{{ asset('storage/frontend/play-store.svg') }}" alt="Google Play" style="width: 120px;"></a>
                </div>

            </div>
        </div>
        
        <div class="row pt-5">
            <div class="col-lg-3 list-of-items">
                <h5>{{ $contents->{'footer_about_' . $middleware_language} ?? $contents->footer_about_en }}</h5>
                <ul class="list-unstyled">
                    <li>
                        @php
                            $first = App\Models\HistoryOfGpniContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.history-of-gpni') }}">{{ $first->{'page_name_' . $middleware_language} !== '' ? $first->{'page_name_' . $middleware_language} : $first->page_name_en }}</a>
                    </li>

                    <li>
                        @php
                            $second = App\Models\WhyWeAreDifferentContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.why-we-are-different') }}">{{ $second->{'page_name_' . $middleware_language} !== '' ? $second->{'page_name_' . $middleware_language} : $second->page_name_en }}</a>
                    </li>

                    <li>
                        @php
                            $third = App\Models\AdvisoryBoardExpertLectureContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.advisory-board-and-expert-lectures') }}">{{ $third->{'page_name_' . $middleware_language} !== '' ? $third->{'page_name_' . $middleware_language} : $third->page_name_en }}</a>
                    </li>

                    <li>
                        @php
                            $fourth = App\Models\MembershipContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.membership') }}">{{ $fourth->{'page_name_' . $middleware_language} !== '' ? $fourth->{'page_name_' . $middleware_language} : $fourth->page_name_en }}</a>
                    </li>

                    <li>
                        @php
                            $fifth = App\Models\NutritionistContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.nutritionists.index') }}">{{ $fifth->{'page_name_' . $middleware_language} !== '' ? $fifth->{'page_name_' . $middleware_language} : $fifth->page_name_en }}</a>
                    </li>

                    <li>
                        @php
                            $sixth = App\Models\ProductContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.products.index') }}">{{ $sixth->{'page_name_' . $middleware_language} !== '' ? $sixth->{'page_name_' . $middleware_language} : $sixth->page_name_en }}</a>
                    </li>
                    
                    <li>
                        @php
                            $seventh = App\Models\OurPolicyContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.our-policies') }}">{{ $seventh->{'page_name_' . $middleware_language} !== '' ? $seventh->{'page_name_' . $middleware_language} : $seventh->page_name_en }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 list-of-items">
                <h5>{{ $contents->{'footer_education_' . $middleware_language} ?? $contents->footer_education_en }}</h5>
                <ul class="list-unstyled">

                    <li>
                        <a href="{{ route('frontend.certification-courses.show', 6) }}">PNE Level 1 + SNS</a>
                    </li>

                    <li>
                        <a href="{{ route('frontend.certification-courses.show', 7) }}">PNE Level 2 Masters + CISSN</a>
                    </li>

                    <li>
                        @php
                            $eighth = App\Models\MasterClassContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.master-classes.index') }}">{{ $eighth->{'page_name_' . $middleware_language} !== '' ? $eighth->{'page_name_' . $middleware_language} : $eighth->page_name_en }}</a>
                    </li>

                    <li>
                        @php
                            $ninth = App\Models\ContactUsContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.contact-us.index') }}">{{ $ninth->{'page_name_' . $middleware_language} !== '' ? $ninth->{'page_name_' . $middleware_language} : $ninth->page_name_en }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 list-of-items">
                <h5>{{ $contents->{'footer_partners_' . $middleware_language} ?? $contents->footer_partners_en }}</h5>
                <ul class="list-unstyled">
                    <li>
                        @php
                            $tenth = App\Models\InsuranceProfessionalMembershipContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.insurance-and-professional-membership') }}">{{ $tenth->{'page_name_' . $middleware_language} !== '' ? $tenth->{'page_name_' . $middleware_language} : $tenth->page_name_en }}</a>
                    </li>
                    <li>
                        @php
                            $eleventh = App\Models\GlobalEducationPartnerContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.global-education-partners') }}">{{ $eleventh->{'page_name_' . $middleware_language} !== '' ? $eleventh->{'page_name_' . $middleware_language} : $eleventh->page_name_en }}</a>
                    </li>
                    <li>
                        @php
                            $twelfth = App\Models\ISSNOfficialPartnerAffiliateContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.issn-official-partners-and-affiliates') }}">{{ $twelfth->{'page_name_' . $middleware_language} !== '' ? $twelfth->{'page_name_' . $middleware_language} : $twelfth->page_name_en }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 list-of-items">
                <h5>{{ $contents->{'footer_other_' . $middleware_language} ?? $contents->footer_other_en }}</h5>
                <ul class="list-unstyled">
                    <!-- <li><a href="#">Promotion</a></li> -->
                    <li>
                        @php
                            $thirteenth = App\Models\GiftCardContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.gift-cards.index') }}">{{ $thirteenth->{'page_name_' . $middleware_language} !== '' ? $thirteenth->{'page_name_' . $middleware_language} : $thirteenth->page_name_en }}</a>
                    </li>
                    <li>
                        @php
                            $fourteenth = App\Models\ArticleContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.articles.index') }}">{{ $fourteenth->{'page_name_' . $middleware_language} !== '' ? $fourteenth->{'page_name_' . $middleware_language} : $fourteenth->page_name_en }}</a>
                    </li>
                    <li>
                        @php
                            $fifteenth = App\Models\PodcastContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.podcasts.index') }}">{{ $fifteenth->{'page_name_' . $middleware_language} !== '' ? $fifteenth->{'page_name_' . $middleware_language} : $fifteenth->page_name_en }}</a>
                    </li>
                    <li>
                        @php
                            $sixteenth = App\Models\ConferenceContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.conferences.index') }}">{{ $sixteenth->{'page_name_' . $middleware_language} !== '' ? $sixteenth->{'page_name_' . $middleware_language} : $sixteenth->page_name_en }}</a>
                    </li>
                    <li>
                        @php
                            $seventeenth = App\Models\TvContent::find(1);
                        @endphp
                        <a href="{{ route('frontend.gpni-tv') }}">{{ $seventeenth->{'page_name_' . $middleware_language} !== '' ? $seventeenth->{'page_name_' . $middleware_language} : $seventeenth->page_name_en }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom d-flex justify-content-center align-content-center">
        <div class="footer-bottom-content">
            <img src="{{ asset('storage/frontend/pin-icon.svg') }}" alt="Map Icon">
            USA &nbsp; • &nbsp; Copyright © 2024 by GPNi&reg; Corporation Limited. All Rights Reserved &nbsp; •
            &nbsp;
            <a href="{{ route('frontend.our-policies') }}">Privacy Policy</a>
            &nbsp; • &nbsp;
            <a href="{{ route('frontend.faqs') }}">FAQs</a>
        </div>
    </div>
</div>