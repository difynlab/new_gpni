@extends('backend.layouts.app')

@section('title', 'Nutritionists')

@section('content')

    <x-backend.breadcrumb page_name="Nutritionists"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.persons.nutritionists.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Nutritionist
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.persons.nutritionists.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}" placeholder="Name">
                        </div>

                        <div class="col-3">
                            <input type="text" class="form-control" name="email" value="{{ $email ?? '' }}" placeholder="Email">
                        </div>

                        <div class="col-3">
                            <select class="form-control form-select" name="language">
                                <option value="All" selected>All languages</option>
                                <option value="English" {{ isset($language) && $language == 'English' ? "selected" : "" }}>English</option>
                                <option value="Chinese" {{ isset($language) && $language == 'Chinese' ? "selected" : "" }}>Chinese</option>
                                <option value="Japanese" {{ isset($language) && $language == 'Japanese' ? "selected" : "" }}>Japanese</option>
                            </select>
                        </div>

                        <div class="col-3 d-flex justify-content-between">
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
                            <th scope="col">Language</th>
                            <th scope="col">Certificate Number</th>
                            <th scope="col">CEC Status</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($nutritionists) > 0)
                            @foreach($nutritionists as $nutritionist)
                                <tr>
                                    <td>#{{ $nutritionist->id }}</td>
                                    <td>{!! $nutritionist->image !!}</td>
                                    <td>{{ $nutritionist->name }}</td>
                                    <td>{{ $nutritionist->language }}</td>
                                    <td>{{ $nutritionist->certificate_number }}</td>
                                    <td>{!! $nutritionist->cec_status !!}</td>
                                    <td>{!! $nutritionist->status !!}</td>
                                    <td>{!! $nutritionist->action !!}</td>
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

                {{ $nutritionists->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Nutritionist"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.persons.nutritionists.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $nutritionists->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush