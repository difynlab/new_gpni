@extends('backend.layouts.app')

@section('title', 'Course Chapters')

@section('content')

    <x-backend.breadcrumb page_name="Course Chapters"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-9">
                <p class="table-title">{{ $course->title }} : {{ $course_module->title }}</p>
                <p class="table-sub-title">All the list of chapters</p>
            </div>
            <div class="col-3 text-end">
                <a href="{{ route('backend.courses.module-chapters.create', $course_module) }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Chapter
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
                            <th scope="col">Chapter No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($course_chapters) > 0)
                            @foreach($course_chapters as $course_chapter)
                                <tr>
                                    <td>#{{ $course_chapter->id }}</td>
                                    <td>{{ $course_chapter->chapter_no ?? '-' }}</td>
                                    <td>{{ $course_chapter->title }}</td>
                                    <td>{!! $course_chapter->status !!}</td>
                                    <td>{!! $course_chapter->action !!}</td>
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

                {{ $course_chapters->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Course Chapter"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let courseModuleId = '<?php echo json_decode($course_module->id); ?>';
                let url = "{{ route('backend.courses.module-chapters.destroy', [':courseModuleId', ':id']) }}";
                destroy_url = url.replace(':courseModuleId', courseModuleId).replace(':id', id);
                
                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $course_chapters->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush