@extends('backend.layouts.app')

@section('title', 'Subscriptions')

@section('content')

    <x-backend.breadcrumb page_name="Subscriptions"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <div class="table-container mb-3">
                    <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($subscriptions) > 0)
                            @foreach($subscriptions as $subscription)
                                <tr>
                                    <td>#{{ $subscription->id }}</td>
                                    <td>{{ $subscription->email }}</td>
                                    <td>{!! $subscription->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $subscriptions->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Subscription"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.communications.subscriptions.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $subscriptions->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush