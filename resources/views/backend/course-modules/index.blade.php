@extends('backend.layouts.app')

@section('title', 'Course Modules')

@section('content')

    <x-backend.breadcrumb page_name="Course Modules"></x-backend.breadcrumb>
        
    <div class="static-pages">
        <div class="row mb-3 align-items-center">
            <div class="col-9">
                <p class="table-title">{{ $course->title }}</p>
                <p class="table-sub-title">All the list of modules</p>
            </div>
            <div class="col-3 text-end">
                <button type="button" class="btn add-button" data-bs-toggle="modal" data-bs-target="#add-module-modal">
                    <i class="bi bi-plus-lg"></i>
                    Add Module
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table w-100 table-borderless">
                    <tbody>
                        @if(count($course_modules) > 0)
                            @foreach($course_modules as $course_module)
                                <tr>
                                    <td>
                                        <input type="text" class="form-control module-title table-input" value="{{ $course_module->title }}" disabled>

                                        <textarea class="form-control module-description table-input" name="description" value="{{ $course_module->description }}" disabled>{{ $course_module->description }}</textarea>
                                    </td>
                                    <td>
                                        @if($course_module->module_exam == 'Yes')
                                            <a href="{{ route('backend.courses.module-exam-questions.index', $course_module->id) }}" class="exam-questions-button" title="Exam Questions">
                                                <i class="bi bi-patch-question-fill"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('backend.courses.module-chapters.index', $course_module->id) }}" class="chapter-button" title="Chapters">
                                            <i class="bi bi-bookmarks-fill"></i>
                                        </a>

                                        <a id="{{ $course_module->id }}" class="edit-button" title="Edit" data-bs-toggle="modal" data-bs-target="#edit-module-modal">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a id="{{ $course_module->id }}" class="delete-button" title="Delete">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="no-data">No modules available for this course</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add module modal -->
        <form action="{{ route('backend.courses.modules.store') }}" method="POST">
            @csrf
            <div class="modal fade" id="add-module-modal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Module</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row form-input">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description<span class="asterisk">*</span></label>
                                        <textarea class="form-control" rows="5" name="description" value="{{ old('description') }}" placeholder="Description" required>{{ old('description') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="module_exam" class="form-label">Module Exam<span class="asterisk">*</span></label>
                                        <select class="form-control form-select module-exam" id="module_exam" name="module_exam" required>
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="time_required" class="form-label">Time Required<span class="asterisk">*</span></label>
                                        <select class="form-control form-select time-required" id="time_required" name="time_required" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>

                                    <div class="mb-4 d-none exam-time-div">
                                        <label for="exam_time" class="form-label">Exam Time<span class="asterisk">*</span></label>
                                        <input type="time" class="form-control" step="1" id="exam-time" name="exam_time">
                                    </div>

                                    <div>
                                        <label for="status" class="form-label">Status<span class="asterisk">*</span></label>
                                        <select class="form-control form-select" id="status" name="status" required>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="btn close-button" data-bs-dismiss="modal" title="Cancel">Cancel</button>
                            <button type="submit" class="btn submit-button" title="Submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- Edit module modal -->
        <form action="" method="POST" class="edit-module-form-modal">
            @csrf
            <div class="modal fade" id="edit-module-modal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Module</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row form-input">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Title<span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description<span class="asterisk">*</span></label>
                                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description" required></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="module_exam" class="form-label">Module Exam<span class="asterisk">*</span></label>
                                        <select class="form-control form-select module-exam" id="module_exam" name="module_exam" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="time_required" class="form-label">Time Required<span class="asterisk">*</span></label>
                                        <select class="form-control form-select time-required" id="time_required" name="time_required" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No" selected>No</option>
                                        </select>
                                    </div>

                                    <div class="mb-4 d-none exam-time-div">
                                        <label for="exam_time" class="form-label">Exam Time<span class="asterisk">*</span></label>
                                        <input type="time" class="form-control" step="1" id="exam-time" name="exam_time">
                                    </div>

                                    <div>
                                        <label for="status" class="form-label">Status<span class="asterisk">*</span></label>
                                        <select class="form-control form-select" id="status" name="status" required>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="button" class="btn close-button" data-bs-dismiss="modal" title="Cancel">Cancel</button>
                            <button type="submit" class="btn submit-button" title="Submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        

        <!-- Delete module modal -->
        <x-backend.delete-data title="Module"></x-backend.delete-data>
    </div>

@endsection

@push('after-scripts')
    <script>
        $('.time-required').on('change', function() {
            let value = $(this).val();

            if(value == 'Yes') {
                $(this).closest('div').next().removeClass('d-none');
                $(this).closest('div').next().find('input').attr('required', true);
            }
            else {
                $(this).closest('div').next().addClass('d-none');
                $(this).closest('div').next().find('input').attr('required', false);
            }
        });

        $('.edit-button').on('click', function() {
            let value = $(this).attr('id');
            let edit_url = '{{ route("backend.courses.modules.edit", ":value") }}';
            let update_url = '{{ route("backend.courses.modules.update", ":value") }}';
            edit_url = edit_url.replace(':value', value);
            update_url = update_url.replace(':value', value);

            $('.edit-module-form-modal')[0].reset();

            $.ajax({
                url: edit_url,
                method: 'GET',
                success: function(data) {
                    $('.edit-module-form-modal #title').val(data['title']);
                    $('.edit-module-form-modal #description').val(data['description']);
                    $('.edit-module-form-modal #module_exam').val(data['module_exam']);
                    $('.edit-module-form-modal #time_required').val(data['time_required']);

                    if(data['exam_time'] != null) {
                        $('.edit-module-form-modal #exam-time').val(data['exam_time']);
                        $('.edit-module-form-modal .exam-time-div').removeClass('d-none');
                    }
                    else {
                        $('.edit-module-form-modal #exam-time').val('');
                        $('.edit-module-form-modal .exam-time-div').addClass('d-none');
                    }
                    $('.edit-module-form-modal #status').val(data['status']);

                    $('.edit-module-modal').modal('show');
                    $('.edit-module-form-modal').attr('action', update_url);
                },
                error: function() {
                    alert('Error getting data!');
                }
            });
        });

        $('.static-pages .table .delete-button').on('click', function() {
            let id = $(this).attr('id');
            let url = "{{ route('backend.courses.modules.destroy', [':id']) }}";
            destroy_url = url.replace(':id', id);

            $('.static-pages .delete-modal form').attr('action', destroy_url);
            $('.static-pages .delete-modal').modal('show');
        });
    </script>
@endpush