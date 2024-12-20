@extends('backend.layouts.app')

@section('title', 'Courses')

@section('content')

    <x-backend.breadcrumb page_name="Courses"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.persons.students.courses.create', $student) }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add Course
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.persons.students.courses.filter', $student) }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <input type="text" class="form-control" name="title" value="{{ $title ?? '' }}" placeholder="Title">
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
                            <th scope="col">Course</th>
                            <th scope="col">Course Access Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($course_purchases) > 0)
                            @foreach($course_purchases as $course_purchase)
                                <tr>
                                    <td>#{{ $course_purchase->id }}</td>
                                    <td>{{ $course_purchase->course }}</td>
                                    <td>{!! $course_purchase->course_access_status !!}</td>
                                    <td>{!! $course_purchase->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $course_purchases->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Course"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let user_id = '<?php echo $student->id; ?>';
                let url = "{{ route('backend.persons.students.courses.destroy', [':id', ':user_id']) }}";
                destroy_url = url.replace(':id', id).replace(':user_id', user_id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $course_purchases->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush