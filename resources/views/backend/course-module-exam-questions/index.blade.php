@extends('backend.layouts.app')

@section('title', 'Course Module Exam Questions')

@section('content')

    <x-backend.breadcrumb page_name="Course Module Exam Questions"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-3 align-items-center">
            <div class="col-9">
                <p class="table-title">{{ $course->title }} : {{ $course_module->title }}</p>
                <p class="table-sub-title">All the list of exam questions</p>
            </div>
            <div class="col-3 text-end">
                <a href="{{ route('backend.courses.module-exam-questions.create', $course_module) }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add Question
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
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($course_module_exam_questions) > 0)
                            @foreach($course_module_exam_questions as $course_module_exam_question)
                                <tr>
                                    <td>#{{ $course_module_exam_question->id }}</td>
                                    <td>{!! $course_module_exam_question->question !!}</td>
                                    <td>{{ $course_module_exam_question->answer }}</td>
                                    <td>{!! $course_module_exam_question->status !!}</td>
                                    <td>{!! $course_module_exam_question->action !!}</td>
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

                {{ $course_module_exam_questions->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Question"></x-backend.delete-data>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let courseModuleId = '<?php echo json_decode($course_module->id); ?>';
                let url = "{{ route('backend.courses.module-exam-questions.destroy', [':courseModuleId', ':id']) }}";
                destroy_url = url.replace(':courseModuleId', courseModuleId).replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $course_module_exam_questions->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush