@extends('backend.layouts.app')

@section('title', 'Student Dashboard')

@section('content')

    <x-backend.breadcrumb page_name="Student Dashboard"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.student-dashboard.update', $language) }}" method="POST">
            @csrf
            <div class="section">
                <p class="inner-page-title">Sidebar</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="sidebar_dashboard" class="form-label">Dashboard</label>
                        <input type="text" class="form-control" id="sidebar_dashboard" name="sidebar_dashboard" value="{{ $contents->sidebar_dashboard ?? '' }}" placeholder="Dashboard">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_student_profile" class="form-label">Student Profile</label>
                        <input type="text" class="form-control" id="sidebar_student_profile" name="sidebar_student_profile" value="{{ $contents->sidebar_student_profile ?? '' }}" placeholder="Student Profile">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_courses" class="form-label">Courses</label>
                        <input type="text" class="form-control" id="sidebar_courses" name="sidebar_courses" value="{{ $contents->sidebar_courses ?? '' }}" placeholder="Courses">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_qualifications" class="form-label">Qualifications</label>
                        <input type="text" class="form-control" id="sidebar_qualifications" name="sidebar_qualifications" value="{{ $contents->sidebar_qualifications ?? '' }}" placeholder="Qualifications">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_my_storage" class="form-label">My Storage</label>
                        <input type="text" class="form-control" id="sidebar_my_storage" name="sidebar_my_storage" value="{{ $contents->sidebar_my_storage ?? '' }}" placeholder="My Storage">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_buy_study_material" class="form-label">Buy Study Material</label>
                        <input type="text" class="form-control" id="sidebar_buy_study_material" name="sidebar_buy_study_material" value="{{ $contents->sidebar_buy_study_material ?? '' }}" placeholder="Buy Study Material">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_member_corner" class="form-label">Member Corner</label>
                        <input type="text" class="form-control" id="sidebar_member_corner" name="sidebar_member_corner" value="{{ $contents->sidebar_member_corner ?? '' }}" placeholder="Member Corner">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_ask_the_experts" class="form-label">Ask the Experts</label>
                        <input type="text" class="form-control" id="sidebar_ask_the_experts" name="sidebar_ask_the_experts" value="{{ $contents->sidebar_ask_the_experts ?? '' }}" placeholder="Ask the Experts">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="sidebar_technical_supports" class="form-label">Technical Supports</label>
                        <input type="text" class="form-control" id="sidebar_technical_supports" name="sidebar_technical_supports" value="{{ $contents->sidebar_technical_supports ?? '' }}" placeholder="Technical Supports">
                    </div>

                    <div class="col-4">
                        <label for="sidebar_refer_friends" class="form-label">Refer Friends</label>
                        <input type="text" class="form-control" id="sidebar_refer_friends" name="sidebar_refer_friends" value="{{ $contents->sidebar_refer_friends ?? '' }}" placeholder="Refer Friends">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Dashboard</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="dashboard_welcome" class="form-label">Welcome</label>
                        <input type="text" class="form-control" id="dashboard_welcome" name="dashboard_welcome" value="{{ $contents->dashboard_welcome ?? '' }}" placeholder="Welcome">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="dashboard_profile" class="form-label">Profile</label>
                        <input type="text" class="form-control" id="dashboard_profile" name="dashboard_profile" value="{{ $contents->dashboard_profile ?? '' }}" placeholder="Profile">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="dashboard_profile_description" class="form-label">Profile Description</label>
                        <input type="text" class="form-control" id="dashboard_profile_description" name="dashboard_profile_description" value="{{ $contents->dashboard_profile_description ?? '' }}" placeholder="Profile Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="dashboard_change_password" class="form-label">Change Password</label>
                        <input type="text" class="form-control" id="dashboard_change_password" name="dashboard_change_password" value="{{ $contents->dashboard_change_password ?? '' }}" placeholder="Change Password">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="dashboard_change_password_description" class="form-label">Change Password Description</label>
                        <input type="text" class="form-control" id="dashboard_change_password_description" name="dashboard_change_password_description" value="{{ $contents->dashboard_change_password_description ?? '' }}" placeholder="Change Password Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="dashboard_courses" class="form-label">Courses</label>
                        <input type="text" class="form-control" id="dashboard_courses" name="dashboard_courses" value="{{ $contents->dashboard_courses ?? '' }}" placeholder="Courses">
                    </div>

                    <div class="col-4">
                        <label for="dashboard_courses_description" class="form-label">Courses Description</label>
                        <input type="text" class="form-control" id="dashboard_courses_description" name="dashboard_courses_description" value="{{ $contents->dashboard_courses_description ?? '' }}" placeholder="Courses Description">
                    </div>

                    <div class="col-4">
                        <label for="dashboard_billing_centre" class="form-label">Billing Centre</label>
                        <input type="text" class="form-control" id="dashboard_billing_centre" name="dashboard_billing_centre" value="{{ $contents->dashboard_billing_centre ?? '' }}" placeholder="Billing Centre">
                    </div>

                    <div class="col-4">
                        <label for="dashboard_billing_centre_description" class="form-label">Billing Centre Description</label>
                        <input type="text" class="form-control" id="dashboard_billing_centre_description" name="dashboard_billing_centre_description" value="{{ $contents->dashboard_billing_centre_description ?? '' }}" placeholder="Billing Centre Description">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Change Password</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="change_password_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="change_password_title" name="change_password_title" value="{{ $contents->change_password_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_sub_title" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="change_password_sub_title" name="change_password_sub_title" value="{{ $contents->change_password_sub_title ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_title" class="form-label">Rule Title</label>
                        <input type="text" class="form-control" id="change_password_rule_title" name="change_password_rule_title" value="{{ $contents->change_password_rule_title ?? '' }}" placeholder="Rule Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_1_title" class="form-label">Rule 1 Title</label>
                        <input type="text" class="form-control" id="change_password_rule_1_title" name="change_password_rule_1_title" value="{{ $contents->change_password_rule_1_title ?? '' }}" placeholder="Rule 1 Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_1_description" class="form-label">Rule 1 Description</label>
                        <input type="text" class="form-control" id="change_password_rule_1_description" name="change_password_rule_1_description" value="{{ $contents->change_password_rule_1_description ?? '' }}" placeholder="Rule 1 Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_2_title" class="form-label">Rule 2 Title</label>
                        <input type="text" class="form-control" id="change_password_rule_2_title" name="change_password_rule_2_title" value="{{ $contents->change_password_rule_2_title ?? '' }}" placeholder="Rule 2 Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_2_description" class="form-label">Rule 2 Description</label>
                        <input type="text" class="form-control" id="change_password_rule_2_description" name="change_password_rule_2_description" value="{{ $contents->change_password_rule_2_description ?? '' }}" placeholder="Rule 2 Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_3_title" class="form-label">Rule 3 Title</label>
                        <input type="text" class="form-control" id="change_password_rule_3_title" name="change_password_rule_3_title" value="{{ $contents->change_password_rule_3_title ?? '' }}" placeholder="Rule 3 Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_3_description" class="form-label">Rule 3 Description</label>
                        <input type="text" class="form-control" id="change_password_rule_3_description" name="change_password_rule_3_description" value="{{ $contents->change_password_rule_3_description ?? '' }}" placeholder="Rule 3 Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_4_title" class="form-label">Rule 4 Title</label>
                        <input type="text" class="form-control" id="change_password_rule_4_title" name="change_password_rule_4_title" value="{{ $contents->change_password_rule_4_title ?? '' }}" placeholder="Rule 4 Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_4_description" class="form-label">Rule 4 Description</label>
                        <input type="text" class="form-control" id="change_password_rule_4_description" name="change_password_rule_4_description" value="{{ $contents->change_password_rule_4_description ?? '' }}" placeholder="Rule 4 Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_5_title" class="form-label">Rule 5 Title</label>
                        <input type="text" class="form-control" id="change_password_rule_5_title" name="change_password_rule_5_title" value="{{ $contents->change_password_rule_5_title ?? '' }}" placeholder="Rule 5 Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_rule_5_description" class="form-label">Rule 5 Description</label>
                        <input type="text" class="form-control" id="change_password_rule_5_description" name="change_password_rule_5_description" value="{{ $contents->change_password_rule_5_description ?? '' }}" placeholder="Rule 5 Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_new_password" class="form-label">New Password</label>
                        <input type="text" class="form-control" id="change_password_new_password" name="change_password_new_password" value="{{ $contents->change_password_new_password ?? '' }}" placeholder="New Password">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="change_password_confirm_password" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="change_password_confirm_password" name="change_password_confirm_password" value="{{ $contents->change_password_confirm_password ?? '' }}" placeholder="Confirm Password">
                    </div>

                    <div class="col-4">
                        <label for="change_password_button" class="form-label">Button</label>
                        <input type="text" class="form-control" id="change_password_button" name="change_password_button" value="{{ $contents->change_password_button ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">My Orders</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="my_orders_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="my_orders_title" name="my_orders_title" value="{{ $contents->my_orders_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_orders_first_tab" class="form-label">First Tab</label>
                        <input type="text" class="form-control" id="my_orders_first_tab" name="my_orders_first_tab" value="{{ $contents->my_orders_first_tab ?? '' }}" placeholder="First Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_orders_second_tab" class="form-label">Second Tab</label>
                        <input type="text" class="form-control" id="my_orders_second_tab" name="my_orders_second_tab" value="{{ $contents->my_orders_second_tab ?? '' }}" placeholder="Second Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_orders_third_tab" class="form-label">Third Tab</label>
                        <input type="text" class="form-control" id="my_orders_third_tab" name="my_orders_third_tab" value="{{ $contents->my_orders_third_tab ?? '' }}" placeholder="Third Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_orders_fourth_tab" class="form-label">Fourth Tab</label>
                        <input type="text" class="form-control" id="my_orders_fourth_tab" name="my_orders_fourth_tab" value="{{ $contents->my_orders_fourth_tab ?? '' }}" placeholder="Fourth Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_orders_fifth_tab" class="form-label">Fifth Tab</label>
                        <input type="text" class="form-control" id="my_orders_fifth_tab" name="my_orders_fifth_tab" value="{{ $contents->my_orders_fifth_tab ?? '' }}" placeholder="Fifth Tab">
                    </div>

                    <div class="col-4">
                        <label for="my_orders_no_records" class="form-label">No Records</label>
                        <input type="text" class="form-control" id="my_orders_no_records" name="my_orders_no_records" value="{{ $contents->my_orders_no_records ?? '' }}" placeholder="No Records">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Student Profile</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="student_profile_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="student_profile_title" name="student_profile_title" value="{{ $contents->student_profile_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_sub_title" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="student_profile_sub_title" name="student_profile_sub_title" value="{{ $contents->student_profile_sub_title ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_details" class="form-label">Personal Details</label>
                        <input type="text" class="form-control" id="student_profile_personal_details" name="student_profile_personal_details" value="{{ $contents->student_profile_personal_details ?? '' }}" placeholder="Personal Details">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="student_profile_personal_first_name" name="student_profile_personal_first_name" value="{{ $contents->student_profile_personal_first_name ?? '' }}" placeholder="First Name">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="student_profile_personal_last_name" name="student_profile_personal_last_name" value="{{ $contents->student_profile_personal_last_name ?? '' }}" placeholder="Last Name">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="student_profile_personal_email" name="student_profile_personal_email" value="{{ $contents->student_profile_personal_email ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_language" class="form-label">Language</label>
                        <input type="text" class="form-control" id="student_profile_personal_language" name="student_profile_personal_language" value="{{ $contents->student_profile_personal_language ?? '' }}" placeholder="Language">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_first_language" class="form-label">First Language</label>
                        <input type="text" class="form-control" id="student_profile_personal_first_language" name="student_profile_personal_first_language" value="{{ $contents->student_profile_personal_first_language ?? '' }}" placeholder="First Language">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_second_language" class="form-label">Second Language</label>
                        <input type="text" class="form-control" id="student_profile_personal_second_language" name="student_profile_personal_second_language" value="{{ $contents->student_profile_personal_second_language ?? '' }}" placeholder="Second Language">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_third_language" class="form-label">Third Language</label>
                        <input type="text" class="form-control" id="student_profile_personal_third_language" name="student_profile_personal_third_language" value="{{ $contents->student_profile_personal_third_language ?? '' }}" placeholder="Third Language">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="student_profile_personal_phone" name="student_profile_personal_phone" value="{{ $contents->student_profile_personal_phone ?? '' }}" placeholder="Phone">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_personal_subscribe" class="form-label">Subscribe</label>
                        <input type="text" class="form-control" id="student_profile_personal_subscribe" name="student_profile_personal_subscribe" value="{{ $contents->student_profile_personal_subscribe ?? '' }}" placeholder="Subscribe">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_details" class="form-label">Primary Details</label>
                        <input type="text" class="form-control" id="student_profile_primary_details" name="student_profile_primary_details" value="{{ $contents->student_profile_primary_details ?? '' }}" placeholder="Primary Details">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_name" class="form-label">Primary Name</label>
                        <input type="text" class="form-control" id="student_profile_primary_name" name="student_profile_primary_name" value="{{ $contents->student_profile_primary_name ?? '' }}" placeholder="Primary Name">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_address" class="form-label">Primary Address</label>
                        <input type="text" class="form-control" id="student_profile_primary_address" name="student_profile_primary_address" value="{{ $contents->student_profile_primary_address ?? '' }}" placeholder="Primary Address">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_unit_suite" class="form-label">Primary Unit/ Suite</label>
                        <input type="text" class="form-control" id="student_profile_primary_unit_suite" name="student_profile_primary_unit_suite" value="{{ $contents->student_profile_primary_unit_suite ?? '' }}" placeholder="Primary Unit/ Suite">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_city" class="form-label">Primary City</label>
                        <input type="text" class="form-control" id="student_profile_primary_city" name="student_profile_primary_city" value="{{ $contents->student_profile_primary_city ?? '' }}" placeholder="Primary City">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_country" class="form-label">Primary Country</label>
                        <input type="text" class="form-control" id="student_profile_primary_country" name="student_profile_primary_country" value="{{ $contents->student_profile_primary_country ?? '' }}" placeholder="Primary Country">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_state_province" class="form-label">Primary State/ Province</label>
                        <input type="text" class="form-control" id="student_profile_primary_state_province" name="student_profile_primary_state_province" value="{{ $contents->student_profile_primary_state_province ?? '' }}" placeholder="Primary State/ Province">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_zip_postal" class="form-label">Primary Zip/Postal Code</label>
                        <input type="text" class="form-control" id="student_profile_primary_zip_postal" name="student_profile_primary_zip_postal" value="{{ $contents->student_profile_primary_zip_postal ?? '' }}" placeholder="Primary Zip/Postal Code">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_contact_number" class="form-label">Primary Contact Number</label>
                        <input type="text" class="form-control" id="student_profile_primary_contact_number" name="student_profile_primary_contact_number" value="{{ $contents->student_profile_primary_contact_number ?? '' }}" placeholder="Primary Contact Number">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_fax" class="form-label">Primary Fax</label>
                        <input type="text" class="form-control" id="student_profile_primary_fax" name="student_profile_primary_fax" value="{{ $contents->student_profile_primary_fax ?? '' }}" placeholder="Primary Fax">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_email" class="form-label">Primary Email</label>
                        <input type="text" class="form-control" id="student_profile_primary_email" name="student_profile_primary_email" value="{{ $contents->student_profile_primary_email ?? '' }}" placeholder="Primary Email">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_secondary_email" class="form-label">Primary Secondary Email</label>
                        <input type="text" class="form-control" id="student_profile_primary_secondary_email" name="student_profile_primary_secondary_email" value="{{ $contents->student_profile_primary_secondary_email ?? '' }}" placeholder="Primary Secondary Email">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_primary_website" class="form-label">Primary Website</label>
                        <input type="text" class="form-control" id="student_profile_primary_website" name="student_profile_primary_website" value="{{ $contents->student_profile_primary_website ?? '' }}" placeholder="Primary Website">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_stats" class="form-label">Member Stats</label>
                        <input type="text" class="form-control" id="student_profile_member_stats" name="student_profile_member_stats" value="{{ $contents->student_profile_member_stats ?? '' }}" placeholder="Member Stats">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_age" class="form-label">Member Age</label>
                        <input type="text" class="form-control" id="student_profile_member_age" name="student_profile_member_age" value="{{ $contents->student_profile_member_age ?? '' }}" placeholder="Member Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_select_age" class="form-label">Select Age</label>
                        <input type="text" class="form-control" id="student_profile_member_select_age" name="student_profile_member_select_age" value="{{ $contents->student_profile_member_select_age ?? '' }}" placeholder="Select Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_first_age" class="form-label">First Age</label>
                        <input type="text" class="form-control" id="student_profile_member_first_age" name="student_profile_member_first_age" value="{{ $contents->student_profile_member_first_age ?? '' }}" placeholder="First Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_second_age" class="form-label">Second Age</label>
                        <input type="text" class="form-control" id="student_profile_member_second_age" name="student_profile_member_second_age" value="{{ $contents->student_profile_member_second_age ?? '' }}" placeholder="Second Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_third_age" class="form-label">Third Age</label>
                        <input type="text" class="form-control" id="student_profile_member_third_age" name="student_profile_member_third_age" value="{{ $contents->student_profile_member_third_age ?? '' }}" placeholder="Third Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fourth_age" class="form-label">Fourth Age</label>
                        <input type="text" class="form-control" id="student_profile_member_fourth_age" name="student_profile_member_fourth_age" value="{{ $contents->student_profile_member_fourth_age ?? '' }}" placeholder="Fourth Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fifth_age" class="form-label">Fifth Age</label>
                        <input type="text" class="form-control" id="student_profile_member_fifth_age" name="student_profile_member_fifth_age" value="{{ $contents->student_profile_member_fifth_age ?? '' }}" placeholder="Fifth Age">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_area" class="form-label">Member Area</label>
                        <input type="text" class="form-control" id="student_profile_member_area" name="student_profile_member_area" value="{{ $contents->student_profile_member_area ?? '' }}" placeholder="Member Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_select_area" class="form-label">Select Area</label>
                        <input type="text" class="form-control" id="student_profile_member_select_area" name="student_profile_member_select_area" value="{{ $contents->student_profile_member_select_area ?? '' }}" placeholder="Select Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_first_area" class="form-label">First Area</label>
                        <input type="text" class="form-control" id="student_profile_member_first_area" name="student_profile_member_first_area" value="{{ $contents->student_profile_member_first_area ?? '' }}" placeholder="First Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_second_area" class="form-label">Second Area</label>
                        <input type="text" class="form-control" id="student_profile_member_second_area" name="student_profile_member_second_area" value="{{ $contents->student_profile_member_second_area ?? '' }}" placeholder="Second Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_third_area" class="form-label">Third Area</label>
                        <input type="text" class="form-control" id="student_profile_member_third_area" name="student_profile_member_third_area" value="{{ $contents->student_profile_member_third_area ?? '' }}" placeholder="Third Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fourth_area" class="form-label">Fourth Area</label>
                        <input type="text" class="form-control" id="student_profile_member_fourth_area" name="student_profile_member_fourth_area" value="{{ $contents->student_profile_member_fourth_area ?? '' }}" placeholder="Fourth Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fifth_area" class="form-label">Fifth Area</label>
                        <input type="text" class="form-control" id="student_profile_member_fifth_area" name="student_profile_member_fifth_area" value="{{ $contents->student_profile_member_fifth_area ?? '' }}" placeholder="Fifth Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_sixth_area" class="form-label">Sixth Area</label>
                        <input type="text" class="form-control" id="student_profile_member_sixth_area" name="student_profile_member_sixth_area" value="{{ $contents->student_profile_member_sixth_area ?? '' }}" placeholder="Sixth Area">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_occupation" class="form-label">Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_occupation" name="student_profile_member_occupation" value="{{ $contents->student_profile_member_occupation ?? '' }}" placeholder="Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_select_occupation" class="form-label">Select Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_select_occupation" name="student_profile_member_select_occupation" value="{{ $contents->student_profile_member_select_occupation ?? '' }}" placeholder="Select Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_first_occupation" class="form-label">First Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_first_occupation" name="student_profile_member_first_occupation" value="{{ $contents->student_profile_member_first_occupation ?? '' }}" placeholder="First Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_second_occupation" class="form-label">Second Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_second_occupation" name="student_profile_member_second_occupation" value="{{ $contents->student_profile_member_second_occupation ?? '' }}" placeholder="Second Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_third_occupation" class="form-label">Third Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_third_occupation" name="student_profile_member_third_occupation" value="{{ $contents->student_profile_member_third_occupation ?? '' }}" placeholder="Third Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fourth_occupation" class="form-label">Fourth Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_fourth_occupation" name="student_profile_member_fourth_occupation" value="{{ $contents->student_profile_member_fourth_occupation ?? '' }}" placeholder="Fourth Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fifth_occupation" class="form-label">Fifth Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_fifth_occupation" name="student_profile_member_fifth_occupation" value="{{ $contents->student_profile_member_fifth_occupation ?? '' }}" placeholder="Fifth Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_sixth_occupation" class="form-label">Sixth Occupation</label>
                        <input type="text" class="form-control" id="student_profile_member_sixth_occupation" name="student_profile_member_sixth_occupation" value="{{ $contents->student_profile_member_sixth_occupation ?? '' }}" placeholder="Sixth Occupation">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_messenger" class="form-label">Messenger</label>
                        <input type="text" class="form-control" id="student_profile_member_messenger" name="student_profile_member_messenger" value="{{ $contents->student_profile_member_messenger ?? '' }}" placeholder="Messenger">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_select_messenger" class="form-label">Select Messenger</label>
                        <input type="text" class="form-control" id="student_profile_member_select_messenger" name="student_profile_member_select_messenger" value="{{ $contents->student_profile_member_select_messenger ?? '' }}" placeholder="Select Messenger">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_first_messenger" class="form-label">First Messenger</label>
                        <input type="text" class="form-control" id="student_profile_member_first_messenger" name="student_profile_member_first_messenger" value="{{ $contents->student_profile_member_first_messenger ?? '' }}" placeholder="First Messenger">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_second_messenger" class="form-label">Second Messenger</label>
                        <input type="text" class="form-control" id="student_profile_member_second_messenger" name="student_profile_member_second_messenger" value="{{ $contents->student_profile_member_second_messenger ?? '' }}" placeholder="Second Messenger">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_third_messenger" class="form-label">Third Messenger</label>
                        <input type="text" class="form-control" id="student_profile_member_third_messenger" name="student_profile_member_third_messenger" value="{{ $contents->student_profile_member_third_messenger ?? '' }}" placeholder="Third Messenger">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_messenger_app" class="form-label">Messenger App</label>
                        <input type="text" class="form-control" id="student_profile_member_messenger_app" name="student_profile_member_messenger_app" value="{{ $contents->student_profile_member_messenger_app ?? '' }}" placeholder="Messenger App">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_hear" class="form-label">Hear</label>
                        <input type="text" class="form-control" id="student_profile_member_hear" name="student_profile_member_hear" value="{{ $contents->student_profile_member_hear ?? '' }}" placeholder="Hear">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_select_hear" class="form-label">Select Hear</label>
                        <input type="text" class="form-control" id="student_profile_member_select_hear" name="student_profile_member_select_hear" value="{{ $contents->student_profile_member_select_hear ?? '' }}" placeholder="Select Hear">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_first_hear" class="form-label">First Hear</label>
                        <input type="text" class="form-control" id="student_profile_member_first_hear" name="student_profile_member_first_hear" value="{{ $contents->student_profile_member_first_hear ?? '' }}" placeholder="First Hear">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_second_hear" class="form-label">Second Hear</label>
                        <input type="text" class="form-control" id="student_profile_member_second_hear" name="student_profile_member_second_hear" value="{{ $contents->student_profile_member_second_hear ?? '' }}" placeholder="Second Hear">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_third_hear" class="form-label">Third Hear</label>
                        <input type="text" class="form-control" id="student_profile_member_third_hear" name="student_profile_member_third_hear" value="{{ $contents->student_profile_member_third_hear ?? '' }}" placeholder="Third Hear">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_member_fourth_hear" class="form-label">Fourth Hear</label>
                        <input type="text" class="form-control" id="student_profile_member_fourth_hear" name="student_profile_member_fourth_hear" value="{{ $contents->student_profile_member_fourth_hear ?? '' }}" placeholder="Fourth Hear">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_self" class="form-label">Self</label>
                        <input type="text" class="form-control" id="student_profile_self" name="student_profile_self" value="{{ $contents->student_profile_self ?? '' }}" placeholder="Self">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="student_profile_self_placeholder" class="form-label">Self Placeholder</label>
                        <input type="text" class="form-control" id="student_profile_self_placeholder" name="student_profile_self_placeholder" value="{{ $contents->student_profile_self_placeholder ?? '' }}" placeholder="Self Placeholder">
                    </div>

                    <div class="col-4">
                        <label for="student_profile_image" class="form-label">Image</label>
                        <input type="text" class="form-control" id="student_profile_image" name="student_profile_image" value="{{ $contents->student_profile_image ?? '' }}" placeholder="Image">
                    </div>

                    <div class="col-4">
                        <label for="student_profile_button" class="form-label">Button</label>
                        <input type="text" class="form-control" id="student_profile_button" name="student_profile_button" value="{{ $contents->student_profile_button ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Courses</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="courses_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="courses_title" name="courses_title" value="{{ $contents->courses_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_started" class="form-label">Started</label>
                        <input type="text" class="form-control" id="courses_started" name="courses_started" value="{{ $contents->courses_started ?? '' }}" placeholder="Started">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_completed" class="form-label">Completed</label>
                        <input type="text" class="form-control" id="courses_completed" name="courses_completed" value="{{ $contents->courses_completed ?? '' }}" placeholder="Completed">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_not_yet" class="form-label">Not Yet</label>
                        <input type="text" class="form-control" id="courses_not_yet" name="courses_not_yet" value="{{ $contents->courses_not_yet ?? '' }}" placeholder="Not Yet">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_inprogress" class="form-label">In Progress</label>
                        <input type="text" class="form-control" id="courses_inprogress" name="courses_inprogress" value="{{ $contents->courses_inprogress ?? '' }}" placeholder="In Progress">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_view_details" class="form-label">View Details</label>
                        <input type="text" class="form-control" id="courses_view_details" name="courses_view_details" value="{{ $contents->courses_view_details ?? '' }}" placeholder="View Details">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_no_courses" class="form-label">No Courses</label>
                        <input type="text" class="form-control" id="courses_no_courses" name="courses_no_courses" value="{{ $contents->courses_no_courses ?? '' }}" placeholder="No Courses">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_pending" class="form-label">Pending</label>
                        <input type="text" class="form-control" id="courses_pending" name="courses_pending" value="{{ $contents->courses_pending ?? '' }}" placeholder="Pending">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_view_results" class="form-label">View Results</label>
                        <input type="text" class="form-control" id="courses_view_results" name="courses_view_results" value="{{ $contents->courses_view_results ?? '' }}" placeholder="View Results">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_exam_completed" class="form-label">Module Exam Completed</label>
                        <input type="text" class="form-control" id="courses_module_exam_completed" name="courses_module_exam_completed" value="{{ $contents->courses_module_exam_completed ?? '' }}" placeholder="Module Exam Completed">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_exam_completed_tooltip" class="form-label">Module Exam Completed Tooltip</label>
                        <input type="text" class="form-control" id="courses_module_exam_completed_tooltip" name="courses_module_exam_completed_tooltip" value="{{ $contents->courses_module_exam_completed_tooltip ?? '' }}" placeholder="Module Exam Completed Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_take_again" class="form-label">Module Take Again</label>
                        <input type="text" class="form-control" id="courses_module_take_again" name="courses_module_take_again" value="{{ $contents->courses_module_take_again ?? '' }}" placeholder="Module Take Again">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_take_again_tooltip" class="form-label">Module Take Again Tooltip</label>
                        <input type="text" class="form-control" id="courses_module_take_again_tooltip" name="courses_module_take_again_tooltip" value="{{ $contents->courses_module_take_again_tooltip ?? '' }}" placeholder="Module Take Again Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_take_module_exam" class="form-label">Take Module Exam</label>
                        <input type="text" class="form-control" id="courses_module_take_module_exam" name="courses_module_take_module_exam" value="{{ $contents->courses_module_take_module_exam ?? '' }}" placeholder="Take Module Exam">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_take_module_exam_tooltip" class="form-label">Take Module Exam Tooltip</label>
                        <input type="text" class="form-control" id="courses_module_take_module_exam_tooltip" name="courses_module_take_module_exam_tooltip" value="{{ $contents->courses_module_take_module_exam_tooltip ?? '' }}" placeholder="Take Module Exam Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_exam_locked" class="form-label">Module Exam Locked</label>
                        <input type="text" class="form-control" id="courses_module_exam_locked" name="courses_module_exam_locked" value="{{ $contents->courses_module_exam_locked ?? '' }}" placeholder="Module Exam Locked">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_exam_locked_tooltip" class="form-label">Module Exam Locked Tooltip</label>
                        <input type="text" class="form-control" id="courses_module_exam_locked_tooltip" name="courses_module_exam_locked_tooltip" value="{{ $contents->courses_module_exam_locked_tooltip ?? '' }}" placeholder="Module Exam Locked Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_module_chapters" class="form-label">Module Chapters</label>
                        <input type="text" class="form-control" id="courses_module_chapters" name="courses_module_chapters" value="{{ $contents->courses_module_chapters ?? '' }}" placeholder="Module Chapters">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_exam_completed" class="form-label">Final Exam Completed</label>
                        <input type="text" class="form-control" id="courses_final_exam_completed" name="courses_final_exam_completed" value="{{ $contents->courses_final_exam_completed ?? '' }}" placeholder="Final Exam Completed">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_exam_completed_tooltip" class="form-label">Final Exam Completed Tooltip</label>
                        <input type="text" class="form-control" id="courses_final_exam_completed_tooltip" name="courses_final_exam_completed_tooltip" value="{{ $contents->courses_final_exam_completed_tooltip ?? '' }}" placeholder="Final Exam Completed Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_take_again" class="form-label">Final Take Again</label>
                        <input type="text" class="form-control" id="courses_final_take_again" name="courses_final_take_again" value="{{ $contents->courses_final_take_again ?? '' }}" placeholder="Final Take Again">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_take_again_tooltip" class="form-label">Final Take Again Tooltip</label>
                        <input type="text" class="form-control" id="courses_final_take_again_tooltip" name="courses_final_take_again_tooltip" value="{{ $contents->courses_final_take_again_tooltip ?? '' }}" placeholder="Final Take Again Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_take_final_exam" class="form-label">Take Final Exam</label>
                        <input type="text" class="form-control" id="courses_final_take_final_exam" name="courses_final_take_final_exam" value="{{ $contents->courses_final_take_final_exam ?? '' }}" placeholder="Take Final Exam">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_take_final_exam_tooltip" class="form-label">Take Final Exam Tooltip</label>
                        <input type="text" class="form-control" id="courses_final_take_final_exam_tooltip" name="courses_final_take_final_exam_tooltip" value="{{ $contents->courses_final_take_final_exam_tooltip ?? '' }}" placeholder="Take Final Exam Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_exam_locked" class="form-label">Final Exam Locked</label>
                        <input type="text" class="form-control" id="courses_final_exam_locked" name="courses_final_exam_locked" value="{{ $contents->courses_final_exam_locked ?? '' }}" placeholder="Final Exam Locked">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_final_exam_locked_tooltip" class="form-label">Final Exam Locked Tooltip</label>
                        <input type="text" class="form-control" id="courses_final_exam_locked_tooltip" name="courses_final_exam_locked_tooltip" value="{{ $contents->courses_final_exam_locked_tooltip ?? '' }}" placeholder="Final Exam Locked Tooltip">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_no_modules" class="form-label">No Modules</label>
                        <input type="text" class="form-control" id="courses_no_modules" name="courses_no_modules" value="{{ $contents->courses_no_modules ?? '' }}" placeholder="No Modules">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_return" class="form-label">Return</label>
                        <input type="text" class="form-control" id="courses_return" name="courses_return" value="{{ $contents->courses_return ?? '' }}" placeholder="Return">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_about" class="form-label">About</label>
                        <input type="text" class="form-control" id="courses_about" name="courses_about" value="{{ $contents->courses_about ?? '' }}" placeholder="About">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_content" class="form-label">Content</label>
                        <input type="text" class="form-control" id="courses_content" name="courses_content" value="{{ $contents->courses_content ?? '' }}" placeholder="Content">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_guides" class="form-label">Guides</label>
                        <input type="text" class="form-control" id="courses_guides" name="courses_guides" value="{{ $contents->courses_guides ?? '' }}" placeholder="Guides">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_download" class="form-label">Download</label>
                        <input type="text" class="form-control" id="courses_download" name="courses_download" value="{{ $contents->courses_download ?? '' }}" placeholder="Download">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_course_book" class="form-label">Course Book</label>
                        <input type="text" class="form-control" id="courses_course_book" name="courses_course_book" value="{{ $contents->courses_course_book ?? '' }}" placeholder="Course Book">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_course_video" class="form-label">Course Video</label>
                        <input type="text" class="form-control" id="courses_course_video" name="courses_course_video" value="{{ $contents->courses_course_video ?? '' }}" placeholder="Course Video">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_video_links" class="form-label">Video Links</label>
                        <input type="text" class="form-control" id="courses_video_links" name="courses_video_links" value="{{ $contents->courses_video_links ?? '' }}" placeholder="Video Links">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_no_guides" class="form-label">No Guides</label>
                        <input type="text" class="form-control" id="courses_no_guides" name="courses_no_guides" value="{{ $contents->courses_no_guides ?? '' }}" placeholder="No Guides">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_additional_resources" class="form-label">Additional Resources</label>
                        <input type="text" class="form-control" id="courses_additional_resources" name="courses_additional_resources" value="{{ $contents->courses_additional_resources ?? '' }}" placeholder="Additional Resources">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_additional_videos" class="form-label">Additional Videos</label>
                        <input type="text" class="form-control" id="courses_additional_videos" name="courses_additional_videos" value="{{ $contents->courses_additional_videos ?? '' }}" placeholder="Additional Videos">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_additional_video_links" class="form-label">Additional Video Links</label>
                        <input type="text" class="form-control" id="courses_additional_video_links" name="courses_additional_video_links" value="{{ $contents->courses_additional_video_links ?? '' }}" placeholder="Additional Video Links">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_additional_presentation_medias" class="form-label">Additional Presentation Medias</label>
                        <input type="text" class="form-control" id="courses_additional_presentation_medias" name="courses_additional_presentation_medias" value="{{ $contents->courses_additional_presentation_medias ?? '' }}" placeholder="Additional Presentation Medias">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_additional_download_resources" class="form-label">Additional Download Resources</label>
                        <input type="text" class="form-control" id="courses_additional_download_resources" name="courses_additional_download_resources" value="{{ $contents->courses_additional_download_resources ?? '' }}" placeholder="Additional Download Resources">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_no_additional_resources" class="form-label">No Additional Resources</label>
                        <input type="text" class="form-control" id="courses_no_additional_resources" name="courses_no_additional_resources" value="{{ $contents->courses_no_additional_resources ?? '' }}" placeholder="No Additional Resources">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_start_modal_title" class="form-label">Exam Start Modal Title</label>
                        <input type="text" class="form-control" id="courses_exam_start_modal_title" name="courses_exam_start_modal_title" value="{{ $contents->courses_exam_start_modal_title ?? '' }}" placeholder="Exam Start Modal Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_start_modal_description" class="form-label">Exam Start Modal Description</label>
                        <input type="text" class="form-control" id="courses_exam_start_modal_description" name="courses_exam_start_modal_description" value="{{ $contents->courses_exam_start_modal_description ?? '' }}" placeholder="Exam Start Modal Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_start_modal_start_exam" class="form-label">Start Exam</label>
                        <input type="text" class="form-control" id="courses_exam_start_modal_start_exam" name="courses_exam_start_modal_start_exam" value="{{ $contents->courses_exam_start_modal_start_exam ?? '' }}" placeholder="Start Exam">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_remaining_time" class="form-label">Remaining Time</label>
                        <input type="text" class="form-control" id="courses_exam_remaining_time" name="courses_exam_remaining_time" value="{{ $contents->courses_exam_remaining_time ?? '' }}" placeholder="Remaining Time">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_previous" class="form-label">Previous</label>
                        <input type="text" class="form-control" id="courses_exam_previous" name="courses_exam_previous" value="{{ $contents->courses_exam_previous ?? '' }}" placeholder="Previous">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_next" class="form-label">Next</label>
                        <input type="text" class="form-control" id="courses_exam_next" name="courses_exam_next" value="{{ $contents->courses_exam_next ?? '' }}" placeholder="Next">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_remaining_questions" class="form-label">Remaining Questions</label>
                        <input type="text" class="form-control" id="courses_exam_remaining_questions" name="courses_exam_remaining_questions" value="{{ $contents->courses_exam_remaining_questions ?? '' }}" placeholder="Remaining Questions">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_attempted" class="form-label">Attempted</label>
                        <input type="text" class="form-control" id="courses_exam_attempted" name="courses_exam_attempted" value="{{ $contents->courses_exam_attempted ?? '' }}" placeholder="Attempted">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_not_attempted" class="form-label">Not Attempted</label>
                        <input type="text" class="form-control" id="courses_exam_not_attempted" name="courses_exam_not_attempted" value="{{ $contents->courses_exam_not_attempted ?? '' }}" placeholder="Not Attempted">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_incomplete" class="form-label">Incomplete</label>
                        <input type="text" class="form-control" id="courses_exam_incomplete" name="courses_exam_incomplete" value="{{ $contents->courses_exam_incomplete ?? '' }}" placeholder="Incomplete">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_finish_exam" class="form-label">Finish Exam</label>
                        <input type="text" class="form-control" id="courses_exam_finish_exam" name="courses_exam_finish_exam" value="{{ $contents->courses_exam_finish_exam ?? '' }}" placeholder="Finish Exam">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_submit_modal_title" class="form-label">Submit Modal Title</label>
                        <input type="text" class="form-control" id="courses_exam_submit_modal_title" name="courses_exam_submit_modal_title" value="{{ $contents->courses_exam_submit_modal_title ?? '' }}" placeholder="Submit Modal Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_submit_modal_description" class="form-label">Submit Modal Description</label>
                        <input type="text" class="form-control" id="courses_exam_submit_modal_description" name="courses_exam_submit_modal_description" value="{{ $contents->courses_exam_submit_modal_description ?? '' }}" placeholder="Submit Modal Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_time_modal_title" class="form-label">Time Modal Title</label>
                        <input type="text" class="form-control" id="courses_exam_time_modal_title" name="courses_exam_time_modal_title" value="{{ $contents->courses_exam_time_modal_title ?? '' }}" placeholder="Time Modal Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_time_modal_description" class="form-label">Time Modal Description</label>
                        <input type="text" class="form-control" id="courses_exam_time_modal_description" name="courses_exam_time_modal_description" value="{{ $contents->courses_exam_time_modal_description ?? '' }}" placeholder="Time Modal Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_success_modal_title" class="form-label">Success Modal Title</label>
                        <input type="text" class="form-control" id="courses_exam_success_modal_title" name="courses_exam_success_modal_title" value="{{ $contents->courses_exam_success_modal_title ?? '' }}" placeholder="Success Modal Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_success_modal_description" class="form-label">Success Modal Description</label>
                        <input type="text" class="form-control" id="courses_exam_success_modal_description" name="courses_exam_success_modal_description" value="{{ $contents->courses_exam_success_modal_description ?? '' }}" placeholder="Success Modal Description">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_modal_close" class="form-label">Modal Close</label>
                        <input type="text" class="form-control" id="courses_exam_modal_close" name="courses_exam_modal_close" value="{{ $contents->courses_exam_modal_close ?? '' }}" placeholder="Modal Close">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_modal_confirm" class="form-label">Modal Confirm</label>
                        <input type="text" class="form-control" id="courses_exam_modal_confirm" name="courses_exam_modal_confirm" value="{{ $contents->courses_exam_modal_confirm ?? '' }}" placeholder="Modal Confirm">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_title" class="form-label">Result Title</label>
                        <input type="text" class="form-control" id="courses_exam_result_title" name="courses_exam_result_title" value="{{ $contents->courses_exam_result_title ?? '' }}" placeholder="Result Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_total_questions" class="form-label">Total Questions</label>
                        <input type="text" class="form-control" id="courses_exam_result_total_questions" name="courses_exam_result_total_questions" value="{{ $contents->courses_exam_result_total_questions ?? '' }}" placeholder="Total Questions">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_total_correct_answers" class="form-label">Total Correct Answers</label>
                        <input type="text" class="form-control" id="courses_exam_result_total_correct_answers" name="courses_exam_result_total_correct_answers" value="{{ $contents->courses_exam_result_total_correct_answers ?? '' }}" placeholder="Correct Answers">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_total_unattended_answers" class="form-label">Total Unattended Answers</label>
                        <input type="text" class="form-control" id="courses_exam_result_total_unattended_answers" name="courses_exam_result_total_unattended_answers" value="{{ $contents->courses_exam_result_total_unattended_answers ?? '' }}" placeholder="Unattended Answers">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_marks" class="form-label">Marks</label>
                        <input type="text" class="form-control" id="courses_exam_result_marks" name="courses_exam_result_marks" value="{{ $contents->courses_exam_result_marks ?? '' }}" placeholder="Marks">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_result" class="form-label">Result</label>
                        <input type="text" class="form-control" id="courses_exam_result_result" name="courses_exam_result_result" value="{{ $contents->courses_exam_result_result ?? '' }}" placeholder="Result">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_pass" class="form-label">Pass</label>
                        <input type="text" class="form-control" id="courses_exam_result_pass" name="courses_exam_result_pass" value="{{ $contents->courses_exam_result_pass ?? '' }}" placeholder="Pass">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_fail" class="form-label">Fail</label>
                        <input type="text" class="form-control" id="courses_exam_result_fail" name="courses_exam_result_fail" value="{{ $contents->courses_exam_result_fail ?? '' }}" placeholder="Fail">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_correct_answer" class="form-label">Correct Answer</label>
                        <input type="text" class="form-control" id="courses_exam_result_correct_answer" name="courses_exam_result_correct_answer" value="{{ $contents->courses_exam_result_correct_answer ?? '' }}" placeholder="Correct Answer">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_incorrect_answer" class="form-label">Incorrect Answer</label>
                        <input type="text" class="form-control" id="courses_exam_result_incorrect_answer" name="courses_exam_result_incorrect_answer" value="{{ $contents->courses_exam_result_incorrect_answer ?? '' }}" placeholder="Incorrect Answer">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="courses_exam_result_un_attempted" class="form-label">Unattempted</label>
                        <input type="text" class="form-control" id="courses_exam_result_un_attempted" name="courses_exam_result_un_attempted" value="{{ $contents->courses_exam_result_un_attempted ?? '' }}" placeholder="Unattempted">
                    </div>

                    <div class="col-4">
                        <label for="courses_exam_start_modal_instructions" class="form-label">Start Modal Instructions</label>
                        <!-- <input type="text" class="form-control" id="courses_exam_start_modal_instructions" name="courses_exam_start_modal_instructions" value="{{ $contents->courses_exam_start_modal_instructions ?? '' }}" placeholder="Start Modal Instructions"> -->

                        <textarea class="editor" id="content" name="courses_exam_start_modal_instructions">{{ $contents->courses_exam_start_modal_instructions }}</textarea>
                    </div>

                    <div class="col-4">
                        <label for="courses_exam_instructions" class="form-label">Exam Instructions</label>
                        <!-- <input type="text" class="form-control" id="courses_exam_instructions" name="courses_exam_instructions" value="{{ $contents->courses_exam_instructions ?? '' }}" placeholder="Exam Instructions"> -->

                        <textarea class="editor" id="content" name="courses_exam_instructions">{{ $contents->courses_exam_instructions }}</textarea>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Qualifications</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="qualifications_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="qualifications_title" name="qualifications_title" value="{{ $contents->qualifications_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="qualifications_search" class="form-label">Search</label>
                        <input type="text" class="form-control" id="qualifications_search" name="qualifications_search" value="{{ $contents->qualifications_search ?? '' }}" placeholder="Search">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="qualifications_download" class="form-label">Download</label>
                        <input type="text" class="form-control" id="qualifications_download" name="qualifications_download" value="{{ $contents->qualifications_download ?? '' }}" placeholder="Download">
                    </div>

                    <div class="col-4">
                        <label for="qualifications_issued" class="form-label">Issued</label>
                        <input type="text" class="form-control" id="qualifications_issued" name="qualifications_issued" value="{{ $contents->qualifications_issued ?? '' }}" placeholder="Issued">
                    </div>

                    <div class="col-4">
                        <label for="qualifications_no_certificates" class="form-label">No Certificates</label>
                        <input type="text" class="form-control" id="qualifications_no_certificates" name="qualifications_no_certificates" value="{{ $contents->qualifications_no_certificates ?? '' }}" placeholder="No Certificates">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">My Storage</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="my_storage_corner_title" name="my_storage_corner_title" value="{{ $contents->my_storage_corner_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_first_tab" class="form-label">First Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_first_tab" name="my_storage_corner_first_tab" value="{{ $contents->my_storage_corner_first_tab ?? '' }}" placeholder="First Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_second_tab" class="form-label">Second Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_second_tab" name="my_storage_corner_second_tab" value="{{ $contents->my_storage_corner_second_tab ?? '' }}" placeholder="Second Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_third_tab" class="form-label">Third Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_third_tab" name="my_storage_corner_third_tab" value="{{ $contents->my_storage_corner_third_tab ?? '' }}" placeholder="Third Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_fourth_tab" class="form-label">Fourth Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_fourth_tab" name="my_storage_corner_fourth_tab" value="{{ $contents->my_storage_corner_fourth_tab ?? '' }}" placeholder="Fourth Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_fifth_tab" class="form-label">Fifth Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_fifth_tab" name="my_storage_corner_fifth_tab" value="{{ $contents->my_storage_corner_fifth_tab ?? '' }}" placeholder="Fifth Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_sixth_tab" class="form-label">Sixth Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_sixth_tab" name="my_storage_corner_sixth_tab" value="{{ $contents->my_storage_corner_sixth_tab ?? '' }}" placeholder="Sixth Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_seventh_tab" class="form-label">Seventh Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_seventh_tab" name="my_storage_corner_seventh_tab" value="{{ $contents->my_storage_corner_seventh_tab ?? '' }}" placeholder="Seventh Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_eighth_tab" class="form-label">Eighth Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_eighth_tab" name="my_storage_corner_eighth_tab" value="{{ $contents->my_storage_corner_eighth_tab ?? '' }}" placeholder="Eighth Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_ninth_tab" class="form-label">Ninth Tab</label>
                        <input type="text" class="form-control" id="my_storage_corner_ninth_tab" name="my_storage_corner_ninth_tab" value="{{ $contents->my_storage_corner_ninth_tab ?? '' }}" placeholder="Ninth Tab">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_first_column" class="form-label">First Column</label>
                        <input type="text" class="form-control" id="my_storage_corner_first_column" name="my_storage_corner_first_column" value="{{ $contents->my_storage_corner_first_column ?? '' }}" placeholder="First Column">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="my_storage_corner_second_column" class="form-label">Second Column</label>
                        <input type="text" class="form-control" id="my_storage_corner_second_column" name="my_storage_corner_second_column" value="{{ $contents->my_storage_corner_second_column ?? '' }}" placeholder="Second Column">
                    </div>

                    <div class="col-4">
                        <label for="my_storage_corner_third_column" class="form-label">Third Column</label>
                        <input type="text" class="form-control" id="my_storage_corner_third_column" name="my_storage_corner_third_column" value="{{ $contents->my_storage_corner_third_column ?? '' }}" placeholder="Third Column">
                    </div>

                    <div class="col-4">
                        <label for="my_storage_corner_watch_on_vimeo" class="form-label">Watch on Vimeo</label>
                        <input type="text" class="form-control" id="my_storage_corner_watch_on_vimeo" name="my_storage_corner_watch_on_vimeo" value="{{ $contents->my_storage_corner_watch_on_vimeo ?? '' }}" placeholder="Watch on Vimeo">
                    </div>

                    <div class="col-4">
                        <label for="my_storage_corner_download" class="form-label">Download</label>
                        <input type="text" class="form-control" id="my_storage_corner_download" name="my_storage_corner_download" value="{{ $contents->my_storage_corner_download ?? '' }}" placeholder="Download">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Buy Study Material</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="buy_study_material_corner_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="buy_study_material_corner_title" name="buy_study_material_corner_title" value="{{ $contents->buy_study_material_corner_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="buy_study_material_corner_select" class="form-label">Select</label>
                        <input type="text" class="form-control" id="buy_study_material_corner_select" name="buy_study_material_corner_select" value="{{ $contents->buy_study_material_corner_select ?? '' }}" placeholder="Select">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="buy_study_material_corner_choose" class="form-label">Choose</label>
                        <input type="text" class="form-control" id="buy_study_material_corner_choose" name="buy_study_material_corner_choose" value="{{ $contents->buy_study_material_corner_choose ?? '' }}" placeholder="Choose">
                    </div>

                    <div class="col-4">
                        <label for="buy_study_material_corner_button" class="form-label">Button</label>
                        <input type="text" class="form-control" id="buy_study_material_corner_button" name="buy_study_material_corner_button" value="{{ $contents->buy_study_material_corner_button ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Ask the Experts</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="ask_the_experts_title" name="ask_the_experts_title" value="{{ $contents->ask_the_experts_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_sub_title" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="ask_the_experts_sub_title" name="ask_the_experts_sub_title" value="{{ $contents->ask_the_experts_sub_title ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="ask_the_experts_subject" name="ask_the_experts_subject" value="{{ $contents->ask_the_experts_subject ?? '' }}" placeholder="Subject">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_subject_placeholder" class="form-label">Subject Placeholder</label>
                        <input type="text" class="form-control" id="ask_the_experts_subject_placeholder" name="ask_the_experts_subject_placeholder" value="{{ $contents->ask_the_experts_subject_placeholder ?? '' }}" placeholder="Subject Placeholder">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_initial_message" class="form-label">Initial Message</label>
                        <input type="text" class="form-control" id="ask_the_experts_initial_message" name="ask_the_experts_initial_message" value="{{ $contents->ask_the_experts_initial_message ?? '' }}" placeholder="Initial Message">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_initial_message_placeholder" class="form-label">Initial Message Placeholder</label>
                        <input type="text" class="form-control" id="ask_the_experts_initial_message_placeholder" name="ask_the_experts_initial_message_placeholder" value="{{ $contents->ask_the_experts_initial_message_placeholder ?? '' }}" placeholder="Initial Message Placeholder">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_button" class="form-label">Button</label>
                        <input type="text" class="form-control" id="ask_the_experts_button" name="ask_the_experts_button" value="{{ $contents->ask_the_experts_button ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_history_title" class="form-label">History Title</label>
                        <input type="text" class="form-control" id="ask_the_experts_history_title" name="ask_the_experts_history_title" value="{{ $contents->ask_the_experts_history_title ?? '' }}" placeholder="History Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_history_sub_title" class="form-label">History Sub Title</label>
                        <input type="text" class="form-control" id="ask_the_experts_history_sub_title" name="ask_the_experts_history_sub_title" value="{{ $contents->ask_the_experts_history_sub_title ?? '' }}" placeholder="History Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_history_answered" class="form-label">Answered</label>
                        <input type="text" class="form-control" id="ask_the_experts_history_answered" name="ask_the_experts_history_answered" value="{{ $contents->ask_the_experts_history_answered ?? '' }}" placeholder="Answered">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_history_unanswered" class="form-label">Unanswered</label>
                        <input type="text" class="form-control" id="ask_the_experts_history_unanswered" name="ask_the_experts_history_unanswered" value="{{ $contents->ask_the_experts_history_unanswered ?? '' }}" placeholder="Unanswered">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_chat_title" class="form-label">Chat Title</label>
                        <input type="text" class="form-control" id="ask_the_experts_chat_title" name="ask_the_experts_chat_title" value="{{ $contents->ask_the_experts_chat_title ?? '' }}" placeholder="Chat Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_chat_sub_title" class="form-label">Chat Sub Title</label>
                        <input type="text" class="form-control" id="ask_the_experts_chat_sub_title" name="ask_the_experts_chat_sub_title" value="{{ $contents->ask_the_experts_chat_sub_title ?? '' }}" placeholder="Chat Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_chat_leave_message" class="form-label">Leave Message</label>
                        <input type="text" class="form-control" id="ask_the_experts_chat_leave_message" name="ask_the_experts_chat_leave_message" value="{{ $contents->ask_the_experts_chat_leave_message ?? '' }}" placeholder="Leave Message">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="ask_the_experts_chat_leave_message_placeholder" class="form-label">Leave Message Placeholder</label>
                        <input type="text" class="form-control" id="ask_the_experts_chat_leave_message_placeholder" name="ask_the_experts_chat_leave_message_placeholder" value="{{ $contents->ask_the_experts_chat_leave_message_placeholder ?? '' }}" placeholder="Leave Message Placeholder">
                    </div>

                    <div class="col-4">
                        <label for="ask_the_experts_chat_button" class="form-label">Chat Button</label>
                        <input type="text" class="form-control" id="ask_the_experts_chat_button" name="ask_the_experts_chat_button" value="{{ $contents->ask_the_experts_chat_button ?? '' }}" placeholder="Chat Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Technical Supports</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="technical_supports_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="technical_supports_title" name="technical_supports_title" value="{{ $contents->technical_supports_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="technical_supports_subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="technical_supports_subject" name="technical_supports_subject" value="{{ $contents->technical_supports_subject ?? '' }}" placeholder="Subject">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="technical_supports_message" class="form-label">Message</label>
                        <input type="text" class="form-control" id="technical_supports_message" name="technical_supports_message" value="{{ $contents->technical_supports_message ?? '' }}" placeholder="Message">
                    </div>

                    <div class="col-4">
                        <label for="technical_supports_button" class="form-label">Button</label>
                        <input type="text" class="form-control" id="technical_supports_button" name="technical_supports_button" value="{{ $contents->technical_supports_button ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Refer Friends</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="refer_friends_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="refer_friends_title" name="refer_friends_title" value="{{ $contents->refer_friends_title ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="refer_friends_email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="refer_friends_email" name="refer_friends_email" value="{{ $contents->refer_friends_email ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="refer_friends_email_placeholder" class="form-label">Email Placeholder</label>
                        <input type="text" class="form-control" id="refer_friends_email_placeholder" name="refer_friends_email_placeholder" value="{{ $contents->refer_friends_email_placeholder ?? '' }}" placeholder="Email Placeholder">
                    </div>

                    <div class="col-4">
                        <label for="refer_friends_button" class="form-label">Button</label>
                        <input type="text" class="form-control" id="refer_friends_button" name="refer_friends_button" value="{{ $contents->refer_friends_button ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-4">
                        <label for="refer_friends_view_history" class="form-label">View History</label>
                        <input type="text" class="form-control" id="refer_friends_view_history" name="refer_friends_view_history" value="{{ $contents->refer_friends_view_history ?? '' }}" placeholder="View History">
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