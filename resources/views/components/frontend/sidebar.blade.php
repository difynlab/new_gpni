<button class="sidebar-toggle" id="sidebarToggle">
    <img src="{{ asset('storage/frontend/sidebar.png') }}" alt="Toggle Menu">
</button>

<div class="col-12 col-lg-4 sidebar" id="sidebar">
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
        <h2 class="fs-31">{{ $student->first_name . ' ' . $student->last_name}}</h2>
        <p class="fs-20">
            <img src="{{ asset('storage/frontend/location-icon.svg') }}" class="location-icon" alt="Location" width="24"height="24">
            {{ $student->country }}
        </p>
    </div>

    <a href="{{ route('frontend.dashboard.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/dashboard-icon.svg') }}" alt="Profile icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_dashboard }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.profile.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'profile' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/profile-icon.svg') }}" alt="Profile icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_student_profile }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.courses.index') }}" class="sidebar-link">
        <div class="sidebar-item  {{ Request::segment(1) == 'courses' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/course-icon.svg') }}" alt="Courses icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_courses }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.qualifications') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'qualifications' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/qualification-icon.svg') }}" alt="Qualifications icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_qualifications }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.my-storage') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'my-storage' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/study-tool-icon.svg') }}" alt="Study Tools icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_my_storage }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.buy-study-materials') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'buy-study-materials' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/buy-study-material-icon.svg') }}" alt="Buy Study Material icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_buy_study_material }}</span>
        </div>
    </a>

    @if(
            (auth()->user()->member == 'Yes' && auth()->user()->member_type == "Lifetime")
            ||
            (auth()->user()->member == 'Yes' && auth()->user()->member_type == "Annual" && auth()->user()->member_annual_expiry_date >= Carbon\Carbon::now()->toDateString())
        )
        <a href="{{ route('frontend.member-corner') }}" class="sidebar-link">
            <div class="sidebar-item {{ Request::segment(1) == 'member-corner' ? 'active' : '' }}">
                <img src="{{ asset('storage/frontend/profile-icon.svg') }}" alt="Member COrner" width="28" height="28">
                <span class="fs-25">{{ $student_dashboard_contents->sidebar_member_corner }}</span>
            </div>
        </a>
    @endif

    <a href="{{ route('frontend.ask-questions.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'ask-questions' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/ask-question-icon.svg') }}" alt="Ask the Experts icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_ask_the_experts }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.technical-supports.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'technical-supports' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/technical-support-icon.svg') }}" alt="Technical Supports icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_technical_supports }}</span>
        </div>
    </a>

    <a href="{{ route('frontend.refer-friends.index') }}" class="sidebar-link">
        <div class="sidebar-item {{ Request::segment(1) == 'refer-friends' ? 'active' : '' }}">
            <img src="{{ asset('storage/frontend/referral-point-icon.svg') }}" alt="Referral Points icon" width="28" height="28">
            <span class="fs-25">{{ $student_dashboard_contents->sidebar_refer_friends }}</span>
        </div>
    </a>
</div>

@push('after-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    
    // Toggle sidebar
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
    });

    // Close sidebar when clicking outside
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });
});
</script>
@endpush