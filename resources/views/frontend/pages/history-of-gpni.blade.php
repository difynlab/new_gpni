@extends('frontend.layouts.app')

@section('title', 'History of GPNi')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/history-of-gpni.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="section">
            <div class="text-container">
                <div class="since">
                    {{ $contents->{'section_1_large_title_' . $middleware_language} ?? $contents->section_1_large_title_en }}

                    <br>

                    <div class="history">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</div>
                    
                    {{ $contents->{'section_1_year_' . $middleware_language} ?? $contents->section_1_year_en }}
                </div>
            </div>

            <br>
            <br>

            <div class="image-container">
                @if($contents->{'section_1_image_' . $middleware_language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Section 1 Image" class="img-fluid">
                @elseif($contents->section_1_image_en)
                    <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Section 1 Image" class="img-fluid">
                @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="No Image" class="img-fluid">
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="who-we-are">
            <h2 class="ff-poppins-medium fs-49">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h2>

            <h3 class="fs-31 ff-poppins-medium">{{ $contents->{'section_2_sub_title_' . $middleware_language} ?? $contents->section_2_sub_title_en }}</h3>

            <p class="fs-25 ff-poppins-regular">{{ $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en }}</p>
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="our-story">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="pb-3 fs-49 ff-poppins-medium">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h2>
                        <div class="fs-25 ff-poppins-regular">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>
                    </div>
                    <div class="col-md-6">
                        @if($contents->{'section_3_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $middleware_language}) }}" alt="GPNI Image" class="img-fluid">
                        @elseif($contents->section_3_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_3_image_en) }}" alt="GPNI Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNI Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="our-founders">
            <div class="container">
                <h2 class="fs-49 ff-poppins-medium">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h2>

                @foreach($advisory_boards as $key => $advisory_board)
                    <div class="row founder align-items-center">
                        @if($key == 0)
                            <div class="col-lg-2 text-center text-md-start">
                                <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" alt="{{ $advisory_board->name }}" class="img-fluid">
                            </div>
                            <div class="col-lg-10 text-center text-md-start">
                                <h4 class="p-0 m-0 fs-31 ff-poppins-semibold">{{ $advisory_board->name }}</h4>
                                <div class="title py-2 fs-20 ff-poppins-regular">{{ $advisory_board->designations }}</div>
                                <div class="pt-3 fs-25">{!! $advisory_board->description !!}</div>
                            </div>
                        @else
                            <div class="col-lg-10 text-center text-md-end order-2 order-md-1">
                                <h4 class="p-0 m-0 fs-31 ff-poppins-semibold">{{ $advisory_board->name }}</h4>
                                <div class="title py-2 fs-20 ff-poppins-regular">{{ $advisory_board->designations }}</div>
                                <div class="pt-3 fs-25">{!! $advisory_board->description !!}</div>
                            </div>
                            <div class="col-lg-2 text-center text-md-start order-1 order-md-2">
                                <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" alt="{{ $advisory_board->name }}" class="img-fluid">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    
    @if($contents->section_5_title_en)
        <div class="our-partners">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        @if($contents->{'section_5_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_' . $middleware_language}) }}"  alt="Section 05 Image" class="img-fluid">
                        @elseif($contents->section_5_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_5_image_en) }}" alt="Section 05 Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Section 05 Image" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h2 class="fs-49 ff-poppins-medium">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</h2>
                        <div class="fs-25 ff-poppins-regular">{!! $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_6_title_en)
        <div class="gold-standard py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fs-49 ff-poppins-medium">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</h2>
                        <div class="fs-25 ff-poppins-regular">{!! $contents->{'section_6_description_' . $middleware_language} ?? $contents->section_6_description_en !!}</div>
                    </div>
                    <div class="col-md-6">
                        @if($contents->{'section_6_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_' . $middleware_language}) }}" alt="Section 06 Image" class="img-fluid">
                        @elseif($contents->section_6_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_6_image_en) }}" alt="Section 06 Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Section 06 Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection