@extends('backend.layouts.app')

@section('title', 'Technical Supports')

@section('content')

    <x-backend.breadcrumb page_name="Technical Supports"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.communications.technical-supports.filter') }}" method="POST" class="filter-form">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-10">
                            <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}" placeholder="User Name">
                        </div>

                        <div class="col-2 d-flex justify-content-between">
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
            
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($technical_supports) > 0)
                            @foreach($technical_supports as $technical_support)
                                <tr>
                                    <td>#{{ $technical_support->id }}</td>
                                    <td>{{ $technical_support->user }}</td>
                                    <td>{{ $technical_support->subject }}</td>
                                    <td>{{ $technical_support->message }}</td>
                                    <td>{!! $technical_support->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $technical_supports->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Technical Support"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.communications.technical-supports.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $technical_supports->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush