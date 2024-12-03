@extends('backend.layouts.app')

@section('title', 'Edit Product')

@section('content')

    <x-backend.breadcrumb page_name="Edit Product"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Product Details</p>

                <div class="row form-input">
                    <div class="col-7">
                        <div class="mb-4">
                            <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="product_category_id" class="form-label">Product Category<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="product_category_id" name="product_category_id" required>
                                <option value="">Select product category</option>
                                @foreach($product_categories as $product_category)
                                    <option value="{{ $product_category->id }}" {{ old('product_category_id', $product->product_category_id) == $product_category->id ? 'selected' : '' }}>{{ $product_category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="language" name="language" required>
                                <option value="">Select language</option>
                                <option value="English" {{ old('language', $product->language) == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Chinese" {{ old('language', $product->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                <option value="Japanese" {{ old('language', $product->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                            </select>
                        </div>

                        <div>
                            <label for="type" class="form-label">Type<span class="asterisk">*</span></label>
                            <select class="form-control form-select" id="type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="Own" {{ old('type', $product->type) == 'Own' ? 'selected' : '' }}>Own</option>
                                <option value="Affiliate" {{ old('type', $product->type) == 'Affiliate' ? 'selected' : '' }}>Affiliate</option>
                            </select>
                        </div>

                        <div class="col-12 mt-4 affiliate-link">
                            <label for="affiliate-link" class="form-label">Affiliate Link<span class="asterisk">*</span></label>
                            <input type="url" class="form-control" id="affiliate-link" name="affiliate_link" value="{{ $product->affiliate_link }}" placeholder="Affiliate Link">
                        </div>
                    </div>
                    <div class="col-5 full-height">
                        <x-backend.upload-image old_name="old_thumbnail" old_value="{{ $product->thumbnail ?? old('thumbnail') }}" new_name="new_thumbnail" path="products/products" label="Thumbnail" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_thumbnail"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Pricing Details</p>

                <div class="row form-input">
                    <div class="col-7">
                        <div class="mb-4">
                            <label for="price" class="form-label">Price<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Price" required>
                        </div>

                        <div class="mb-4">
                            <label for="membership_price" class="form-label">Membership Price</label>
                            <input type="text" class="form-control" id="membership_price" name="membership_price" value="{{ old('membership_price', $product->membership_price) }}" placeholder="Membership Price">
                        </div>

                        <div>
                            <label for="shipping_cost" class="form-label">Shipping Cost</label>
                            <input type="text" class="form-control" id="shipping_cost" name="shipping_cost" value="{{ old('shipping_cost', $product->shipping_cost) }}" placeholder="Shipping Cost">
                        </div>
                    </div>
                    <div class="col-5 full-height">
                        <label for="shipping_cost_reason" class="form-label">What is this cost and why?</label>
                        <textarea class="form-control" rows="4" id="shipping_cost_reason" name="shipping_cost_reason" value="{{ old('shipping_cost_reason', $product->shipping_cost_reason) }}" placeholder="What is this cost and why?">{{ old('shipping_cost_reason', $product->shipping_cost_reason) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="editor" id="description" name="description" value="{{ old('description', $product->description) }}">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <x-backend.upload-multi-images image_count="5" old_name="old_images" old_value="{{ $product->images ?? old('images') }}" new_name="new_images[]" path="products/products"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_images.*"></x-backend.input-error>
                        </div>

                        <div class="mb-4">
                            <label for="downloadable_content" class="form-label">Downloadable Content</label>

                            <div class="row align-items-center">
                                @if($product->downloadable_content)
                                    <div class="col-11">
                                        <input type="file" class="form-control" name="downloadable_content" accept=".pdf" value="{{ $product->downloadable_content }}">
                                        <x-backend.input-error field="downloadable_content"></x-backend.input-error>
                                    </div>
                                    <div class="col-1">
                                        <input type="hidden" name="old_downloadable_content" value="{{ $product->downloadable_content }}">

                                        <a href="{{ asset('storage/backend/products/files/' . $product->downloadable_content) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <input type="file" class="form-control" name="downloadable_content" accept=".pdf">
                                        <x-backend.input-error field="downloadable_content"></x-backend.input-error>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Available Size/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button available-sizes">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($product->available_sizes)
                                @foreach(json_decode($product->available_sizes) as $available_size)
                                    <div class="row single-item align-items-center mt-2">
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="available_sizes[]" value="{{ $available_size }}" placeholder="Size">
                                        </div>
                                        <div class="col-1">
                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-4">
                            <div class="row align-items-center mb-2">
                                <div class="col-9">
                                    <label class="form-label">Color/s</label>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="button" class="add-row-button colors">
                                        <i class="bi bi-plus-lg"></i>
                                        Add More
                                    </button>
                                </div>
                            </div>

                            @if($product->colors)
                                @foreach(json_decode($product->colors) as $color)
                                    <div class="row single-item align-items-center mt-2">
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="colors[]" value="{{ $color }}" placeholder="Color">
                                        </div>
                                        <div class="col-1">
                                            <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <div class="mb-4">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <textarea class="form-control" rows="4" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}" placeholder="Meta Keywords">{{ old('meta_keywords', $product->meta_keywords) }}</textarea>
                        </div>

                        <div>
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" rows="4" id="meta_description" name="meta_description" value="{{ old('meta_description', $product->meta_description) }}" placeholder="Meta Description">{{ old('meta_description', $product->meta_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$product"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button.available-sizes').on('click', function() {
            let html = `<div class="row single-item align-items-center mt-2">
                            <div class="col-11">
                                <input type="text" class="form-control" name="available_sizes[]" placeholder="Size">
                            </div>
                            <div class="col-1">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.colors').on('click', function() {
            let html = `<div class="row single-item align-items-center mt-2">
                            <div class="col-11">
                                <input type="text" class="form-control" name="colors[]" placeholder="Color">
                            </div>
                            <div class="col-1">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        function toggleAffiliateLink() {
            if($('#type').val() === 'Affiliate') {
                $('.affiliate-link').show();
                $('#affiliate-link').attr('required', true);
            }
            else {
                $('.affiliate-link').hide();
                $('#affiliate-link').removeAttr('required').val('');
            }
        }

        toggleAffiliateLink();

        $('#type').change(function() {
            toggleAffiliateLink();
        });
    </script>
@endpush