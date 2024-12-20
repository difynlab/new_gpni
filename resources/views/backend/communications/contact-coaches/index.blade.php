@extends('backend.layouts.app')

@section('title', 'Contact Coaches')

@section('content')

    <x-backend.breadcrumb page_name="Contact Coaches"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.communications.contact-coaches.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col-8 col-xl-10">
                            <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}" placeholder="Nutritionist Name">
                        </div>

                        <div class="col-4 col-xl-2 d-flex justify-content-between">
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
                            <th scope="col">Coach</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">City</th>
                            <th scope="col">Country</th>
                            <th scope="col">App</th>
                            <th scope="col">App ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($contact_coaches) > 0)
                            @foreach($contact_coaches as $contact_coach)
                                <tr>
                                    <td>#{{ $contact_coach->id }}</td>
                                    <td>{{ $contact_coach->nutritionist }}</td>
                                    <td>{{ $contact_coach->email }}</td>
                                    <td>{{ $contact_coach->phone_number }}</td>
                                    <td>{{ $contact_coach->city }}</td>
                                    <td>{{ $contact_coach->country }}</td>
                                    <td>{{ $contact_coach->app }}</td>
                                    <td>{{ $contact_coach->app_id }}</td>
                                    <td>{{ $contact_coach->date }}</td>
                                    <td>{!! $contact_coach->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $contact_coaches->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Contact Coach"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.communications.contact-coaches.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $contact_coaches->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush