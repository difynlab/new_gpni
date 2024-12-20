@extends('backend.layouts.app')

@section('title', 'Testimonials')

@section('content')

    <x-backend.breadcrumb page_name="Testimonials"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.testimonials.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Testimonial
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.testimonials.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}" placeholder="Name">
                        </div>

                        <div class="col-3">
                            <select class="form-control form-select" name="rate">
                                <option value="All" selected>All rate</option>
                                <option value="1" {{ isset($rate) && $rate == '1' ? "selected" : "" }}>1</option>
                                <option value="2" {{ isset($rate) && $rate == '2' ? "selected" : "" }}>2</option>
                                <option value="3" {{ isset($rate) && $rate == '3' ? "selected" : "" }}>3</option>
                                <option value="4" {{ isset($rate) && $rate == '4' ? "selected" : "" }}>4</option>
                                <option value="5" {{ isset($rate) && $rate == '5' ? "selected" : "" }}>5</option>
                            </select>
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
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Type</th>
                            <th scope="col">Language</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($testimonials) > 0)
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>#{{ $testimonial->id }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->designation }}</td>
                                    <td>{!! $testimonial->updated_rate !!}</td>
                                    <td>{{ $testimonial->type }}</td>
                                    <td>{{ $testimonial->language }}</td>
                                    <td>{!! $testimonial->status !!}</td>
                                    <td>{!! $testimonial->action !!}</td>
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

                {{ $testimonials->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Testimonial"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.testimonials.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $testimonials->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush