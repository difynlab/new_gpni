@extends('backend.layouts.app')

@section('title', 'Reply Ask Question')

@section('content')

    <x-backend.breadcrumb page_name="Reply Ask Question"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.communications.ask-questions.update', $ask_question) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title text-center">{{ $ask_question->subject }}</p>

                <div class="row form-input justify-content-center">
                    <div class="col-8">
                        <div class="chat-box">
                            <div class="single-message user-single-message mb-3">
                                @if($user->image)
                                    <img src="{{ asset('storage/backend/persons/students/' . $user->image) }}" class="user-profile-image" alt="Profile Image">
                                @else
                                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_profile_image) }}" class="user-profile-image" alt="Profile Image">
                                @endif

                                <div>
                                    <p class="user-message">{{ $ask_question->initial_message }}</p>
                                    <p class="time">{{ $ask_question->time_difference }}</p>
                                </div>
                            </div>
                            

                            @foreach($ask_question_replies as $ask_question_reply)
                                @if($user->id == $ask_question_reply->replied_by)
                                    <div class="single-message user-single-message mb-3">
                                        @if($user->image)
                                            <img src="{{ asset('storage/backend/persons/students/' . $user->image) }}" class="user-profile-image" alt="Profile Image">
                                        @else
                                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_profile_image) }}" class="user-profile-image" alt="Profile Image">
                                        @endif
                                        
                                        <div>
                                            <p class="user-message">{{ $ask_question_reply->message }}</p>
                                            <p class="time">{{ $ask_question_reply->time_difference }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="single-message admin-single-message mb-3">
                                        <div>
                                            <p class="admin-message">{{ $ask_question_reply->message }}</p>
                                            <p class="time">{{ $ask_question_reply->time_difference }}</p>
                                        </div>

                                        @if(App\Models\User::find($ask_question_reply->replied_by)->image)
                                            <img src="{{ asset('storage/backend/persons/admins/' . App\Models\User::find($ask_question_reply->replied_by)->image) }}" class="admin-profile-image" alt="Profile Image">
                                        @else
                                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_profile_image) }}" class="admin-profile-image" alt="Profile Image">
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="row form-input justify-content-center">
                    <div class="col-8">
                        <div>
                            <label for="message" class="form-label">Message<span class="asterisk">*</span></label>
                            <textarea class="form-control" rows="3" id="message" name="message" value="{{ old('message') }}" placeholder="Message" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button m-auto">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            var chatBox = $('.chat-box');
            chatBox.scrollTop(chatBox[0].scrollHeight);
        });
    </script>
@endpush