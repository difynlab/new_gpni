@extends('backend.layouts.app')

@section('title', 'Course Certificate')

@section('content')

    <x-backend.breadcrumb page_name="Course Certificate"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.purchases.course-purchases.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Certificate Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            @if($certificate->certificate)
                                <label for="pdf" class="form-label">Certificate<span class="asterisk">*</span></label>

                                <div class="row align-items-center">
                                    <div class="col-11">
                                        <input type="file" class="form-control" id="new_certificate" name="new_certificate" placeholder="PDF" accept=".pdf">
                                        <x-backend.input-error field="new_certificate"></x-backend.input-error>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ asset('storage/backend/courses/course-certificates/' . $certificate->certificate) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                        <input type="hidden" class="form-control" name="old_certificate" value="{{ $certificate->certificate }}">
                                    </div>
                                </div>
                            @else
                                <label for="new_certificate" class="form-label">Certificate<span class="asterisk">*</span></label>
                                <input type="file" class="form-control" id="new_certificate" name="new_certificate" placeholder="PDF" accept=".pdf" required>
                                <x-backend.input-error field="new_certificate"></x-backend.input-error>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="certificate_issued_date" class="form-label">Certificate Issued Date<span class="asterisk">*</span></label>
                            <input type="date" class="form-control" id="certificate_issued_date" name="certificate_issued_date" value="{{ old('certificate_issued_date', $certificate->certificate_issued_date) }}" placeholder="Certificate Issued Date" required>
                        </div>

                        <div>
                            <label for="certificate_issued_time" class="form-label">Certificate Issued Time<span class="asterisk">*</span></label>
                            <input type="time" class="form-control" id="certificate_issued_time" name="certificate_issued_time" value="{{ old('certificate_issued_time', $certificate->certificate_issued_time) }}" placeholder="Certificate Issued Time" required>
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