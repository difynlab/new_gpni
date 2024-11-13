@extends('backend.layouts.app')

@section('title', 'Pages')

@section('content')

    <x-backend.breadcrumb page_name="Pages"></x-backend.breadcrumb>
        
    <div class="static-pages">
        <div class="row">
            <div class="col-12">
                <p class="table-title">Pages</p>
                <p class="table-sub-title">All the list of pages</p>
                <table class="table w-100 table-borderless">
                    <tbody>
                        <tr>
                            <td>Home Page</td>
                            <td>
                                <a href="{{ route('backend.pages.homepage.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.homepage.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.homepage.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Why we are different</td>
                            <td>
                                <a href="{{ route('backend.pages.why-we-are-different.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.why-we-are-different.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.why-we-are-different.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>History of GPNi</td>
                            <td>
                                <a href="{{ route('backend.pages.history-of-gpni.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.history-of-gpni.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.history-of-gpni.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Gift Card</td>
                            <td>
                                <a href="{{ route('backend.pages.gift-card.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.gift-card.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.gift-card.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Advisory Board and Expert Lectures</td>
                            <td>
                                <a href="{{ route('backend.pages.advisory-board-and-expert-lectures.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.advisory-board-and-expert-lectures.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.advisory-board-and-expert-lectures.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>ISSN Official Partners and Affiliates</td>
                            <td>
                                <a href="{{ route('backend.pages.issn-official-partners-and-affiliates.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.issn-official-partners-and-affiliates.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.issn-official-partners-and-affiliates.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>FAQ</td>
                            <td>
                                <a href="{{ route('backend.pages.faq.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.faq.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.faq.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Our Policies</td>
                            <td>
                                <a href="{{ route('backend.pages.our-policies.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.our-policies.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.our-policies.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Insurance & Professional Membership</td>
                            <td>
                                <a href="{{ route('backend.pages.insurance-professional-membership.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.insurance-professional-membership.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.insurance-professional-membership.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Global Education Partner</td>
                            <td>
                                <a href="{{ route('backend.pages.global-education-partner.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.global-education-partner.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.global-education-partner.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Article</td>
                            <td>
                                <a href="{{ route('backend.pages.article.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.article.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.article.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Conference</td>
                            <td>
                                <a href="{{ route('backend.pages.conference.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.conference.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.conference.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Podcast</td>
                            <td>
                                <a href="{{ route('backend.pages.podcast.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.podcast.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.podcast.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Membership</td>
                            <td>
                                <a href="{{ route('backend.pages.membership.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.membership.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.membership.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Contact Us</td>
                            <td>
                                <a href="{{ route('backend.pages.contact-us.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.contact-us.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.contact-us.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Nutritionist</td>
                            <td>
                                <a href="{{ route('backend.pages.nutritionist.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.nutritionist.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.nutritionist.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Tv</td>
                            <td>
                                <a href="{{ route('backend.pages.tv.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.tv.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.tv.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Master Class</td>
                            <td>
                                <a href="{{ route('backend.pages.master-class.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.master-class.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.master-class.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection