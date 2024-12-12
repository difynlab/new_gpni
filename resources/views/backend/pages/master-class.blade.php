@extends('backend.layouts.app')

@section('title', 'Master Class')

@section('content')

    <x-backend.breadcrumb page_name="Master Class"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.master-class.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                        </div>

                        <div>
                            <label for="single_master_class_page_name_{{ $short_code }}" class="form-label">Single Page Name</label>
                            <input type="text" class="form-control" id="single_master_class_page_name_{{ $short_code }}" name="single_master_class_page_name_{{ $short_code }}" value="{{ $contents->{'single_master_class_page_name_' . $short_code} ?? '' }}" placeholder="Single Page Name">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero section)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="section_1_sub_title_{{ $short_code }}" name="section_1_sub_title_{{ $short_code }}" value="{{ $contents->{'section_1_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_1_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control textarea" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" rows="5" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_1_search_{{ $short_code }}" class="form-label">Search</label>
                            <input type="text" class="form-control" id="section_1_search_{{ $short_code }}" name="section_1_search_{{ $short_code }}" value="{{ $contents->{'section_1_search_' . $short_code} ?? '' }}" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="section_2_first_tab_{{ $short_code }}" class="form-label">First Tab</label>
                            <input type="text" class="form-control" id="section_2_first_tab_{{ $short_code }}" name="section_2_first_tab_{{ $short_code }}" value="{{ $contents->{'section_2_first_tab_' . $short_code} ?? '' }}" placeholder="First Tab">
                        </div>

                        <div class="mb-4">
                            <label for="section_2_second_tab_{{ $short_code }}" class="form-label">Second Tab</label>
                            <input type="text" class="form-control" id="section_2_second_tab_{{ $short_code }}" name="section_2_second_tab_{{ $short_code }}" value="{{ $contents->{'section_2_second_tab_' . $short_code} ?? '' }}" placeholder="Second Tab">
                        </div>

                        <div>
                            <label for="section_2_learn_{{ $short_code }}" class="form-label">Learn</label>
                            <input type="text" class="form-control" id="section_2_learn_{{ $short_code }}" name="section_2_learn_{{ $short_code }}" value="{{ $contents->{'section_2_learn_' . $short_code} ?? '' }}" placeholder="Learn">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="section_2_enroll_{{ $short_code }}" class="form-label">Enroll</label>
                            <input type="text" class="form-control" id="section_2_enroll_{{ $short_code }}" name="section_2_enroll_{{ $short_code }}" value="{{ $contents->{'section_2_enroll_' . $short_code} ?? '' }}" placeholder="Enroll">
                        </div>

                        <div class="mb-4">
                            <label for="section_2_no_all_courses_{{ $short_code }}" class="form-label">No All Courses</label>
                            <input type="text" class="form-control" id="section_2_no_all_courses_{{ $short_code }}" name="section_2_no_all_courses_{{ $short_code }}" value="{{ $contents->{'section_2_no_all_courses_' . $short_code} ?? '' }}" placeholder="No All Courses">
                        </div>

                        <div>
                            <label for="section_2_no_upcoming_courses_{{ $short_code }}" class="form-label">No Upcoming Courses</label>
                            <input type="text" class="form-control" id="section_2_no_upcoming_courses_{{ $short_code }}" name="section_2_no_upcoming_courses_{{ $short_code }}" value="{{ $contents->{'section_2_no_upcoming_courses_' . $short_code} ?? '' }}" placeholder="No Upcoming Courses">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label mb-0">Points</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>
                            
                            @if($contents->{'section_3_points_' . $short_code})
                                @foreach(json_decode($contents->{'section_3_points_' . $short_code}) as $section_3_point)
                                    <div class="row single-item mt-2 align-items-center">
                                        <div class="col-8">
                                            <textarea class="form-control textarea" name="old_section_3_point_descriptions[]" rows="5" placeholder="Description" value="{{ $section_3_point->description }}">{{ $section_3_point->description }}</textarea>
                                        </div>
                                        <div class="col-4 d-flex align-items-center">
                                            <input type="hidden" name="old_section_3_point_files[]" value="{{ $section_3_point->image }}">

                                            <img src="{{ asset('storage/backend/courses/course-images/' . $section_3_point->image) }}" alt="Image" class="add-more-image">

                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mt-2">
                                <div class="col-12">
                                    <x-backend.input-error field="section_3_point_files.*"></x-backend.input-error>
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
                        <div class="mb-4">
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_4_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control textarea" id="section_4_description_{{ $short_code }}" name="section_4_description_{{ $short_code }}" rows="5" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <x-backend.upload-video old_name="old_section_4_video" old_value="{{ $contents->{'section_4_video_' . $short_code} ?? '' }}" new_name="new_section_4_video" path="pages"></x-backend.upload-video>
                            <x-backend.input-error field="new_section_4_video"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_5_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_5_title_{{ $short_code }}" name="section_5_title_{{ $short_code }}" value="{{ $contents->{'section_5_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_5_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control textarea" id="section_5_description_{{ $short_code }}" name="section_5_description_{{ $short_code }}" rows="5" value="{{ $contents->{'section_5_description_' . $short_code} ?? '' }}">{{ $contents->{'section_5_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Common Words</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="course_duration_{{ $short_code }}" class="form-label">Course Duration</label>
                            <input type="text" class="form-control" id="course_duration_{{ $short_code }}" name="course_duration_{{ $short_code }}" value="{{ $contents->{'course_duration_' . $short_code} ?? '' }}" placeholder="Course Duration">
                        </div>

                        <div class="mb-4">
                            <label for="language_{{ $short_code }}" class="form-label">Language</label>
                            <input type="text" class="form-control" id="language_{{ $short_code }}" name="language_{{ $short_code }}" value="{{ $contents->{'language_' . $short_code} ?? '' }}" placeholder="Language">
                        </div>

                        <div class="mb-4">
                            <label for="course_type_{{ $short_code }}" class="form-label">Course Type</label>
                            <input type="text" class="form-control" id="course_type_{{ $short_code }}" name="course_type_{{ $short_code }}" value="{{ $contents->{'course_type_' . $short_code} ?? '' }}" placeholder="Course Type">
                        </div>

                        <div class="mb-4">
                            <label for="no_of_modules_{{ $short_code }}" class="form-label">No of Modules</label>
                            <input type="text" class="form-control" id="no_of_modules_{{ $short_code }}" name="no_of_modules_{{ $short_code }}" value="{{ $contents->{'no_of_modules_' . $short_code} ?? '' }}" placeholder="No of Modules">
                        </div>

                        <div class="mb-4">
                            <label for="no_of_students_enrolled_{{ $short_code }}" class="form-label">No of Students Enrolled</label>
                            <input type="text" class="form-control" id="no_of_students_enrolled_{{ $short_code }}" name="no_of_students_enrolled_{{ $short_code }}" value="{{ $contents->{'no_of_students_enrolled_' . $short_code} ?? '' }}" placeholder="No of Students Enrolled">
                        </div>

                        <div class="mb-4">
                            <label for="by_{{ $short_code }}" class="form-label">By</label>
                            <input type="text" class="form-control" id="by_{{ $short_code }}" name="by_{{ $short_code }}" value="{{ $contents->{'by_' . $short_code} ?? '' }}" placeholder="By">
                        </div>

                        <div class="mb-4">
                            <label for="already_purchased_{{ $short_code }}" class="form-label">Already Purchased</label>
                            <input type="text" class="form-control" id="already_purchased_{{ $short_code }}" name="already_purchased_{{ $short_code }}" value="{{ $contents->{'already_purchased_' . $short_code} ?? '' }}" placeholder="Already Purchased">
                        </div>

                        <div class="mb-4">
                            <label for="enroll_now_{{ $short_code }}" class="form-label">Enroll Now</label>
                            <input type="text" class="form-control" id="enroll_now_{{ $short_code }}" name="enroll_now_{{ $short_code }}" value="{{ $contents->{'enroll_now_' . $short_code} ?? '' }}" placeholder="Enroll Now">
                        </div>

                        <div class="mb-4">
                            <label for="login_for_enroll_{{ $short_code }}" class="form-label">Login for Enroll</label>
                            <input type="text" class="form-control" id="login_for_enroll_{{ $short_code }}" name="login_for_enroll_{{ $short_code }}" value="{{ $contents->{'login_for_enroll_' . $short_code} ?? '' }}" placeholder="Login for Enroll">
                        </div>

                        <div class="mb-4">
                            <label for="first_tab_{{ $short_code }}" class="form-label">First Tab</label>
                            <input type="text" class="form-control" id="first_tab_{{ $short_code }}" name="first_tab_{{ $short_code }}" value="{{ $contents->{'first_tab_' . $short_code} ?? '' }}" placeholder="First Tab">
                        </div>

                        <div class="mb-4">
                            <label for="second_tab_{{ $short_code }}" class="form-label">Second Tab</label>
                            <input type="text" class="form-control" id="second_tab_{{ $short_code }}" name="second_tab_{{ $short_code }}" value="{{ $contents->{'second_tab_' . $short_code} ?? '' }}" placeholder="Second Tab">
                        </div>

                        <div>
                            <label for="stars_{{ $short_code }}" class="form-label">Stars</label>
                            <input type="text" class="form-control" id="stars_{{ $short_code }}" name="stars_{{ $short_code }}" value="{{ $contents->{'stars_' . $short_code} ?? '' }}" placeholder="Stars">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="third_tab_{{ $short_code }}" class="form-label">Third Tab</label>
                            <input type="text" class="form-control" id="third_tab_{{ $short_code }}" name="third_tab_{{ $short_code }}" value="{{ $contents->{'third_tab_' . $short_code} ?? '' }}" placeholder="Third Tab">
                        </div>

                        <div class="mb-4">
                            <label for="fourth_tab_{{ $short_code }}" class="form-label">Fourth Tab</label>
                            <input type="text" class="form-control" id="fourth_tab_{{ $short_code }}" name="fourth_tab_{{ $short_code }}" value="{{ $contents->{'fourth_tab_' . $short_code} ?? '' }}" placeholder="Fourth Tab">
                        </div>

                        <div class="mb-4">
                            <label for="first_language_{{ $short_code }}" class="form-label">First Language</label>
                            <input type="text" class="form-control" id="first_language_{{ $short_code }}" name="first_language_{{ $short_code }}" value="{{ $contents->{'first_language_' . $short_code} ?? '' }}" placeholder="First Language">
                        </div>

                        <div class="mb-4">
                            <label for="second_language_{{ $short_code }}" class="form-label">Second Language</label>
                            <input type="text" class="form-control" id="second_language_{{ $short_code }}" name="second_language_{{ $short_code }}" value="{{ $contents->{'second_language_' . $short_code} ?? '' }}" placeholder="Second Language">
                        </div>

                        <div class="mb-4">
                            <label for="third_language_{{ $short_code }}" class="form-label">Third Language</label>
                            <input type="text" class="form-control" id="third_language_{{ $short_code }}" name="third_language_{{ $short_code }}" value="{{ $contents->{'third_language_' . $short_code} ?? '' }}" placeholder="Third Language">
                        </div>

                        <div class="mb-4">
                            <label for="instagram_{{ $short_code }}" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagram_{{ $short_code }}" name="instagram_{{ $short_code }}" value="{{ $contents->{'instagram_' . $short_code} ?? '' }}" placeholder="Instagram">
                        </div>

                        <div class="mb-4">
                            <label for="twitter_{{ $short_code }}" class="form-label">Twitter</label>
                            <input type="text" class="form-control" id="twitter_{{ $short_code }}" name="twitter_{{ $short_code }}" value="{{ $contents->{'twitter_' . $short_code} ?? '' }}" placeholder="Twitter">
                        </div>

                        <div class="mb-4">
                            <label for="linkedin_{{ $short_code }}" class="form-label">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin_{{ $short_code }}" name="linkedin_{{ $short_code }}" value="{{ $contents->{'linkedin_' . $short_code} ?? '' }}" placeholder="Linkedin">
                        </div>

                        <div class="mb-4">
                            <label for="youtube_{{ $short_code }}" class="form-label">Youtube</label>
                            <input type="text" class="form-control" id="youtube_{{ $short_code }}" name="youtube_{{ $short_code }}" value="{{ $contents->{'youtube_' . $short_code} ?? '' }}" placeholder="Youtube">
                        </div>

                        <div class="mb-4">
                            <label for="facebook_{{ $short_code }}" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="facebook_{{ $short_code }}" name="facebook_{{ $short_code }}" value="{{ $contents->{'facebook_' . $short_code} ?? '' }}" placeholder="Facebook">
                        </div>

                        <div>
                            <label for="rated_{{ $short_code }}" class="form-label">Rated</label>
                            <input type="text" class="form-control" id="rated_{{ $short_code }}" name="rated_{{ $short_code }}" value="{{ $contents->{'rated_' . $short_code} ?? '' }}" placeholder="Rated">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2 align-items-center">
                                <div class="col-8">
                                    <textarea class="form-control textarea" name="section_3_point_descriptions[]" rows="5" placeholder="Description"></textarea>
                                    <x-backend.input-error field="section_3_point_files.*"></x-backend.input-error>
                                </div>
                                <div class="col-4 d-flex">
                                    <input type="file" class="form-control" name="section_3_point_files[]" accept="image/*">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>

                            </div>`;
            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush