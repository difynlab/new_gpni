@extends('backend.layouts.app')

@section('title', 'Master Class')

@section('content')

    <x-backend.breadcrumb page_name="Master Class"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.master-class.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
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

                        <div>
                            <label for="section_1_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control textarea" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" rows="5" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
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

                                            <img src="{{ asset('storage/backend/courses/master-classes/' . $section_3_point->image) }}" alt="Image" class="add-more-image">

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

                        <div>
                            <label for="section_4_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control textarea" id="section_4_description_{{ $short_code }}" name="section_4_description_{{ $short_code }}" rows="5" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
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
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
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