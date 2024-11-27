<div class="footer">
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-md-4 text-start">
                <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->footer_logo) }}" alt="GPNi" style="width: 286px; margin-bottom: 20px;">
                <p>Powered by <img src="{{ asset('storage/frontend/powered-by-white.svg') }}" alt="Power Logo" style="width: 20px;"></p>
            </div>

            <div class="col-md-4 text-start">
                <div class="footer-title">Get in touch with us</div>

                <div class="d-flex flex-wrap justify-content-start">
                    <a href="#" class="social-icon">
                        <img src="{{ asset('storage/frontend/instagram.svg') }}" alt="Instagram" width="12" height="13">
                        Instagram
                    </a>
                    <a href="#" class="social-icon">
                        <img src="{{ asset('storage/frontend/facebook.svg') }}" alt="Facebook" width=" 8" height="15" ;>
                        Facebook
                    </a>
                    <a href="#" class="social-icon">
                        <img src="{{ asset('storage/frontend/youtube.svg') }}" alt="YouTube" width="15" height="10">
                        Youtube
                    </a>
                    <a href="#" class="social-icon">
                        <img src="{{ asset('storage/frontend/twitter.svg') }}" alt="Twitter" width="12" height="12">
                        Twitter
                    </a>
                    <a href="#" class="social-icon">
                        <img src="{{ asset('storage/frontend/linkedin.svg') }}" alt="LinkedIn" width="13" height="12">
                        LinkedIn
                    </a>
                </div>
            </div>

            <div class="col-md-4 text-start">
                <div class="footer-title">Get the latest from us</div>

                <div class="subscribe-form pb-3">
                    <div class="d-flex flex-column flex-md-row align-items-md-center">
                        <input type="text" class="form-control subscribe-input flex-grow-1 mb-3 mb-md-0 mr-md-3" placeholder="Enter email address">
                        <button class="btn subscribe-button">Subscribe</button>
                    </div>
                </div>
                <div>
                    <a href="#"><img src="{{ asset('storage/frontend/app-store.svg') }}" alt="App Store" style="width: 120px; margin-right: 10px;"></a>
                    <a href="#"><img src="{{ asset('storage/frontend/play-store.svg') }}" alt="Google Play" style="width: 120px;"></a>
                </div>
            </div>
        </div>
        
        <div class="row pt-5">
            <div class="col-lg-3 list-of-items">
                <h5>About</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('frontend.history-of-gpni') }}">History Of GPNi&reg;</a></li>
                    <li><a href="{{ route('frontend.why-we-are-different') }}">Why We Are Different</a></li>
                    <li><a href="{{ route('frontend.advisory-board-and-expert-lectures') }}">Advisory Board & Lectures</a></li>
                    <li><a href="{{ route('frontend.membership') }}">Membership</a></li>
                    <li><a href="{{ route('frontend.nutritionists.index') }}">Nutritionists</a></li>
                    <li><a href="{{ route('frontend.products.index') }}">Products</a></li>
                    <li><a href="{{ route('frontend.our-policies') }}">Policies</a></li>

                </ul>
            </div>
            <div class="col-lg-3 list-of-items">
                <h5>Education</h5>
                <ul class="list-unstyled">
                    <li><a href="#">PNE Level 1 + SNS</a></li>
                    <li><a href="#">PNE Level 2 Masters + CISSN</a></li>
                    <li><a href="{{ route('frontend.master-classes.index') }}">Master Classes</a></li>
                    <li><a href="#">PNE Level 1 With ISSN-SNS</a></li>
                    <li><a href="#">PNE Level 2 With ISSN-CISSN</a></li>
                    <!-- <li><a href="#">Small Courses & Seminars</a></li> -->
                    <li><a href="{{ route('frontend.contact-us.index') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3 list-of-items">
                <h5>Partners</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('frontend.insurance-and-professional-membership') }}">Insurance & Professional Membership</a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.global-education-partners') }}">Global Education Partners</a>
                        </li>
                    <li>
                        <a href="{{ route('frontend.issn-official-partners-and-affiliates') }}">Issn&reg; Official Partners & Affiliates</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 list-of-items">
                <h5>Other Resources</h5>
                <ul class="list-unstyled">
                    <!-- <li><a href="#">Promotion</a></li> -->
                    <li><a href="{{ route('frontend.gift-cards.index') }}">Gift Cards</a></li>
                    <li><a href="{{ route('frontend.articles.index') }}">Articles</a></li>
                    <li><a href="{{ route('frontend.podcasts.index') }}">Podcasts</a></li>
                    <li><a href="{{ route('frontend.conferences.index') }}">Conferences</a></li>
                    <li><a href="{{ route('frontend.gpni-tv') }}">GPNi TV & E News</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom d-flex justify-content-center align-content-center">
        <div class="footer-bottom-content">
            <img src="{{ asset('storage/frontend/pin-icon.svg') }}" alt="Map Icon">
            USA &nbsp; • &nbsp; Copyright © 2023 by GPNi&reg; Corporation Limited. All Rights Reserved &nbsp; •
            &nbsp;
            <a href="{{ route('frontend.our-policies') }}">Privacy Policy</a>
            &nbsp; • &nbsp;
            <a href="{{ route('frontend.faqs') }}">FAQs</a>
        </div>
    </div>
</div>