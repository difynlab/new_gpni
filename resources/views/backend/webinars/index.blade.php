@extends('backend.layouts.app')

@section('title', 'Webinars')

@section('content')

    <x-backend.breadcrumb page_name="Webinars"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.webinars.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Webinar
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.webinars.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <select class="form-control form-select" name="type">
                                <option value="All" selected>All type</option>
                                <option value="Recent" {{ isset($type) && $type == 'Recent' ? "selected" : "" }}>Recent</option>
                                <option value="Previous" {{ isset($type) && $type == 'Previous' ? "selected" : "" }}>Previous</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <select class="form-control form-select" name="language">
                                <option value="All" selected>All languages</option>
                                <option value="English" {{ isset($language) && $language == 'English' ? "selected" : "" }}>English</option>
                                <option value="Chinese" {{ isset($language) && $language == 'Chinese' ? "selected" : "" }}>Chinese</option>
                                <option value="Japanese" {{ isset($language) && $language == 'Japanese' ? "selected" : "" }}>Japanese</option>
                            </select>
                        </div>

                        <div class="col-4 d-flex justify-content-between">
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
                            <th scope="col">Video</th>
                            <th scope="col">Content</th>
                            <th scope="col">Type</th>
                            <th scope="col">Language</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($webinars) > 0)
                            @foreach($webinars as $webinar)
                                <tr>
                                    <td>#{{ $webinar->id }}</td>
                                    <td>{!! $webinar->video !!}</td>
                                    <td>
                                        <div class="line-clamp-1">
                                            {!! $webinar->content !!}
                                        </div>
                                    </td>
                                    <td>{{ $webinar->type }}</td>
                                    <td>{{ $webinar->language }}</td>
                                    <td>{!! $webinar->status !!}</td>
                                    <td>{!! $webinar->action !!}</td>
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

                {{ $webinars->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Webinar"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.webinars.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $webinars->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush