@extends('frontend.layouts.app')

@section('title', 'Reply Ask Question')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/ask-reply-questions.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">
                    <div class="header-section">
                        <h1>Question & Answer</h1>
                        <a href="{{ route('frontend.ask-questions.histories') }}">
                            <img src="{{ asset('storage/frontend/history-clock-icon.svg') }}" class="icon-history" alt="History Icon" width="22" height="22">
                            Return to History
                        </a>
                    </div>

                    <div class="row form-input justify-content-center">
                        <div class="col-12">
                            <div class="chat-box">
                                <div class="single-message student-single-message mb-3">
                                    <div>
                                        <p class="student-message">{{ $ask_question->initial_message }}</p>
                                        <p class="time">{{ $ask_question->time_difference }}</p>
                                    </div>

                                    @if($student->image)
                                        <img src="{{ asset('storage/backend/persons/students/' . $student->image) }}" class="student-profile-image" alt="Profile Image">
                                    @else
                                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_profile_image) }}" class="student-profile-image" alt="Profile Image">
                                    @endif
                                </div>
                                

                                @foreach($ask_question_replies as $ask_question_reply)
                                    @if($student->id == $ask_question_reply->replied_by)
                                        <div class="single-message student-single-message mb-3">
                                            <div>
                                                <p class="student-message">{{ $ask_question_reply->message }}</p>
                                                <p class="time">{{ $ask_question_reply->time_difference }}</p>
                                            </div>

                                            @if($student->image)
                                                <img src="{{ asset('storage/backend/persons/students/' . $student->image) }}" class="student-profile-image" alt="Profile Image">
                                            @else
                                                <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_profile_image) }}" class="student-profile-image" alt="Profile Image">
                                            @endif
                                        </div>
                                    @else
                                        <div class="single-message admin-single-message mb-3">
                                            @if(App\Models\User::find($ask_question_reply->replied_by)->image)
                                                <img src="{{ asset('storage/backend/persons/admins/' . App\Models\User::find($ask_question_reply->replied_by)->image) }}" class="admin-profile-image" alt="Profile Image">
                                            @else
                                                <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_profile_image) }}" class="admin-profile-image" alt="Profile Image">
                                            @endif

                                            <div>
                                                <p class="admin-message">{{ $ask_question_reply->message }}</p>
                                                <p class="time">{{ $ask_question_reply->time_difference }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('frontend.ask-questions.update', $ask_question) }}" method="POST">
                        @csrf
                        <div class="message-input">
                            <label for="message" class="form-label">Leave Message</label>
                            <textarea class="form-control textarea" id="message" rows="3" name="message" placeholder="Continue the conversation by leaving a message" required></textarea>
                            <button type="submit" class="btn-send">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection