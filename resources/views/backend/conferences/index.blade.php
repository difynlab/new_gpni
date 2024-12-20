@extends('backend.layouts.app')

@section('title', 'Conferences')

@section('content')

    <x-backend.breadcrumb page_name="Conferences"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.conferences.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Conference
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.conferences.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-4 col-xl-5">
                            <input type="text" class="form-control" name="title" value="{{ $title ?? '' }}" placeholder="Title">
                        </div>

                        <div class="col-4 col-xl-5">
                            <select class="form-control form-select" name="language">
                                <option value="All" selected>All languages</option>
                                <option value="English" {{ isset($language) && $language == 'English' ? "selected" : "" }}>English</option>
                                <option value="Chinese" {{ isset($language) && $language == 'Chinese' ? "selected" : "" }}>Chinese</option>
                                <option value="Japanese" {{ isset($language) && $language == 'Japanese' ? "selected" : "" }}>Japanese</option>
                            </select>
                        </div>

                        <div class="col-4 col-xl-2 d-flex justify-content-between">
                            <button type="submit" class="filter-search-button" name="action" value="search">SEARCH</button>

                            <button type="submit" class="filter-reset-button" name="action" value="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <div class="table-container mb-3">
                    <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Language</th>
                            <th scope="col">Date</th>
                            <th scope="col">Where</th>
                            <th scope="col">Early Registration Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($conferences) > 0)
                            @foreach($conferences as $conference)
                                <tr>
                                    <td>#{{ $conference->id }}</td>
                                    <td>{{ $conference->title }}</td>
                                    <td>{{ $conference->language }}</td>
                                    <td>{{ $conference->date }}</td>
                                    <td>{{ $conference->where }}</td>
                                    <td>{{ $conference->early_registration_deadline }}</td>
                                    <td>{!! $conference->status !!}</td>
                                    <td>{!! $conference->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $conferences->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Conference"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.conferences.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $conferences->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush