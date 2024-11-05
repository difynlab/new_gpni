@extends('frontend.layouts.app')

@section('title', 'Refer A Friend')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/refer-friend.css') }}">
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
                    <h1>{{ $translatedText['title'] }}</h1>
                </div>
                <form method="POST" action="{{ route('frontend.send-invite') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="emailAddress" class="form-label">{{ $translatedText['email_label'] }}</label>
                        <input type="email" class="form-control" id="emailAddress" name="email"
                            placeholder="{{ $translatedText['email_placeholder'] }}">
                    </div>
                    
                    <button type="submit" class="btn btn-submit">{{ $translatedText['submit_button'] }}</button>

                    <hr>
                    <a href="#" class="view-history" onclick="toggleHistory()">
                        <img src="/storage/frontend/solar-history-linear.svg" class="icon-history" alt="History Icon" width="22" height="22">
                        {{ $translatedText['view_history'] }}
                    </a>
                </form>
                
                <div id="showHistory" style="display:none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email Address</th>
                            </tr>
                        </thead>
                        <tbody id="historyTableBody">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    </div>

@endsection


@push('after-scripts')
<script>
function toggleHistory() {
    var historyDiv = document.getElementById('showHistory');
    if (historyDiv.style.display === "none") {
        fetch('/get-history')
            .then(response => response.json())
            .then(data => {
                let tbody = document.getElementById('historyTableBody');
                tbody.innerHTML = '';
                data.forEach((invite, index) => {
                    let row = `<tr>
                                <td>${index + 1}</td>
                                <td>${invite.email}</td>
                               </tr>`;
                    tbody.innerHTML += row;
                });
            });
        historyDiv.style.display = "block";
    } else {
        historyDiv.style.display = "none";
    }
}
</script>
@endpush