<div class="sidebar">
    <div class="p-2">
        <a href="{{ route('backend.dashboard.index') }}">
            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" alt="Logo" class="logo">
        </a>
    </div>

    <ul class="main-menu">
        <li class="main-menu-link">
            <a href="{{ route('backend.dashboard.index') }}">
                <img src="{{ asset('storage/backend/sidebar/dashboard.png') }}" alt="Icon">
                <span>Dashboard</span>
            </a>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                <span class="align-middle">Pages</span>
            </a>
        
            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.pages.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                        <span>Pages</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="#">
                        <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                        <span>Articles</span>
                    </a>

                    <ul class="sub-sub-menu">
                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.article-categories.index') }}">Article Categories</a>
                        </li>

                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.articles.index') }}">Articles</a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.conferences.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/conference.png') }}" alt="Icon">
                        <span>Conferences</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.faqs.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/faq.png') }}" alt="Icon">
                        <span>FAQs</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.podcasts.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/podcast.png') }}" alt="Icon">
                        <span>Podcasts</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="#">
                        <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                        <span>Policies</span>
                    </a>

                    <ul class="sub-sub-menu">
                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.policy-categories.index') }}">Policy Categories</a>
                        </li>

                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.policies.index') }}">Policies</a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.testimonials.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/testimonial.png') }}" alt="Icon">
                        <span>Testimonials</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.webinars.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/webinar.png') }}" alt="Icon">
                        <span>Webinars</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/course.png') }}" alt="Icon">
                <span>Courses</span>
            </a>

            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.courses.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/course.png') }}" alt="Icon">
                        <span>Courses</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="#">
                        <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                        <span>Results</span>
                    </a>

                    <ul class="sub-sub-menu">
                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.exam-results.module-exams') }}">Module Exams</a>
                        </li>

                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.exam-results.final-exams') }}">Final Exams</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                <span>Products</span>
            </a>
        
            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.product-categories.index') }}">
                        <span>Product Categories</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.products.index') }}">
                        <span>Products</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="{{ route('backend.medias.index') }}">
                <img src="{{ asset('storage/backend/sidebar/media.png') }}" alt="Icon">
                <span>Media</span>
            </a>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                <span>Purchases</span>
            </a>
        
            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.gift-card-purchases.index') }}">
                        <span>Gift Card Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.course-purchases.index') }}">
                        <span>Course Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.product-purchases.index') }}">
                        <span>Product Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.material-purchases.index') }}">
                        <span>Material Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.membership-purchases.index') }}">
                        <span>Membership Purchases</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                <span>Persons</span>
            </a>
        
            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.admins.index') }}">
                        <span>Admins</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.students.index') }}">
                        <span>Students</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.nutritionists.index') }}">
                        <span>Nutritionists</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.advisory-boards.index') }}">
                        <span>Advisory Boards</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.issn-partners.index') }}">
                        <span>ISSN Partners</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.global-education-partners.index') }}">
                        <span>Global Education Partners</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                <span>Communications</span>
            </a>
        
            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.contact-coaches.index') }}">
                        <span>Contact Coaches</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.ask-questions.index') }}">
                        <span>Ask Questions</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.connections.index') }}">
                        <span>Inquiries from Users</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.refer-friends.index') }}">
                        <span>Refer Friends</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.technical-supports.index') }}">
                        <span>Technical Supports</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.subscriptions.index') }}">
                        <span>Subscriptions</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                <span>Administrations</span>
            </a>
        
            <ul class="sub-menu">
                <li class="sub-menu-link">
                    <a href="{{ route('backend.settings.index') }}">
                        <span>Settings</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.my-profile.index') }}">
                        <span>My Profile</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>