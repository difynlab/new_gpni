@extends('frontend.layouts.app')

@section('title', 'Members Corner')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/my-storage.css') }}">
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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="header">Memers Corner</div>
                    <button class="btn add-new-button" data-toggle="modal" data-target="#newUploadModal" hidden>
                        <img src="/storage/frontend/ic-round-add.svg" alt="Add" style="width: 20px; height: 20px" class="mr-2">
                        Add New
                    </button>
                </div>
                
                <!-- Navigation for filtering media types -->
                <nav class="mb-3">
                    <ul class="tabs nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'All' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'All']) }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'Image' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'Image']) }}">Image</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'Video' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'Video']) }}">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'Vimeo Video Link' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'Vimeo Video Link']) }}">Vimeo Video Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'PDF' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'PDF']) }}">PDF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'Word' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'Word']) }}">Word</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'Excel' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'Excel']) }}">Excel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'PPT' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'PPT']) }}">PPT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterType == 'Audio' ? 'active' : '' }}" href="{{ route('frontend.members-corner', ['type' => 'Audio']) }}">Audio</a>
                        </li>
                        <!-- Add other media types here -->
                    </ul>
                </nav>
                
                <!-- Table displaying the filtered media -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description/Item details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medias as $media)
                            <tr>
                                <td>{{ $media->id }}</td>
                                <td>{{ $media->name }}</td>
                                <td>
                                    @if($media->type == 'Image')
                                        <img src="{{ asset('storage/backend/medias/' . $media->image) }}" alt="{{ $media->name }}" style="width: 100px">
                                    @elseif($media->type == 'Video')
                                        <a href="{{ asset('storage/backend/medias/' . $media->video) }}" target="_blank">View Video</a>
                                    @elseif($media->type == 'Vimeo Video Link')
                                        <a href="{{ $media->vimeo_video_link }}" target="_blank">Watch on Vimeo</a>
                                    @elseif($media->type == 'PDF')
                                        <a href="{{ asset('storage/backend/medias/' . $media->pdf) }}" target="_blank">View PDF</a>
                                    @elseif($media->type == 'Word')
                                        <a href="{{ asset('storage/backend/medias/' . $media->word) }}" target="_blank">Download Word</a>
                                    @elseif($media->type == 'Excel')
                                        <a href="{{ asset('storage/backend/medias/' . $media->excel) }}" target="_blank">Download Excel</a>
                                    @elseif($media->type == 'PPT')
                                        <a href="{{ asset('storage/backend/medias/' . $media->ppt) }}" target="_blank">Download PPT</a>
                                    @elseif($media->type == 'Audio')
                                        <audio controls>
                                            <source src="{{ asset('storage/backend/medias/' . $media->audio) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination mt-3">
                    <div class="pagination-details">
                        Showing {{ $medias->firstItem() }} to {{ $medias->lastItem() }} of {{ $medias->total() }} entries
                    </div>
                    <div class="pagination-links">
                    {{ $medias->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div class="modal fade" id="newUploadModal" tabindex="-1" aria-labelledby="newUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUploadModalLabel">New Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" class="form-control">
                                <option value="" disabled selected>Choose the appropriate type</option>
                                <!-- Other options go here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter the name of the item">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="d-flex">
                                <input type="file" class="form-control" placeholder="Choose Image" style="flex: 1;">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                                    data-target="#fileUploadModal">
                                    <img src="/storage/frontend/ei-image.svg" alt="Upload">
                                    Upload
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="fileUploadModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <div class="header">File Upload</div>
                    <div class="upload-section">
                        <img src="/storage/frontend/upload-icon.svg" alt="Upload Icon" class="upload-icon">
                        <div class="upload-text">Drag and drop files here</div>
                        <div class="divider">
                            <div>or</div>
                        </div>
                        <button type="button" class="btn btn-primary browse-button" data-dismiss="modal"
                            data-toggle="modal" data-target="#successModal">
                            Browse File
                        </button>
                        <div class="file-size-text">Maximum file size is 200MB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="successModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <!-- Success Icon -->
                    <img src="/storage/frontend/https-lottiefiles-com-animations-successful-5-n-3-ar-jk-i-ou.svg"
                        alt="Success Icon" width="124" height="124">
                    <div class="header">Successfully Added</div>
                    <div class="subtext">New item has been added successfully</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <!-- The Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="header">Are you sure?</div>
                    <div class="subtext">This action will permanently erase all details</div>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="cancel-button" data-dismiss="modal">Cancel</button>
                        <button type="button" class="delete-button" data-toggle="modal" data-target="#deletedModal">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="deletedModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <div class="header">Successfully Deleted</div>
                    <div class="subtext">Item has been deleted successfully</div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection