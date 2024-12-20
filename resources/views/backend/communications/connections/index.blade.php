@extends('backend.layouts.app')

@section('title', 'Connections')

@section('content')

    <x-backend.breadcrumb page_name="Connections"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <div class="table-container mb-3">
                    <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Question</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($connections) > 0)
                            @foreach($connections as $connection)
                                <tr>
                                    <td>#{{ $connection->id }}</td>
                                    <td>{{ $connection->first_name }}</td>
                                    <td>{{ $connection->last_name }}</td>
                                    <td>{{ $connection->email }}</td>
                                    <td>{{ $connection->phone }}</td>
                                    <td>{{ $connection->question }}</td>
                                    <td>{{ $connection->comments }}</td>
                                    <td>{!! $connection->action !!}</td>
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

                {{ $connections->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Connection"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.communications.connections.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $connections->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush