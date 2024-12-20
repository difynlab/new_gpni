@extends('backend.layouts.app')

@section('title', 'Promotions')

@section('content')

    <x-backend.breadcrumb page_name="Promotions"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12 text-end">
                <a href="{{ route('backend.promotions.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Promotion
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
                            <th scope="col">Type</th>
                            <th scope="col">Title</th>
                            <th scope="col">Coupon Code Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($promotions) > 0)
                            @foreach($promotions as $promotion)
                                <tr>
                                    <td>#{{ $promotion->id }}</td>
                                    <td>{{ $promotion->type }}</td>
                                    <td>{{ $promotion->title ?? '-' }}</td>
                                    <td>{{ $promotion->coupon_code_type ?? '-' }}</td>

                                    @if($promotion->type == 'Course Discount')
                                        <td>USD {{ $promotion->value }}</td>
                                    @else
                                        @if($promotion->coupon_code_type == 'Percentage')
                                            <td>{{ $promotion->value }} %</td>
                                        @else
                                            <td>USD {{ $promotion->value }}</td>
                                        @endif
                                    @endif
                                    
                                    <td>{!! $promotion->status !!}</td>
                                    <td>{!! $promotion->action !!}</td>
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

                {{ $promotions->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Promotion"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.promotions.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $promotions->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush