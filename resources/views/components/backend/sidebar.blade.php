<div class="sidebar">
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
                            <a href="{{ route('backend.article-categories.index') }}">
                                <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                <span>Article Categories</span>
                            </a>
                        </li>

                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.articles.index') }}">
                                <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                <span>Articles</span>
                            </a>
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
                            <a href="{{ route('backend.policy-categories.index') }}">
                                <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                                <span>Policy Categories</span>
                            </a>
                        </li>

                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.policies.index') }}">
                                <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                                <span>Policies</span>
                            </a>
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
                            <a href="{{ route('backend.exam-results.module-exams') }}">
                                <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                <span>Module Exams</span>
                            </a>
                        </li>

                        <li class="sub-sub-menu-link">
                            <a href="{{ route('backend.exam-results.final-exams') }}">
                                <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                <span>Final Exams</span>
                            </a>
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
                        <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                        <span>Product Categories</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.products.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
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
                        <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                        <span>Gift Card Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.course-purchases.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                        <span>Course Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.product-purchases.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                        <span>Product Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.material-purchases.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                        <span>Material Purchases</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.membership-purchases.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
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
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                        <span>Admins</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.students.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                        <span>Students</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.nutritionists.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                        <span>Nutritionists</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.advisory-boards.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                        <span>Advisory Boards</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.issn-partners.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                        <span>ISSN Partners</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.global-education-partners.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
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
                        <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                        <span>Contact Coaches</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.ask-questions.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                        <span>Ask Questions</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.connections.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                        <span>Inquiries from Users</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.refer-friends.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                        <span>Refer Friends</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.technical-supports.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                        <span>Technical Supports</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.communications.subscriptions.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
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
                        <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                        <span>Settings</span>
                    </a>
                </li>

                <li class="sub-menu-link">
                    <a href="{{ route('backend.my-profile.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                        <span>My Profile</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>