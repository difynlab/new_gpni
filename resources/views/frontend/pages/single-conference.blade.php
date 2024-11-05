@extends('frontend.layouts.app')

@section('title', 'Conference Details')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/single_conference.css') }}">
@endpush

@section('content')
    <div class="container mt-5 pt-5">
        <div class="main-container">
            <section class="container-shadow">
                <div class="event-title-wrapper">
                    <div class="title-container">
                        <img src="/storage/frontend/ooui-previous-rtl.svg" alt="Arrow Left" class="title-arrow">
                        <div class="event-title-container">
                            <h1 class="event-title">
                                <span>{{ $conference->title }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container-shadow">
                <div class="table-container">
                    <img src="/storage/frontend/table.svg" alt="Table">
                </div>
                <!-- NO TABLE COLUMNs FOR LABLE TEXT -->
                <div class="event-info-container">
                    <div class="event-info-row">
                        <div class="event-info-title">Date</div>
                        <div class="event-info-value">{{ $conference->date }}</div>
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title">Where</div>
                        <div class="event-info-value">{{ $conference->where }}</div>
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title event-info-warning-title">Early Registration Deadline</div>
                        <div class="event-info-value event-info-warning-value">{{ $conference->early_registration_deadline }}</div>
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title">Speaker</div>
                        <div class="event-info-value">Amishi Jha, Ph.D.</div>
                        <!-- NO TABLE COLUMN FOR SPEAKER -->
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-value event-info-long-value">{{ $conference->more_details }}</div>
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title">Applicable for</div>
                        <div class="event-info-value">Anyone interested in sports neuroscience</div>
                        <!-- NO TABLE COLUMN FOR Applicable for -->
                    </div>
                    <div class="event-info-row">
                        <div class="event-info-title">Related Link</div>
                        <div class="event-info-value">
                            <a class="event-info-link" href="#">Click Here for the Conference Program</a>
                            <!-- NO TABLE COLUMN FOR Related Link -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="container-shadow">
                <h1 class="get-in-touch-header">Get in Touch</h1>
                <div class="form-container">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" placeholder="Question">
                        </div>
                        <button type="submit" class="btn-submit">Submit</button>
                    </form>
                </div>
                <div class="contact-info">
                    <div class="contact-info-row">
                        <div class="info-item">
                            <div class="icon-background">
                                <img src="/storage/frontend/mdi-email-outline.svg" alt="Email Icon">
                            </div>
                            <div class="info-item-content">
                                <p class="title">Email</p>
                                <p class="info">info@thegpni.com</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon-background">
                                <img src="/storage/frontend/solar-phone-linear.svg" alt="Phone Icon">
                            </div>
                            <div class="info-item-content">
                                <p class="title">Phone</p>
                                <p class="info">+1 907 555 1234</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon-background">
                                <img src="/storage/frontend/la-fax.svg" alt="Fax Icon">
                            </div>
                            <div class="info-item-content">
                                <p class="title">Fax</p>
                                <p class="info">+1 907 555 1234</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> 
    </div>
@endsection