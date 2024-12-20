@extends('backend.layouts.app')

@section('title', 'Advisory Boards')

@section('content')

    <x-backend.breadcrumb page_name="Advisory Boards"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.persons.advisory-boards.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Advisory Board
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.persons.advisory-boards.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-4 col-xl-5">
                            <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}" placeholder="Name">
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
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designations</th>
                            <th scope="col">Language</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($advisory_boards) > 0)
                            @foreach($advisory_boards as $advisory_board)
                                <tr>
                                    <td>#{{ $advisory_board->id }}</td>
                                    <td>{!! $advisory_board->image !!}</td>
                                    <td>{{ $advisory_board->name }}</td>
                                    <td>{{ $advisory_board->designations }}</td>
                                    <td>{{ $advisory_board->language }}</td>
                                    <td>{!! $advisory_board->status !!}</td>
                                    <td>{!! $advisory_board->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $advisory_boards->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Advisory Board"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.persons.advisory-boards.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $advisory_boards->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush