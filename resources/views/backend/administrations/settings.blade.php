@extends('backend.layouts.app')

@section('title', 'Settings')

@section('content')

    <x-backend.breadcrumb page_name="Settings"></x-backend.breadcrumb>
    
    <div class="static-pages">
        <form action="{{ route('backend.settings.update', 1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="section">
                <p class="inner-page-title">Site Details <span>(Important)</span></p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $settings->name) }}" placeholder="Name" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="lifetime_membership_price_en" class="form-label">Lifetime Membership Price (English)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="lifetime_membership_price_en" name="lifetime_membership_price_en" value="{{ old('lifetime_membership_price_en', $settings->lifetime_membership_price_en) }}" placeholder="Lifetime Membership Price (English)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="lifetime_membership_price_zh" class="form-label">Lifetime Membership Price (Chinese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="lifetime_membership_price_zh" name="lifetime_membership_price_zh" value="{{ old('lifetime_membership_price_zh', $settings->lifetime_membership_price_zh) }}" placeholder="Lifetime Membership Price (Chinese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="lifetime_membership_price_ja" class="form-label">Lifetime Membership Price (Japanese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="lifetime_membership_price_ja" name="lifetime_membership_price_ja" value="{{ old('lifetime_membership_price_ja', $settings->lifetime_membership_price_ja) }}" placeholder="Lifetime Membership Price (Japanese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="annual_membership_price_en" class="form-label">Annual Membership Price (English)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="annual_membership_price_en" name="annual_membership_price_en" value="{{ old('annual_membership_price_en', $settings->annual_membership_price_en) }}" placeholder="Annual Membership Price (English)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="annual_membership_price_zh" class="form-label">Annual Membership Price (Chinese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="annual_membership_price_zh" name="annual_membership_price_zh" value="{{ old('annual_membership_price_zh', $settings->annual_membership_price_zh) }}" placeholder="Annual Membership Price (Chinese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="annual_membership_price_ja" class="form-label">Annual Membership Price (Japanese)<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="annual_membership_price_ja" name="annual_membership_price_ja" value="{{ old('annual_membership_price_ja', $settings->annual_membership_price_ja) }}" placeholder="Annual Membership Price (Japanese)" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="email" class="form-label">Email<span class="asterisk">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $settings->email) }}" placeholder="Email" required>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}" placeholder="Phone">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="fax" class="form-label">Fax</label>
                        <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax', $settings->fax) }}" placeholder="Fax">
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_logo" old_value="{{ $settings->{'logo'} ?? '' }}" new_name="new_logo" label="Logo" path="common"></x-backend.upload-image>
                        <x-backend.input-error field="new_logo"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_favicon" old_value="{{ $settings->{'favicon'} ?? '' }}" new_name="new_favicon" label="Favicon" path="common"></x-backend.upload-image>
                        <x-backend.input-error field="new_favicon"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Site Details <span>(Social medias)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="fb" class="form-label">FB</label>
                        <input type="url" class="form-control" id="fb" name="fb" value="{{ old('fb', $settings->fb) }}" placeholder="FB">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $settings->instagram) }}" placeholder="Instagram">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weibo" class="form-label">Weibo</label>
                        <input type="url" class="form-control" id="weibo" name="weibo" value="{{ old('weibo', $settings->weibo) }}" placeholder="Weibo">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="weixin" class="form-label">Weixin</label>
                        <input type="url" class="form-control" id="weixin" name="weixin" value="{{ old('weixin', $settings->weixin) }}" placeholder="Weixin">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="url" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $settings->youtube) }}" placeholder="Youtube">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings->linkedin) }}" placeholder="Linkedin">
                    </div>

                    <div class="col-6">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="url" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $settings->twitter) }}" placeholder="Twitter">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Site Images <span>(Other images)</span></p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <x-backend.upload-image old_name="old_guest_image" old_value="{{ $settings->{'guest_image'} ?? '' }}" new_name="new_guest_image" label="Guest" path="common"></x-backend.upload-image>
                        <x-backend.input-error field="new_guest_image"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <x-backend.upload-image old_name="old_footer_logo" old_value="{{ $settings->{'footer_logo'} ?? '' }}" new_name="new_footer_logo" label="Footer Logo" path="common"></x-backend.upload-image>
                        <x-backend.input-error field="new_footer_logo"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_no_image" old_value="{{ $settings->{'no_image'} ?? '' }}" new_name="new_no_image" label="No" path="common"></x-backend.upload-image>
                        <x-backend.input-error field="new_no_image"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_no_profile_image" old_value="{{ $settings->{'no_profile_image'} ?? '' }}" new_name="new_no_profile_image" label="No Profile" path="common"></x-backend.upload-image>
                        <x-backend.input-error field="new_no_profile_image"></x-backend.input-error>
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
@endpush