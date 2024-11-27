<nav class="sidebar">
    <a href="{{ route('backend.dashboard.index') }}">
        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" alt="Logo" class="logo">
    </a>

    <div class="gradient-line"></div>

    <div class="scroll-bar">
        <ul class="components">
            <li>
                <a href="{{ route('backend.dashboard.index') }}" class="link {{ Request::segment(2) == 'dashboard' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/dashboard.png') }}" alt="Icon">
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.pages.index') }}" class="link {{ Request::segment(2) == 'pages' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                    <span>Pages</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.conferences.index') }}" class="link {{ Request::segment(2) == 'conferences' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/conference.png') }}" alt="Icon">
                    <span>Conferences</span>
                </a>
            </li>

            <div class="accordion" id="article-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#article-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                    <span>Articles</span>
                </button>

                <div id="article-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(2), ['article-categories', 'articles']) ? 'show' : '' }}" data-bs-parent="#article-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.article-categories.index') }}" class="link {{ Request::segment(2) == 'article-categories' ? 'active' : null }}">Article Categories</a></li>

                            <li><a href="{{ route('backend.articles.index') }}" class="link {{ Request::segment(2) == 'articles' ? 'active' : null }}">Articles</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <li>
                <a href="{{ route('backend.courses.index') }}" class="link {{ Request::segment(2) == 'courses' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/course.png') }}" alt="Icon">
                    <span>Courses</span>
                </a>
            </li>

            <div class="accordion" id="exam-result-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#exam-result-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                    <span>Results</span>
                </button>

                <div id="exam-result-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(3), ['module-exams', 'final-exams']) ? 'show' : '' }}" data-bs-parent="#exam-result-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.exam-results.module-exams') }}" class="link {{ Request::segment(3) == 'module-exams' ? 'active' : null }}">Module Exams</a></li>

                            <li><a href="{{ route('backend.exam-results.final-exams') }}" class="link {{ Request::segment(3) == 'final-exams' ? 'active' : null }}">Final Exams</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <li>
                <a href="{{ route('backend.promotions.index') }}" class="link {{ Request::segment(2) == 'promotions' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/promotion.png') }}" alt="Icon">
                    <span>Promotions</span>
                </a>
            </li>

            <div class="accordion" id="product-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#product-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                    <span>Products</span>
                </button>

                <div id="product-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(2), ['product-categories', 'products']) ? 'show' : '' }}" data-bs-parent="#product-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.product-categories.index') }}" class="link {{ Request::segment(2) == 'product-categories' ? 'active' : null }}">Product Categories</a></li>

                            <li><a href="{{ route('backend.products.index') }}" class="link {{ Request::segment(2) == 'products' ? 'active' : null }}">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <li>
                <a href="{{ route('backend.medias.index') }}" class="link {{ Request::segment(2) == 'medias' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/media.png') }}" alt="Icon">
                    <span>Medias</span>
                </a>
            </li>

            <div class="accordion" id="purchases-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#purchases-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                    <span>Purchases</span>
                </button>

                <div id="purchases-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(3), ['gift-card-purchases', 'course-purchases', 'product-purchases', 'material-purchases', 'membership-purchases']) ? 'show' : '' }}" data-bs-parent="#purchases-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.purchases.gift-card-purchases.index') }}" class="link {{ Request::segment(3) == 'gift-card-purchases' ? 'active' : null }}">Gift Card Purchases</a></li>

                            <li><a href="{{ route('backend.purchases.course-purchases.index') }}" class="link {{ Request::segment(3) == 'course-purchases' ? 'active' : null }}">Course Purchases</a></li>

                            <li><a href="{{ route('backend.purchases.product-purchases.index') }}" class="link {{ Request::segment(3) == 'product-purchases' ? 'active' : null }}">Product Purchases</a></li>

                            <li><a href="{{ route('backend.purchases.material-purchases.index') }}" class="link {{ Request::segment(3) == 'material-purchases' ? 'active' : null }}">Material Purchases</a></li>

                            <li><a href="{{ route('backend.purchases.membership-purchases.index') }}" class="link {{ Request::segment(3) == 'membership-purchases' ? 'active' : null }}">Membership Purchases</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion" id="Persons-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Persons-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                    <span>Persons</span>
                </button>

                <div id="Persons-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(3), ['admins', 'students', 'nutritionists', 'advisory-boards', 'issn-partners']) ? 'show' : '' }}" data-bs-parent="#Persons-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.persons.admins.index') }}" class="link {{ Request::segment(3) == 'admins' ? 'active' : null }}">Admins</a></li>

                            <li><a href="{{ route('backend.persons.students.index') }}" class="link {{ Request::segment(3) == 'students' ? 'active' : null }}">Students</a></li>

                            <li><a href="{{ route('backend.persons.nutritionists.index') }}" class="link {{ Request::segment(3) == 'nutritionists' ? 'active' : null }}">Nutritionists</a></li>

                            <li><a href="{{ route('backend.persons.advisory-boards.index') }}" class="link {{ Request::segment(3) == 'advisory-boards' ? 'active' : null }}">Advisory Boards</a></li>

                            <li><a href="{{ route('backend.persons.issn-partners.index') }}" class="link {{ Request::segment(3) == 'issn-partners' ? 'active' : null }}">ISSN Partners</a></li>

                            <li><a href="{{ route('backend.persons.global-education-partners.index') }}" class="link {{ Request::segment(3) == 'global-education-partners' ? 'active' : null }}">Global Education Partners</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion" id="policy-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policy-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                    <span>Policies</span>
                </button>

                <div id="policy-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(2), ['policy-categories', 'policies']) ? 'show' : '' }}" data-bs-parent="#policy-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.policy-categories.index') }}" class="link {{ Request::segment(2) == 'policy-categories' ? 'active' : null }}">Policy Categories</a></li>

                            <li><a href="{{ route('backend.policies.index') }}" class="link {{ Request::segment(2) == 'policies' ? 'active' : null }}">Policies</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <li>
                <a href="{{ route('backend.podcasts.index') }}" class="link {{ Request::segment(2) == 'podcasts' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/podcast.png') }}" alt="Icon">
                    <span>Podcasts</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.testimonials.index') }}" class="link {{ Request::segment(2) == 'testimonials' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/testimonial.png') }}" alt="Icon">
                    <span>Testimonials</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.webinars.index') }}" class="link {{ Request::segment(2) == 'webinars' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/webinar.png') }}" alt="Icon">
                    <span>Webinars</span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.faqs.index') }}" class="link {{ Request::segment(2) == 'faqs' ? 'active' : null }}">
                    <img src="{{ asset('storage/backend/sidebar/faq.png') }}" alt="Icon">
                    <span>FAQs</span>
                </a>
            </li>

            <div class="accordion" id="communications-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#communications-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                    <span>Communications</span>
                </button>

                <div id="communications-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(3), ['contact-coaches', 'ask-questions', 'connections', 'refer-friends', 'technical-supports']) ? 'show' : '' }}" data-bs-parent="#communications-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.communications.contact-coaches.index') }}" class="link {{ Request::segment(3) == 'contact-coaches' ? 'active' : null }}">Contact Coaches</a></li>

                            <li><a href="{{ route('backend.communications.ask-questions.index') }}" class="link {{ Request::segment(3) == 'ask-questions' ? 'active' : null }}">Ask Questions</a></li>

                            <li><a href="{{ route('backend.communications.connections.index') }}" class="link {{ Request::segment(3) == 'connections' ? 'active' : null }}">Connections</a></li>

                            <li><a href="{{ route('backend.communications.refer-friends.index') }}" class="link {{ Request::segment(3) == 'refer-friends' ? 'active' : null }}">Refer Friends</a></li>

                            <li><a href="{{ route('backend.communications.technical-supports.index') }}" class="link {{ Request::segment(3) == 'technical-supports' ? 'active' : null }}">Technical Supports</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion" id="administrations-accordion">
                <button class="link accordion-dropdown collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administrations-data-collapse">
                    <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                    <span>Administrations</span>
                </button>

                <div id="administrations-data-collapse" class="accordion-collapse collapse {{ in_array(Request::segment(2), ['settings', 'my-profile']) ? 'show' : '' }}" data-bs-parent="#administrations-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="{{ route('backend.settings.index') }}" class="link {{ Request::segment(2) == 'settings' ? 'active' : null }}">Settings</a></li>

                            <li><a href="{{ route('backend.my-profile.index') }}" class="link {{ Request::segment(2) == 'my-profile' ? 'active' : null }}">My Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </ul>
    </div>
</nav>