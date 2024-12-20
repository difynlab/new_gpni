@extends('backend.layouts.app')

@section('title', 'Policy')

@section('content')

    <x-backend.breadcrumb page_name="Policy"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.policies.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Policy
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.policies.filter') }}" method="GET" class="filter-form">
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
                            <th scope="col">Policy Category</th>
                            <th scope="col">Language</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($policies) > 0)
                            @foreach($policies as $policy)
                                <tr>
                                    <td>#{{ $policy->id }}</td>
                                    <td>{{ $policy->title }}</td>
                                    <td>{{ $policy->policy_category }}</td>
                                    <td>{{ $policy->language }}</td>
                                    <td>{!! $policy->status !!}</td>
                                    <td>{!! $policy->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $policies->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Policy"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.policies.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $policies->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush