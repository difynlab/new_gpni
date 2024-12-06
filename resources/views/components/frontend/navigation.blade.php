<div class="container-xxl bg-white position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 py-3 py-lg-2 sticky-top">

        <a href="{{ route('frontend.homepage') }}" class="navbar-brand ps-2">
            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" alt="Logo"
                class="img-fluid" style="max-height: 45px;">
        </a>

        @php
        $selected_language = session('language', 'en');
        $languages = [
        'en' => 'English',
        'zh' => 'Chinese',
        'ja' => 'Japanese'
        ];
        @endphp

        <div class="d-flex ms-auto d-lg-none align-items-center">
            <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle fs-20" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="flag-icon">
                        <img src="{{ asset('storage/frontend/flags/' . $selected_language . '.svg') }}"
                            alt="{{ $languages[$selected_language] }} Flag" class="img-fluid"
                            style="width: 25px; height: 18px; filter: drop-shadow(0px 1.665px 8.324px #B8BAC1);">
                    </span>
                    <i class="bi bi-chevron-down" style="font-size: 0.7rem; color: black;"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    @foreach($languages as $code => $language)
                    <li>
                        <a class="dropdown-item d-flex align-items-center language-option" href="#"
                            data-lang="{{ $code }}">
                            <img src="{{ asset('storage/frontend/flags/' . $code . '.svg') }}"
                                alt="{{ $language }} Flag" class="img-fluid me-2" style="width: 25px; height: 18px;">
                            <span>{{ $language }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="fa fa-bars"></span>
            </button>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-nav ms-auto py-0 justify-content-end">

                    <a href="{{ route('frontend.homepage') }}" class="nav-item nav-link fs-20">Home</a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-20" href="#" id="educationDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Education</a>

                        <ul class="dropdown-menu" aria-labelledby="educationDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" id="internationalCoursesDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    International Courses <i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="internationalCoursesDropdown">
                                    @php
                                    $languages = [
                                    'en' => 'English',
                                    'zh' => 'Chinese',
                                    'ja' => 'Japanese'
                                    ];

                                    $certificate_courses = App\Models\Course::where('language',
                                    $languages[$middleware_language])->where('type', 'Certification')->where('status',
                                    '1')->get();
                                    @endphp

                                    @if($certificate_courses->isNotEmpty())
                                    @foreach($certificate_courses as $certificate_course)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('frontend.certification-courses.show', $certificate_course) }}">{{
                                            $certificate_course->title }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('frontend.master-classes.index') }}">Master
                                    Classes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-20" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">About</a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ route('frontend.history-of-gpni') }}">The History of
                                    GPNI</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('frontend.why-we-are-different') }}">Why We Are
                                    Different</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('frontend.advisory-board-and-expert-lectures') }}">Advisory Board &
                                    Expert Lectures</a>
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
                        <a class="nav-link dropdown-toggle fs-20" href="#" id="partnersDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Partners</a>

                        <ul class="dropdown-menu" aria-labelledby="partnersDropdown">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('frontend.insurance-and-professional-membership') }}">Insurance &
                                    Professional Membership</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('frontend.global-education-partners') }}">Global
                                    Education Partners</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('frontend.issn-official-partners-and-affiliates') }}">ISSN Official
                                    Partners & Affiliates</a>
                            </li>
                        </ul>
                    </li>

                    <a href="{{ route('frontend.nutritionists.index') }}"
                        class="nav-item nav-link fs-20">Nutritionists</a>

                    <a href="#" class="nav-item nav-link fs-20">
                        <i class="bi bi-search"></i>
                    </a>

                    <a href="{{ route('frontend.carts.index') }}" class="nav-item nav-link fs-20">
                        <i class="bi bi-cart position-relative">
                            @if(auth()->check())
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">{{
                                App\Models\Cart::where('user_id', auth()->user()->id)->where('status',
                                'Active')->count()
                                }}</span>
                            @else
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">0</span>
                            @endif
                        </i>

                    </a>

                    <div class="nav-item dropdown">
                        @if(auth()->check())
                        @if(auth()->user()->role == 'student')
                        @if(auth()->user()->image)
                        <img src="{{ asset('storage/backend/persons/students/' . auth()->user()->image) }}" alt="Image"
                            class="profile-image img-fluid" data-bs-toggle="dropdown" aria-expanded="false">
                        @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"
                            alt="Image" class="profile-image img-fluid" data-bs-toggle="dropdown" aria-expanded="false">
                        @endif

                        <ul class="dropdown-menu" aria-labelledby="partnersDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('frontend.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('frontend.logout') }}">
                                    @csrf
                                    <a href="{{ route('frontend.logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                        @else
                        <a href="{{ route('backend.dashboard.index') }}" class="nav-link fs-20">
                            <div class="btn btn-primary btn-responsive">Dashboard</div>
                        </a>
                        @endif
                        @else
                        <a href="{{ route('frontend.login') }}" class="nav-link fs-20">
                            <div class="btn btn-primary btn-responsive fs-20 px-4">Login</div>
                        </a>
                    @endif
                </div>

                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle fs-20" href="#" id="languageDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="flag-icon">
                                <img src="{{ asset('storage/frontend/flags/' . $selected_language . '.svg') }}"
                                    alt="{{ $languages[$selected_language] }} Flag" class="img-fluid"
                                    style="width: 25px; height: 18px; filter: drop-shadow(0px 1.665px 8.324px #B8BAC1);">
                            </span>
                            <i class="bi bi-chevron-down" style="font-size: 0.7rem; color: black;"></i>
                        </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        @foreach($languages as $code => $language)
                            <li>
                                <a class="dropdown-item d-flex align-items-center language-option" href="#"
                                    data-lang="{{ $code }}">
                                    <img src="{{ asset('storage/frontend/flags/' . $code . '.svg') }}"
                                        alt="{{ $language }} Flag" class="img-fluid me-2"
                                        style="width: 25px; height: 18px;">
                                    <span>{{ $language }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');

            dropdownSubmenus.forEach(function (submenu) {
                submenu.addEventListener('mouseover', function () {
                    const subMenuDropdown = submenu.querySelector('.dropdown-menu');
                    subMenuDropdown.classList.add('show');
                });

                submenu.addEventListener('mouseleave', function () {
                    const subMenuDropdown = submenu.querySelector('.dropdown-menu');
                    subMenuDropdown.classList.remove('show');
                });
            });
        });
    </script>
@endpush