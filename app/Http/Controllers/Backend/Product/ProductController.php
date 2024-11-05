<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private function processProducts($products)
    {
        foreach($products as $product) {
            $product->action = '
            <a href="'. route('backend.products.edit', $product->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$product->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $product->thumbnail = '<img src="'. asset('storage/backend/products/products/' . $product->thumbnail) .'" class="table-image">';

            $product->category = ProductCategory::find($product->product_category_id)->name;

            $product->status = ($product->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $products;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $products = Product::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $products = $this->processProducts($products);

        return view('backend.products.index', [
            'products' => $products,
            'items' => $items
        ]);
    }

    public function create()
    {
        $product_categories = ProductCategory::where('status', '1')->get();

        return view('backend.products.create', [
            'product_categories' => $product_categories
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_thumbnail' => 'required|max:2048',
            'new_images.*' => 'nullable|max:2048',
            'downloadable_content' => 'nullable|max:2048',
        ], [
            'new_thumbnail.max' => 'The thumbnail must not be greater than 2MB',
            'new_thumbnail.required' => 'Thumbnail is required',
            'new_images.*.max' => 'Each image must not be greater than 2MB',
            'downloadable_content.max' => 'The file must not be greater than 2MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_thumbnail') != null) {
            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('public/backend/products/products', $thumbnail_name);
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        // Images
            $new_images = [];
            if($request->file('new_images') != null) {
                foreach($request->file('new_images') as $image) {
                    $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/backend/products/products', $image_name);
                    $new_images[] = $image_name;
                }
            }
        // Images

        if($request->file('downloadable_content') != null) {
            $file = $request->file('downloadable_content');
            $file_name = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/backend/products/files', $file_name);
        }
        else {
            $file_name = null;
        }

        $product = new Product();
        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_images',
            'new_images'
        );

        $data['thumbnail'] = $thumbnail_name;
        $data['images'] = $new_images != null ? json_encode($new_images) : null;
        $data['downloadable_content'] = $file_name;
        $data['available_sizes'] = $request->available_sizes[0] != null ? json_encode($request->available_sizes) : null;
        $data['colors'] = $request->colors[0] != null ? json_encode($request->colors) : null;

        $product->create($data);

        return redirect()->route('backend.products.index')->with('success', 'Successfully created!');
    }

    public function edit(Product $product)
    {
        $product_categories = ProductCategory::where('status', '1')->get();

        return view('backend.products.edit', [
            'product' => $product,
            'product_categories' => $product_categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'old_thumbnail' => 'required|max:2048',
            'new_images.*' => 'nullable|max:2048',
            'downloadable_content' => 'nullable|max:2048',
        ], [
            'new_thumbnail.max' => 'The thumbnail must not be greater than 2MB',
            'new_thumbnail.required' => 'Thumbnail is required',
            'new_images.*.max' => 'Each image must not be greater than 2MB',
            'downloadable_content.max' => 'The file must not be greater than 2MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_thumbnail') != null) {
            if($request->old_thumbnail) {
                Storage::delete('public/backend/products/products/' . $request->old_thumbnail);
            }

            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('public/backend/products/products', $thumbnail_name);
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        // Images
            if($request->file('new_images') != null) {
                if($request->old_images) {
                    $encoded_string = htmlspecialchars_decode($request->old_images);
                    $images = json_decode($encoded_string);

                    foreach($images as $image) {
                        Storage::delete('public/backend/products/products/' . $image);
                    }
                }

                $new_images = [];
                foreach($request->file('new_images') as $image) {
                    $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/backend/products/products', $image_name);
                    $new_images[] = $image_name;
                }

                $new_images = json_encode($new_images);
            }
            else {
                $new_images = htmlspecialchars_decode($request->old_images);
            }
        // Images

        if($request->file('downloadable_content') != null) {
            if($request->old_downloadable_content) {
                Storage::delete('public/backend/products/files/' . $request->old_downloadable_content);
            }

            $file = $request->file('downloadable_content');
            $file_name = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/backend/products/files', $file_name);
        }
        else {
            $file_name = $request->old_downloadable_content;
        }

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_images',
            'new_images',
            'old_downloadable_content'
        );
        $data['thumbnail'] = $thumbnail_name;
        $data['images'] = $new_images;
        $data['downloadable_content'] = $file_name;
        $data['available_sizes'] = $request->available_sizes != null ? json_encode($request->available_sizes) : null;
        $data['colors'] = $request->colors != null ? json_encode($request->colors) : null;

        $product->fill($data)->save();
        
        return redirect()->route('backend.products.index')->with('success', "Successfully updated!");
    }

    public function destroy(Product $product)
    {
        $product->status = '0';
        $product->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.products.index');
        }

        $name = $request->name;
        $language = $request->language;

        $products = Product::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $products->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $products->where('language', $language);
        }

        $items = $request->items ?? 10;
        $products = $products->paginate($items);
        $products = $this->processProducts($products);

        return view('backend.products.index', [
            'products' => $products,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}