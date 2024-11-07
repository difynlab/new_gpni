<div class="container-xxl bg-white position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 py-3 py-lg-2 sticky-top">

        <a href="{{ route('frontend.homepage') }}" class="navbar-brand ps-2">
            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 justify-content-end">

                <a href="{{ route('frontend.homepage') }}" class="nav-item nav-link">Home</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="educationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Education</a>

                    <ul class="dropdown-menu" aria-labelledby="educationDropdown">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">International Courses</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('frontend.pne-level-1-course') }}">PNE Level 1 + SNS</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pne-level-2.html">PNE Level 2 Masters + CISSN</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.master-class') }}">Master Classes</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.history-of-gpni') }}">The History of GPNI</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.why-we-are-different') }}">Why We Are Different</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.advisory-board-and-expert-lectures') }}">Advisory Board & Expert Lectures</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.faqs') }}">FAQ</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.membership') }}">Membership</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.our-policies') }}">Our Policies</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="partnersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Partners</a>

                    <ul class="dropdown-menu" aria-labelledby="partnersDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.insurance-and-professional-membership') }}">Insurance & Professional Membership</a>
                            </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.global-education-partners') }}">Global Education Partners</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('frontend.issn-official-partners-and-affiliates') }}">ISSN Official Partners & Affiliates</a>
                        </li>
                    </ul>
                </li>

                <a href="{{ route('frontend.nutritionists') }}" class="nav-item nav-link">Nutritionists</a>

                <a href="#" class="nav-item nav-link">
                    <i class="bi bi-search"></i>
                </a>

                <a href="{{ route('frontend.cart') }}" class="nav-item nav-link position-relative">
                    <i class="bi bi-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">0</span>
                </a>

                <div class="nav-item">
                    @if(Auth::check())
                        <!-- If user is logged in, show "Logout" -->
                        <a href="{{ route('frontend.logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="btn btn-primary px-4">Logout</div>
                        </a>

                        <!-- Logout form (needed for the logout route to work) -->
                        <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- If user is not logged in, show "Login" -->
                        <a href="{{ route('frontend.login') }}" class="nav-link">
                            <div class="btn btn-primary px-4">Login</div>
                        </a>
                    @endif
                </div>

                @php
                    $selected_language = session('language', 'en');
                    $languages = [
                        'en' => 'English',
                        'zh' => 'Chinese',
                        'ja' => 'Japanese'
                    ];
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="flag-icon">
                            <img src="{{ asset('storage/frontend/flags/' . $selected_language . '.svg') }}" alt="{{ $languages[$selected_language] }} Flag" width="25px" height="18px">
                        </span>
                        <span>{{ $languages[$selected_language] }}</span>
                        <i class="bi bi-chevron-down" style="font-size: 0.7rem; color: black;"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        @foreach($languages as $code => $language)
                            <li>
                                <a class="dropdown-item d-flex align-items-center language-option" href="#" data-lang="{{ $code }}">
                                    <img src="{{ asset('storage/frontend/flags/' . $code . '.svg') }}" alt="{{ $language }} Flag" width="25px" height="18px" class="me-2">
                                    <span>{{ $language }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </div>
        </div>
    </nav>
</div>

@push('after-scripts')
    <script>
        document.querySelectorAll('.language-option').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                var lang = this.getAttribute('data-lang');
                var route = '{{ route("frontend.set-language") }}';
                csrfToken = '{{ csrf_token() }}';

                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        language: lang,
                        _token: csrfToken
                    },
                    success: function(data) {
                        if(data.success) {
                            location.reload();
                        }
                    },
                    error: function() {
                        alert('Error setting language!');
                    }
                });
            });
        });
    </script>
@endpush