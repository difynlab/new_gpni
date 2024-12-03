@extends('backend.layouts.app')

@section('title', 'Edit ISSN Partner')

@section('content')

    <x-backend.breadcrumb page_name="Edit ISSN Partner"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.issn-partners.update', $issn_partner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">ISSN Partner Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $issn_partner->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $issn_partner->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $issn_partner->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ $issn_partner->image ?? old('image') }}" new_name="new_image" path="persons/issn-partners"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$issn_partner"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush