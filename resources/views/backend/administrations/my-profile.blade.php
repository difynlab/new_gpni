@extends('backend.layouts.app')

@section('title', 'My Profile')

@section('content')

    <x-backend.breadcrumb page_name="My Profile"></x-backend.breadcrumb>
    
    <div class="static-pages">
        <form action="{{ route('backend.my-profile.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Profile Details <span>(Important)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="first_name" class="form-label">First Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="last_name" class="form-label">Last Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email" class="form-label">Email<span class="asterisk">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                        <x-backend.input-error field="email"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                        <x-backend.input-error field="phone"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $user->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $user->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $user->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label class="form-label">Country<span class="asterisk">*</span></label>
                        <select class="form-control form-select country" name="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 mb-4 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="* * * * * * * *">
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="password"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4 position-relative">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password" placeholder="* * * * * * * *">
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="confirm_password"></x-backend.input-error>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ $user->image ?? old('image') }}" new_name="new_image" path="persons/admins" label="Profile"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
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
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>

    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
            
            if($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush