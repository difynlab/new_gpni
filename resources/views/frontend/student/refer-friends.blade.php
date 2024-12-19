@extends('frontend.layouts.app')

@section('title', 'Refer Friends')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/refer-friends.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5">
                <div class="container-main">
                    <x-frontend.notification></x-frontend.notification>

                    <div class="header-section">
                        <h1>{{ $student_dashboard_contents->refer_friends_title }}</h1>
                    </div>

                    <form action="{{ route('frontend.refer-friends.store') }}" method="POST">
                        @csrf
                        <div class="row form-control-container">
                            <div class="col-12">
                                <label for="email" class="form-label">{{ $student_dashboard_contents->refer_friends_email }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ $student_dashboard_contents->refer_friends_email_placeholder }}" required>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-submit">{{ $student_dashboard_contents->refer_friends_button }}</button>
                            </div>
                        </div>
                    </form>

                    <a class="view-history" style="cursor: pointer;">
                        <img src="{{ asset('storage/frontend/history-clock-icon.svg') }}" class="icon-history" alt="History Icon" width="22" height="22">
                        {{ $student_dashboard_contents->refer_friends_view_history }}
                    </a>
                    
                    <div class="history d-none">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ $student_dashboard_contents->refer_friends_first_column }}</th>
                                    <th>{{ $student_dashboard_contents->refer_friends_second_column }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($invites) > 0)
                                    @foreach($invites as $invite)
                                        <tr>
                                            <td>{{ $invite->id }}</td>
                                            <td>{{ $invite->email }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" style="text-align: center;">{{ $student_dashboard_contents->refer_friends_no_data }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.view-history').on('click', function() {
                $('.history').toggleClass('d-none');
            });
        });
    </script>
@endpush