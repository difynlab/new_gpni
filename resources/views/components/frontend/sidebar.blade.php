<div class="col-12 col-md-3 sidebar">
    <div class="sidebar-profile-card">
        <div class="sidebar-profile-container">

            @if($student->image)
                <img src="{{ asset('storage/backend/persons/students/' . $student->image) }}" class="profile-img" alt="Profile Image">
            @else
                <img src="{{ asset('storage/frontend/sample-profile-image.svg') }}" class="profile-img" alt="Profile Image">
            @endif

            <div class="sidebar-edit-icon">
                <img src="{{ asset('storage/frontend/edit-icon.svg') }}" alt="Edit">
            </div>
        </div>
        <h2>{{ $student->first_name . ' ' . $student->last_name}}</h2>
        <p>
            <img src="{{ asset('storage/frontend/location-icon.svg') }}" class="location-icon" alt="Location" width="24"height="24">
            {{ $student->country }}
        </p>
    </div>

    <a href="{{ route('frontend.dashboard.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/profile-icon.svg') }}" alt="Profile icon" width="28" height="28">
            <span>Dashboard</span>
        </div>
    </a>

    <a href="{{ route('frontend.profile.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'profile' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/profile-icon.svg') }}" alt="Profile icon" width="28" height="28">
            <span>Student Profile</span>
        </div>
    </a>

    <a href="{{ route('frontend.courses.index') }}" class="sidebar-link">
        <div class="sidebar-item  {{ Request::segment(1) == 'courses' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/course-icon.svg') }}" alt="Courses icon" width="28" height="28">
            <span>Courses</span>
        </div>
    </a>

    <a href="{{ route('frontend.qualifications') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'qualifications' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/qualification-icon.svg') }}" alt="Qualifications icon" width="28" height="28">
            <span>Qualifications</span>
        </div>
    </a>

    <a href="{{ route('frontend.my-storage') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'my-storage' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/study-tool-icon.svg') }}" alt="Study Tools icon" width="28" height="28">
            <span>My Storage</span>
        </div>
    </a>

    <a href="{{ route('frontend.buy-study-materials') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'buy-study-materials' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/buy-study-material-icon.png') }}" alt="Buy Study Material icon" width="28" height="28">
            <span>Buy Study Material</span>
        </div>
    </a>

    @if(auth()->user()->member =='Yes' )
        <a href="{{ route('frontend.member-corner') }}" class="sidebar-link">
            <div class="sidebar-item {{ Request::segment(1) == 'member-corner' ? 'active' : '' }}">
                <img src="{{ asset('storage/frontend/profile-icon.svg') }}" alt="Member COrner" width="28" height="28">
                <span>Member Corner</span>
            </div>
        </a>
    @endif

    <a href="{{ route('frontend.ask-questions.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'ask-questions' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/ask-question-icon.svg') }}" alt="Ask the Experts icon" width="28" height="28">
            <span>Ask the Experts</span>
        </div>
    </a>

    <a href="{{ route('frontend.technical-supports.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'technical-supports' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/ask-question-icon.svg') }}" alt="Technical Supports icon" width="28" height="28">
            <span>Technical Supports</span>
        </div>
    </a>

    <a href="{{ route('frontend.refer-friends.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'refer-friends' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/referral-point-icon.svg') }}" alt="Referral Points icon" width="28" height="28">
            <span>Refer Friends</span>
        </div>
    </a>
</div>