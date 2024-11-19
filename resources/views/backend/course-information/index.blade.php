@extends('backend.layouts.app')

@section('title', 'Course Information')

@section('content')

    <x-backend.breadcrumb page_name="Course Information"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.courses.information.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @if($course->type == 'Certification')
                <div class="section">
                    <p class="inner-page-title">Section 2</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="certification_section_2_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_2_title" name="certification_section_2_title" value="{{ $course->certification_section_2_title ?? '' }}" placeholder="Title">
                            </div>

                            <div class="mb-4">
                                <label for="certification_section_2_description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="certification_section_2_description" name="certification_section_2_description" value="{{ $course->certification_section_2_description ?? '' }}" placeholder="Description">
                            </div>

                            <div class="mb-4">
                                <x-backend.upload-image old_name="old_certification_section_2_image" old_value="{{ $course->certification_section_2_image ?? '' }}" new_name="new_certification_section_2_image" path="courses/course-images"></x-backend.upload-image>
                                <x-backend.input-error field="new_certification_section_2_image"></x-backend.input-error>
                            </div>

                            <div class="form-input">
                                <div class="row align-items-center mb-2">
                                    <div class="col-9">
                                        <label class="form-label mb-0">Points</label>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button" class="add-row-button add-section-2-row-button">
                                            <i class="bi bi-plus-lg"></i>
                                            Add More
                                        </button>
                                    </div>
                                </div>
                                
                                @if($course->certification_section_2_points)
                                    @foreach(json_decode($course->certification_section_2_points) as $certification_section_2_point)
                                        <div class="row single-item mt-2 align-items-center">
                                            <div class="col-11">
                                                <textarea class="editor ckeditor-initialized" name="certification_section_2_points[]" placeholder="Point" value="{{ $certification_section_2_point }}">{{ $certification_section_2_point }}</textarea>
                                            </div>

                                            <div class="col-1 d-flex align-items-center">
                                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 3</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="certification_section_3_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_3_title" name="certification_section_3_title" value="{{ $course->certification_section_3_title ?? '' }}" placeholder="Title">
                            </div>

                            <div class="form-input">
                                <div class="row align-items-center mb-2">
                                    <div class="col-9">
                                        <label class="form-label mb-0">Points</label>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button" class="add-row-button add-section-3-row-button">
                                            <i class="bi bi-plus-lg"></i>
                                            Add More
                                        </button>
                                    </div>
                                </div>
                                
                                @if($course->certification_section_3_points)
                                    @foreach(json_decode($course->certification_section_3_points) as $certification_section_3_point)
                                        <div class="row single-item mt-2 align-items-center">
                                            <div class="col-8">
                                                <textarea class="form-control textarea" name="old_certification_section_3_point_descriptions[]" rows="5" placeholder="Description" value="{{ $certification_section_3_point->description }}">{{ $certification_section_3_point->description }}</textarea>
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <input type="hidden" name="old_certification_section_3_point_files[]" value="{{ $certification_section_3_point->image }}">

                                                <img src="{{ asset('storage/backend/courses/course-images/' . $certification_section_3_point->image) }}" alt="Image" class="add-more-image">

                                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <x-backend.input-error field="certification_section_3_point_files.*"></x-backend.input-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 4</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div>
                                <x-backend.upload-video old_name="old_certification_section_4_video" old_value="{{ $course->certification_section_4_video ?? '' }}" new_name="new_certification_section_4_video" path="courses/course-videos"></x-backend.upload-video>
                                <x-backend.input-error field="new_certification_section_4_video"></x-backend.input-error>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 5</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="certification_section_5_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_5_title" name="certification_section_5_title" value="{{ $course->certification_section_5_title ?? '' }}" placeholder="Title">
                            </div>

                            <div class="mb-4">
                                <label for="certification_section_5_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="certification_section_5_description" name="certification_section_5_description" rows="5" value="{{ $course->certification_section_5_description ?? '' }}">{{ $course->certification_section_5_description ?? '' }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="certification_section_5_description" class="form-label">Rating</label>
                                <select class="form-control form-select" name="certification_section_5_rating">
                                    <option value="">Select Rating</option>
                                    <option value="1" {{ $course->certification_section_5_rating == '1' ? "selected" : "" }}>1</option>
                                    <option value="2" {{ $course->certification_section_5_rating == '2' ? "selected" : "" }}>2</option>
                                    <option value="3" {{ $course->certification_section_5_rating == '3' ? "selected" : "" }}>3</option>
                                    <option value="4" {{ $course->certification_section_5_rating == '4' ? "selected" : "" }}>4</option>
                                    <option value="5" {{ $course->certification_section_5_rating == '5' ? "selected" : "" }}>5</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="certification_section_5_content" class="form-label">Content</label>
                                <textarea class="form-control textarea" id="certification_section_5_content" name="certification_section_5_content" rows="5" value="{{ $course->certification_section_5_content ?? '' }}">{{ $course->certification_section_5_content ?? '' }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="certification_section_5_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="certification_section_5_name" name="certification_section_5_name" value="{{ $course->certification_section_5_name ?? '' }}" placeholder="Name">
                            </div>

                            <div>
                                <label for="certification_section_5_designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="certification_section_5_designation" name="certification_section_5_designation" value="{{ $course->certification_section_5_designation ?? '' }}" placeholder="Designation">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 6</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="certification_section_6_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_6_title" name="certification_section_6_title" value="{{ $course->certification_section_6_title ?? '' }}" placeholder="Title">
                            </div>

                            <div class="mb-4">
                                <label for="certification_section_6_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="certification_section_6_description" name="certification_section_6_description" rows="5" value="{{ $course->certification_section_6_description ?? '' }}">{{ $course->certification_section_6_description ?? '' }}</textarea>
                            </div>

                            <div class="form-input">
                                <div class="row align-items-center mb-2">
                                    <div class="col-9">
                                        <label class="form-label mb-0">Teams</label>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button" class="add-row-button add-section-6-row-button">
                                            <i class="bi bi-plus-lg"></i>
                                            Add More
                                        </button>
                                    </div>
                                </div>
                                
                                @if($course->certification_section_6_teams)
                                    @foreach(json_decode($course->certification_section_6_teams) as $certification_section_6_team)
                                        <div class="row single-item mt-2 align-items-center">
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="old_certification_section_6_team_names[]" value="{{ $certification_section_6_team->name }}" placeholder="Name">
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <input type="hidden" name="old_certification_section_6_team_files[]" value="{{ $certification_section_6_team->image }}">

                                                <img src="{{ asset('storage/backend/courses/course-images/' . $certification_section_6_team->image) }}" alt="Image" class="add-more-image">

                                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <x-backend.input-error field="certification_section_3_point_files.*"></x-backend.input-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 7</p>

                    <div class="row form-input">
                        <div class="col-6 left-column">
                            <div class="mb-4">
                                <label for="certification_section_7_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_7_title" name="certification_section_7_title" value="{{ $course->certification_section_7_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="certification_section_7_description" class="form-label">Description</label>
                                <textarea class="editor" id="certification_section_7_description" name="certification_section_7_description" value="{{ $course->certification_section_7_description ?? '' }}">{{ $course->certification_section_7_description ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-6 right-column">
                            <x-backend.upload-video old_name="old_certification_section_7_video" old_value="{{ $course->certification_section_7_video ?? '' }}" new_name="new_certification_section_7_video" path="courses/course-videos" class="side-box-uploader"></x-backend.upload-video>
                            <x-backend.input-error field="new_certification_section_7_video"></x-backend.input-error>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input type="text" class="form-control mb-3" name="certification_section_7_button_labels[]" placeholder="Label" value="{{ json_decode($course->certification_section_7_labels_links)[0]->label ?? '' }}">

                            <input type="text" class="form-control" name="certification_section_7_button_labels[]" placeholder="Label" value="{{ json_decode($course->certification_section_7_labels_links)[1]->label ?? '' }}">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input type="url" class="form-control mb-3" name="certification_section_7_button_links[]" placeholder="Link" value="{{ json_decode($course->certification_section_7_labels_links)[0]->link ?? '' }}">

                            <input type="url" class="form-control" name="certification_section_7_button_links[]" placeholder="Link" value="{{ json_decode($course->certification_section_7_labels_links)[1]->link ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 9</p>

                    <div class="row form-input">
                        <div class="col-6 left-column">
                            <x-backend.upload-image old_name="old_certification_section_9_image" old_value="{{ $course->certification_section_9_image ?? '' }}" new_name="new_certification_section_9_image" path="courses/course-images" class="side-box-uploader"></x-backend.upload-image>
                            <x-backend.input-error field="new_certification_section_9_image"></x-backend.input-error>
                        </div>

                        <div class="col-6 right-column">
                            <div>
                                <label for="certification_section_9_content" class="form-label">Content</label>
                                <textarea class="editor" id="certification_section_9_content" name="certification_section_9_content" value="{{ $course->certification_section_9_content ?? '' }}">{{ $course->certification_section_9_content ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 10</p>

                    <div class="row form-input">
                        <div class="col-6 right-column">
                            <div>
                                <label for="certification_section_10_content" class="form-label">Content</label>
                                <textarea class="editor" id="certification_section_10_content" name="certification_section_10_content" value="{{ $course->certification_section_10_content ?? '' }}">{{ $course->certification_section_10_content ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-6 left-column">
                            <x-backend.upload-video old_name="old_certification_section_10_video" old_value="{{ $course->certification_section_10_video ?? '' }}" new_name="new_certification_section_10_video" path="courses/course-videos" class="side-box-uploader"></x-backend.upload-video>
                            <x-backend.input-error field="new_certification_section_10_video"></x-backend.input-error>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="certification_section_10_button_label" value="{{ json_decode($course->certification_section_10_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="certification_section_10_button_link" value="{{ json_decode($course->certification_section_10_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label mb-0">Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-section-10-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                                
                        @if($course->certification_section_10_points)
                            @foreach(json_decode($course->certification_section_10_points) as $certification_section_10_point)
                                <div class="row single-item mt-2 align-items-center">
                                    <div class="col">
                                        <input type="text" class="form-control" name="certification_section_10_point_titles[]" value="{{ $certification_section_10_point->title }}" placeholder="Title">
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control textarea" name="certification_section_10_point_descriptions[]" rows="5" placeholder="Description" value="{{ $certification_section_10_point->description }}">{{ $certification_section_10_point->description }}</textarea>
                                    </div>
                                    <div class="col-1">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 11</p>

                    <div class="row form-input">
                        <div class="col-6 right-column">
                            <div>
                                <label for="certification_section_11_content" class="form-label">Content</label>
                                <textarea class="editor" id="certification_section_11_content" name="certification_section_11_content" value="{{ $course->certification_section_11_content ?? '' }}">{{ $course->certification_section_11_content ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-6 left-column">
                            <x-backend.upload-video old_name="old_certification_section_11_video" old_value="{{ $course->certification_section_11_video ?? '' }}" new_name="new_certification_section_11_video" path="courses/course-videos" class="side-box-uploader"></x-backend.upload-video>
                            <x-backend.input-error field="new_certification_section_11_video"></x-backend.input-error>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="certification_section_11_button_label" value="{{ json_decode($course->certification_section_11_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="certification_section_11_button_link" value="{{ json_decode($course->certification_section_11_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 12</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div>
                                <label for="certification_section_12_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_12_title" name="certification_section_12_title" value="{{ $course->certification_section_12_title ?? '' }}" placeholder="Title">
                            </div>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="certification_section_12_button_label" value="{{ json_decode($course->certification_section_12_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="certification_section_12_button_link" value="{{ json_decode($course->certification_section_12_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 13</p>

                    <div class="row form-input">
                        <div class="col-12 mb-4">
                            <div class="mb-4">
                                <label for="certification_section_13_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_13_title" name="certification_section_13_title" value="{{ $course->certification_section_13_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="certification_section_13_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="certification_section_13_description" name="certification_section_13_description" rows="5" value="{{ $course->certification_section_13_description ?? '' }}">{{ $course->certification_section_13_description ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="certification_section_13_first_column" class="form-label">First Column Title</label>
                            <input type="text" class="form-control" name="certification_section_13_first_column" value="{{ $course->certification_section_13_first_column ?? '' }}" placeholder="First Column Title">
                        </div>

                        <div class="col-4">
                            <label for="certification_section_13_second_column" class="form-label">Second Column Title</label>
                            <input type="text" class="form-control" name="certification_section_13_second_column" value="{{ $course->certification_section_13_second_column ?? '' }}" placeholder="Second Column Title">
                        </div>

                        <div class="col-4">
                            <label for="certification_section_13_third_column" class="form-label">Third Column Title</label>
                            <input type="text" class="form-control" name="certification_section_13_third_column" value="{{ $course->certification_section_13_third_column ?? '' }}" placeholder="Third Column Title">
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label mb-0">Table Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-section-13-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                                
                        @if($course->certification_section_13_table_points)
                            @foreach(json_decode($course->certification_section_13_table_points) as $certification_section_13_table_point)
                                <div class="row single-item mt-2 align-items-center">
                                    <div class="col">
                                        <input type="text" class="form-control" name="certification_section_13_table_first_points[]" value="{{ $certification_section_13_table_point->first }}" placeholder="Value">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="certification_section_13_table_second_points[]" value="{{ $certification_section_13_table_point->second }}" placeholder="Value">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="certification_section_13_table_third_points[]" value="{{ $certification_section_13_table_point->third }}" placeholder="Value">
                                    </div>
                                    <div class="col-1">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input type="text" class="form-control mb-3" name="certification_section_13_button_labels[]" placeholder="Label" value="{{ json_decode($course->certification_section_13_labels_links)[0]->label ?? '' }}">

                            <input type="text" class="form-control" name="certification_section_13_button_labels[]" placeholder="Label" value="{{ json_decode($course->certification_section_13_labels_links)[1]->label ?? '' }}">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input type="url" class="form-control mb-3" name="certification_section_13_button_links[]" placeholder="Link" value="{{ json_decode($course->certification_section_13_labels_links)[0]->link ?? '' }}">

                            <input type="url" class="form-control" name="certification_section_13_button_links[]" placeholder="Link" value="{{ json_decode($course->certification_section_13_labels_links)[1]->link ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 14</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div>
                                <label for="certification_section_14_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_14_title" name="certification_section_14_title" value="{{ $course->certification_section_14_title ?? '' }}" placeholder="Title">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 15</p>

                    <div class="row form-input">
                        <div class="col-6 right-column">
                            <div class="mb-4">
                                <label for="certification_section_15_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_15_title" name="certification_section_15_title" value="{{ $course->certification_section_15_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="certification_section_15_content" class="form-label">Content</label>
                                <textarea class="editor" id="certification_section_15_content" name="certification_section_15_content" value="{{ $course->certification_section_15_content ?? '' }}">{{ $course->certification_section_15_content ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-6 left-column">
                            <x-backend.upload-video old_name="old_certification_section_15_video" old_value="{{ $course->certification_section_15_video ?? '' }}" new_name="new_certification_section_15_video" path="courses/course-videos" class="side-box-uploader"></x-backend.upload-video>
                            <x-backend.input-error field="new_certification_section_15_video"></x-backend.input-error>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="certification_section_15_button_label" value="{{ json_decode($course->certification_section_15_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="certification_section_15_button_link" value="{{ json_decode($course->certification_section_15_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label mb-0">Points</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-section-15-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                                
                        @if($course->certification_section_15_points)
                            @foreach(json_decode($course->certification_section_15_points) as $certification_section_15_point)
                                <div class="row single-item mt-2 align-items-center">
                                    <div class="col">
                                        <input type="text" class="form-control" name="certification_section_15_point_titles[]" value="{{ $certification_section_15_point->title }}" placeholder="Title">
                                    </div>
                                    <div class="col">
                                        <textarea class="form-control textarea" name="certification_section_15_point_descriptions[]" rows="5" placeholder="Description" value="{{ $certification_section_15_point->description }}">{{ $certification_section_15_point->description }}</textarea>
                                    </div>
                                    <div class="col-1">
                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 16</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="certification_section_16_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="certification_section_16_title" name="certification_section_16_title" value="{{ $course->certification_section_16_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="certification_section_16_content" class="form-label">Description</label>
                                <textarea class="editor" id="certification_section_16_content" name="certification_section_16_content" value="{{ $course->certification_section_16_content ?? '' }}">{{ $course->certification_section_16_content ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input type="text" class="form-control mb-3" name="certification_section_16_button_labels[]" placeholder="Label" value="{{ json_decode($course->certification_section_16_labels_links)[0]->label ?? '' }}">

                            <input type="text" class="form-control" name="certification_section_16_button_labels[]" placeholder="Label" value="{{ json_decode($course->certification_section_16_labels_links)[1]->label ?? '' }}">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input type="url" class="form-control mb-3" name="certification_section_16_button_links[]" placeholder="Link" value="{{ json_decode($course->certification_section_16_labels_links)[0]->link ?? '' }}">

                            <input type="url" class="form-control" name="certification_section_16_button_links[]" placeholder="Link" value="{{ json_decode($course->certification_section_16_labels_links)[1]->link ?? '' }}">
                        </div>
                    </div>
                </div>
            @else
                <div class="section">
                    <p class="inner-page-title">Section 2</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="master_section_2_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_2_title" name="master_section_2_title" value="{{ $course->master_section_2_title ?? '' }}" placeholder="Title">
                            </div>

                            <div class="mb-4">
                                <label for="master_section_2_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="master_section_2_description" name="master_section_2_description" value="{{ $course->master_section_2_description ?? '' }}" rows="5" placeholder="Description">{{ $course->master_section_2_description ?? '' }}</textarea>
                            </div>

                            <div>
                                <div class="form-input">
                                    <div class="row align-items-center mb-2">
                                        <div class="col-9">
                                            <label class="form-label mb-0">Points</label>
                                        </div>
                                        <div class="col-3 text-end">
                                            <button type="button" class="add-row-button add-master-section-2-row-button">
                                                <i class="bi bi-plus-lg"></i>
                                                Add More
                                            </button>
                                        </div>
                                    </div>
                                    
                                    @if($course->master_section_2_points)
                                        @foreach(json_decode($course->master_section_2_points) as $master_section_2_point)
                                            <div class="row single-item mt-2 align-items-center">
                                                <div class="col-10">
                                                    <textarea class="form-control textarea" name="master_section_2_points[]" rows="5" placeholder="Description" value="{{ $master_section_2_point }}">{{ $master_section_2_point }}</textarea>
                                                </div>
                                                <div class="col-2 d-flex align-items-center">
                                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <x-backend.input-error field="certification_section_3_point_files.*"></x-backend.input-error>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <p class="inner-page-title">Section 3</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="master_section_3_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_3_title" name="master_section_3_title" value="{{ $course->master_section_3_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="master_section_3_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="master_section_3_description" name="master_section_3_description" value="{{ $course->master_section_3_description ?? '' }}" rows="5" placeholder="Description">{{ $course->master_section_3_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="master_section_3_button_label" value="{{ json_decode($course->master_section_3_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="master_section_3_button_link" value="{{ json_decode($course->master_section_3_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 4</p>

                    <div class="row form-input">
                        <div class="col-6 left-column">
                            <x-backend.upload-image old_name="old_master_section_4_image" old_value="{{ $course->master_section_4_image ?? '' }}" new_name="new_master_section_4_image" path="courses/course-images" class="side-box-uploader"></x-backend.upload-image>
                            <x-backend.input-error field="new_master_section_4_image"></x-backend.input-error>
                        </div>

                        <div class="col-6 right-column">
                            <div>
                                <label for="master_section_4_content" class="form-label">Content</label>
                                <textarea class="editor" id="master_section_4_content" name="master_section_4_content" value="{{ $course->master_section_4_content ?? '' }}">{{ $course->master_section_4_content ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="master_section_4_button_label" value="{{ json_decode($course->master_section_4_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="master_section_4_button_link" value="{{ json_decode($course->master_section_4_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 5</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div>
                                <label for="master_section_5_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_5_title" name="master_section_5_title" value="{{ $course->master_section_5_title ?? '' }}" placeholder="Title">
                            </div>
                        </div>
                    </div>

                    <div class="row form-input">
                        <div class="col-3">
                            <label class="form-label">Button Label</label>

                            <input class="form-control" type="text" name="master_section_5_button_label" value="{{ json_decode($course->master_section_5_label_link)->label ?? '' }}" placeholder="Label">
                        </div>

                        <div class="col-9">
                            <label class="form-label">Link</label>

                            <input class="form-control" type="text" name="master_section_5_button_link" value="{{ json_decode($course->master_section_5_label_link)->link ?? '' }}" placeholder="Link">
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 6</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="master_section_6_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_6_title" name="master_section_6_title" value="{{ $course->master_section_6_title ?? '' }}" placeholder="Title">
                            </div>

                            <div class="mb-4">
                                <label for="master_section_6_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="master_section_6_description" name="master_section_6_description" value="{{ $course->master_section_6_description ?? '' }}" rows="5" placeholder="Description">{{ $course->master_section_6_description ?? '' }}</textarea>
                            </div>

                            <div>
                                <label for="master_section_6_content" class="form-label">Content</label>
                                <textarea class="editor" id="master_section_6_content" name="master_section_6_content" value="{{ $course->master_section_6_content ?? '' }}">{{ $course->master_section_6_content ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 7</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div>
                                <label for="master_section_7_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_7_title" name="master_section_7_title" value="{{ $course->master_section_7_title ?? '' }}" placeholder="Title">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 8</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="master_section_8_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_8_title" name="master_section_8_title" value="{{ $course->master_section_8_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="master_section_8_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="master_section_8_description" name="master_section_8_description" value="{{ $course->master_section_8_description ?? '' }}" rows="5" placeholder="Description">{{ $course->master_section_8_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label">Video/s</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button add-master-videos">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>

                        @if($course->master_section_8_videos)
                            @foreach(json_decode($course->master_section_8_videos) as $master_section_8_video)
                                <div class="row single-item mt-2 align-items-center">
                                    <div class="col-10">
                                        <video class="video-player" src="{{ asset('storage/backend/courses/course-video/' . $master_section_8_video) }}" controls></video>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <input type="hidden" name="old_master_section_8_video_files[]" value="{{ $master_section_8_video }}">

                                        <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="row mt-2">
                            <div class="col-12">
                                <x-backend.input-error field="video_files.*"></x-backend.input-error>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 9</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="master_section_9_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_9_title" name="master_section_9_title" value="{{ $course->master_section_9_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="master_section_9_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="master_section_9_description" name="master_section_9_description" value="{{ $course->master_section_9_description ?? '' }}" rows="5" placeholder="Description">{{ $course->master_section_9_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <p class="inner-page-title">Section 10</p>

                    <div class="row form-input">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="master_section_10_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="master_section_10_title" name="master_section_10_title" value="{{ $course->master_section_10_title ?? '' }}" placeholder="Title">
                            </div>

                            <div>
                                <label for="master_section_10_description" class="form-label">Description</label>
                                <textarea class="form-control textarea" id="master_section_10_description" name="master_section_10_description" value="{{ $course->master_section_10_description ?? '' }}" rows="5" placeholder="Description">{{ $course->master_section_10_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-section-2-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                                <div class="col-11">
                                    <textarea class="editor" name="certification_section_2_points[]" placeholder="Point"></textarea>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>

                            </div>`;

            const $newRow = $(this).closest('.row').parent().append(html);

            $newRow.find('.editor').each((index, element) => {
                if(!element.classList.contains('ckeditor-initialized')) {
                    ClassicEditor
                        .create(element)
                        .then(new_editor => {
                            element.classList.add('ckeditor-initialized');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });

        $('.add-master-section-2-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col-11">
                                <textarea class="form-control textarea" name="master_section_2_points[]" rows="5" placeholder="Point"></textarea>
                            </div>
                            <div class="col-1 d-flex">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-section-3-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col-8">
                                <textarea class="form-control textarea" name="certification_section_3_point_descriptions[]" rows="5" placeholder="Description"></textarea>
                                <x-backend.input-error field="certification_section_3_point_files.*"></x-backend.input-error>
                            </div>
                            <div class="col-4 d-flex">
                                <input type="file" class="form-control" name="certification_section_3_point_files[]" accept="image/*">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-section-6-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col-8">
                                <input type="text" class="form-control" name="certification_section_6_team_names[]" placeholder="Name">
                                <x-backend.input-error field="certification_section_6_team_files.*"></x-backend.input-error>
                            </div>
                            <div class="col-4 d-flex">
                                <input type="file" class="form-control" name="certification_section_6_team_files[]" accept="image/*">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-section-10-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col">
                                <input type="text" class="form-control" name="certification_section_10_point_titles[]" placeholder="Title">
                            </div>
                            <div class="col">
                                <textarea class="form-control textarea" name="certification_section_10_point_descriptions[]" rows="5" placeholder="Description"></textarea>
                            </div>
                            <div class="col-1">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-section-13-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col">
                                <input type="text" class="form-control" name="certification_section_13_table_first_points[]" placeholder="Value">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="certification_section_13_table_second_points[]" placeholder="Value">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="certification_section_13_table_third_points[]" placeholder="Value">
                            </div>
                            <div class="col-1">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-section-15-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col">
                                <input type="text" class="form-control" name="certification_section_15_point_titles[]" placeholder="Title">
                            </div>
                            <div class="col">
                                <textarea class="form-control textarea" name="certification_section_15_point_descriptions[]" rows="5" placeholder="Description"></textarea>
                            </div>
                            <div class="col-1">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-master-videos').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                            <div class="col-11">
                                <input type="file" class="form-control" name="master_section_8_video_files[]" accept="video/*">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush