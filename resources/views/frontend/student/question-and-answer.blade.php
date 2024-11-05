@extends('frontend.layouts.app')

@section('title', 'Ask A Question')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/question-answer.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    
    <div class="d-flex flex-column flex-md-row dashboard-container">
        <div class="d-flex flex-column flex-md-row">
            <nav class="sidebar">
                <div class="profile-card">
                    <div class="profile-container">
                        <img src="/storage/frontend/ellipse-2.svg" class="profile-img" alt="Profile Image">
                        <div class="edit-icon">
                            <img src="/storage/frontend/akar-icons-edit.svg" alt="Edit">
                        </div>
                    </div>
                    <h2>Tim Stevens</h2>
                    <p>
                        <img src="/storage/frontend/dashicons-location.svg" class="location-icon" alt="Location" width="24"
                            height="24">
                        China
                    </p>
                </div>
                <a href="./studentProfile.html" class="sidebar-item">
                    <img src="/storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    Student Profile
                </a>
                <a href="./courseListView.html" class="sidebar-item">
                    <img src="/storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    Courses
                </a>
                <a href="./qualification.html" class="sidebar-item">
                    <img src="/storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    Qualifications
                </a>
                <a href="./studyMaterialMain.html" class="sidebar-item d-flex">
                    <img src="/storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    Study Tools
                    <img src="/storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24" class="ml-auto">
                </a>
                <a href="./studyMaterialPaymentPortal.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Buy Study Material
                </a>
                <a href="./members.Corner.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Members Corner
                </a>

                <a href="./askTheExpert.html" class="sidebar-item">
                    <img src="/storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    Ask the Experts
                </a>
                <a href="./referFriend.html" class="sidebar-item">
                    <img src="/storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    Referral Points
                </a>
            </nav>
        </div>

        <div class="col-md-9 main-content">
            <div class="container-main">
                <div class="header-section">
                    <h1>{{ $language_text['question_answer'] }}</h1>
                    <a href="{{ route('frontend.view-history') }}">
                        <img src="/storage/frontend/solar-history-linear.svg" class="icon-history" alt="History Icon" width="22" height="22">
                        {{ $language_text['return_to_history'] }}
                    </a>
                </div>

                <!-- Display Initial Question -->
                <div class="chat-message">
                    <img src="/storage/frontend/ellipse-3.svg" class="avatar" alt="User Avatar">
                    <div class="message">{{ $question->initial_message }}</div>
                </div>

                <!-- Loop through replies -->
                @foreach($replies as $reply)
                    @if($reply->replied_by == 1) <!-- Admin's reply -->
                        <div class="chat-message chat-message-reply">
                            <div class="message">{{ $reply->message }}</div>
                            <img src="/storage/frontend/ellipse-1.svg" class="avatar" alt="Admin Avatar">
                        </div>
                    @else <!-- User's reply -->
                        <div class="chat-message">
                            <img src="/storage/frontend/ellipse-3.svg" class="avatar" alt="User Avatar">
                            <div class="message">{{ $reply->message }}</div>
                        </div>
                    @endif
                @endforeach

                <!-- Message Input -->
                <div class="message-input">
                    <label for="leaveMessage" class="form-label">{{ $language_text['leave_message'] }}</label>
                    <textarea class="form-control" id="leaveMessage" rows="3" placeholder="{{ $language_text['continue_conversation'] }}"></textarea>
                    <button type="button" class="btn-send">{{ $language_text['send_message'] }}</button>
                </div>
            </div>
        </div>


    </div>


    </div>

@endsection


@push('after-scripts')
<script>
document.querySelector('.btn-send').addEventListener('click', function() {
    console.log("clicked");
    const message = document.querySelector('#leaveMessage').value;

    if (message.trim()) {
        // Perform an AJAX request to send the message
        axios.post('{{ route('frontend.send-reply') }}', {
            ask_question_id: {{ $question->id }},
            message: message
        })
        .then(response => {
            // Reload the page or append the new message to the chat
            location.reload();
        })
        .catch(error => {
            console.error(error);
        });
    }
});
</script>
@endpush