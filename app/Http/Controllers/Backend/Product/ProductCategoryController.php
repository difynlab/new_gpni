<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private function processProductCategories($product_categories)
    {
        foreach($product_categories as $product_category) {
            $product_category->action = '
            <a href="'. route('backend.product-categories.edit', $product_category->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$product_category->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $product_category->status = ($product_category->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $product_categories;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $product_categories = ProductCategory::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $product_categories = $this->processProductCategories($product_categories);

        return view('backend.product-categories.index', [
            'product_categories' => $product_categories,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.product-categories.create');
    }
                                                                              
    public function store(Request $request)
    {
        $product_category = new ProductCategory();
        $data = $request->all();
        $product_category->create($data);

        return redirect()->route('backend.product-categories.index')->with('success', 'Successfully created!');
    }

    public function edit(ProductCategory $product_category)
    {
        return view('backend.product-categories.edit', [
            'product_category' => $product_category
        ]);
    }

    public function update(Request $request, ProductCategory $product_category)
    {
        $data = $request->all();
        $product_category->fill($data)->save();
        
        return redirect()->route('backend.product-categories.index')->with('success', "Successfully updated!");
    }

    public function destroy(ProductCategory $product_category)
    {
        $products = Product::where('product_category_id', $product_category->id)->where('status', '!=', '0')->get();

        if($products) {
            foreach($products as $product) {
                $product->status = '0';
                $product->save();
            }
        }

        $product_category->status = '0';
        $product_category->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.product-categories.index');
        }

        $name = $request->name;
        $language = $request->language;

        $product_categories = ProductCategory::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $product_categories->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $product_categories->where('language', $language);
        }

        $items = $request->items ?? 10;
        $product_categories = $product_categories->paginate($items);
        $product_categories = $this->processProductCategories($product_categories);

        return view('backend.product-categories.index', [
            'product_categories' => $product_categories,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}