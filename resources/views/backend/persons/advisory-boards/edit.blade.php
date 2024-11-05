@extends('backend.layouts.app')

@section('title', 'Edit Advisory Board')

@section('content')

    <x-backend.breadcrumb page_name="Edit Advisory Board"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.advisory-boards.update', $advisory_board) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Advisory Board Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $advisory_board->name) }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="designations" class="form-label">Designations</label>
                        <input type="text" class="form-control" id="designations" name="designations" placeholder="Designations" value="{{ old('designations', $advisory_board->designations) }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $advisory_board->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $advisory_board->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $advisory_board->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="editor" id="description" name="description" value="{{ old('description', $advisory_board->description) }}" placeholder="Description">{{ old('description', $advisory_board->description) }}</textarea>
                        <x-backend.input-error field="description"></x-backend.input-error>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="fb" class="form-label">FB Link</label>
                        <input type="text" class="form-control" id="fb" name="fb" placeholder="FB Link" value="{{ old('fb', $advisory_board->fb) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="linkedin" class="form-label">LinkedIn Link</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn Link" value="{{ old('linkedin', $advisory_board->linkedin) }}">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ $advisory_board->image ?? old('image') }}" new_name="new_image" path="persons/advisory-boards"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$advisory_board"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush