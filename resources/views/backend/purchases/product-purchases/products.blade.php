@extends('backend.layouts.app')

@section('title', 'Ordered Products')

@section('content')

    <x-backend.breadcrumb page_name="Ordered Products"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <div class="table-container mb-3">
                    <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Shipping Cost</th>
                            <th scope="col">Total Cost</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($ordered_products) > 0)
                            @foreach($ordered_products as $ordered_product)
                                <tr>
                                    <td>#{{ $ordered_product->id }}</td>
                                    <td>{!! $ordered_product->image !!}</td>
                                    <td>{{ $ordered_product->name }}</td>
                                    <td>{{ $ordered_product->category }}</td>
                                    <td>{{ $ordered_product->quantity }}</td>
                                    <td>{{ $ordered_product->price }}</td>
                                    <td>{{ $ordered_product->shipping_cost }}</td>
                                    <td>{{ $ordered_product->total_cost }}</td>
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

                {{ $ordered_products->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </div>

@endsection