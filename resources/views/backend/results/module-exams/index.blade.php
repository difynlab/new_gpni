@extends('backend.layouts.app')

@section('title', 'Module Exam Results')

@section('content')

    <x-backend.breadcrumb page_name="Module Exam Results"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.exam-results.module-exam-filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <input type="text" class="form-control" name="user" value="{{ $user ?? '' }}" placeholder="User">
                        </div>

                        <div class="col-3">
                            <input type="text" class="form-control" name="course" value="{{ $course ?? '' }}" placeholder="Course">
                        </div>

                        <div class="col-3">
                            <input type="text" class="form-control" name="module" value="{{ $module ?? '' }}" placeholder="Module">
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
                            <th scope="col">User</th>
                            <th scope="col">Course</th>
                            <th scope="col">Module</th>
                            <th scope="col">Marks (%)</th>
                            <th scope="col">Result</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($results) > 0)
                            @foreach($results as $result)
                                <tr>
                                    <td>#{{ $result->id }}</td>
                                    <td>{{ $result->user_id }}</td>
                                    <td>{{ $result->course_id }}</td>
                                    <td>{{ $result->module_id }}</td>
                                    <td>{{ $result->marks }}</td>
                                    <td>{!! $result->result !!}</td>
                                    <td>{!! $result->action !!}</td>
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

                {{ $results->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Module Exam Result"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.exam-results.module-exam-result-destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $results->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush