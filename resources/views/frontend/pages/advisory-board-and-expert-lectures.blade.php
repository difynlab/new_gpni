@extends('frontend.layouts.app')

@section('title', 'Advisory Board and Expert Lectures')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/advisory-board-and-expert-lectures.css') }}">
@endpush

@section('content')

    <div class="container mt-5">
        @if($contents->title_en)
            <div class="row">
                <div class="container">
                    <h2>{{ $contents->{'title_'. $middleware_language} ?? $contents->title_en }}</h2>
                    <div>{!! $contents->{'description_'. $middleware_language} ?? $contents->description_en !!}</div>
                </div>
            </div>
        @endif

        <div class="row gap-32">
            @foreach($advisory_boards as $advisory_board)
                <div class="col-md-4 mb-4">
                    <div class="card" role="button" data-bs-toggle="modal" data-bs-target="#my-modal-{{ $advisory_board->id }}">
                        <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="card-img-top" alt="{{ $advisory_board->name }}">

                        <div class="card-body bg-light">
                            <h5 class="card-title text-primary">{{ $advisory_board->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-info">{{ $advisory_board->designations }}</h6>
                            <div class="card-text text-muted">{!! $advisory_board->description !!}</div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="my-modal-{{ $advisory_board->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-bs-dismiss="modal">
                                <img src="{{ asset('storage/frontend/close.svg') }}" alt="Close">
                            </button>

                            <div class="modal-body">
                                <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="popup-image" alt="{{ $advisory_board->name }}">

                                <div class="popup-content">
                                    <div class="popup-info">
                                        <h3>{{ $advisory_board->name }}</h3>
                                        <h4>{{ $advisory_board->designations }}</h4>
                                    </div>

                                    <div class="popup-description">{!! $advisory_board->description !!}</div>

                                    <div class="social-icons">
                                        @if($advisory_board->fb)
                                            <a href="{{ $advisory_board->fb }}" target="_blank"><img src="{{ asset('storage/frontend/advisory-fb.svg') }}" alt="Facebook"></a>
                                        @endif

                                        @if($advisory_board->linkedin)
                                            <a href="{{ $advisory_board->linkedin }}" target="_blank"><img src="{{ asset('storage/frontend/advisory-linkedin.svg') }}" alt="LinkedIn"></a>
                                        @endif
                                    </div>

                                </div>

                                <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->logo) }}" class="gpni-logo" alt="GPNi">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection