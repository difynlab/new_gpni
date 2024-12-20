@extends('backend.layouts.app')

@section('title', 'Course Reviews')

@section('content')

    <x-backend.breadcrumb page_name="Course Reviews"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-3 align-items-center">
            <div class="col-9">
                <p class="table-title">{{ $course->title }}</p>
                <p class="table-sub-title">All the list of course reviews</p>
            </div>
            <div class="col-3 text-end">
                <a href="{{ route('backend.courses.reviews.create', $course) }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add Review
                </a>
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
                            <th scope="col">Rating</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($course_reviews) > 0)
                            @foreach($course_reviews as $course_review)
                                <tr>
                                    <td>#{{ $course_review->id }}</td>
                                    <td>{!! $course_review->name !!}</td>
                                    <td>{{ $course_review->rating }}</td>
                                    <td>{!! $course_review->status !!}</td>
                                    <td>{!! $course_review->action !!}</td>
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

                {{ $course_reviews->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Course Review"></x-backend.delete-data>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let courseId = '<?php echo json_decode($course->id); ?>';
                let url = "{{ route('backend.courses.reviews.destroy', [':courseId', ':id']) }}";
                destroy_url = url.replace(':courseId', courseId).replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $course_reviews->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush