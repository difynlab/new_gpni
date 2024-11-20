@extends('frontend.layouts.app')

@section('title', 'Histories')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/histories.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">
                    <div class="header-section">
                        <h1>History & Replies</h1>

                        <a href="{{ route('frontend.ask-questions.index') }}">
                            <img src="{{ asset('storage/frontend/question-icon.svg') }}" class="icon-question" alt="Question Icon" width="28" height="28">
                            Ask a Question Now
                        </a>
                    </div>

                    <div class="questions-list">
                        @foreach($ask_questions as $ask_question)
                            <a href="{{ route('frontend.ask-questions.show', $ask_question) }}" style="text-decoration: none; color: inherit;">
                                <div class="question-card">
                                    <div class="question-header">
                                        <div class="d-flex align-items-center">
                                            <div class="title">{{ $ask_question->subject }}</div>

                                            @if($ask_question->replied)
                                                <div class="answered-status-badge">Answered Question</div>
                                            @else
                                                <div class="unanswered-status-badge">Unanswered Question</div>
                                            @endif
                                        </div>
                                        
                                        <div class="question-date">{{ $ask_question->date }} {{ $ask_question->time }}</div>
                                    </div>
                                    <div class="question-content">
                                        Question: {{ $ask_question->initial_message }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection