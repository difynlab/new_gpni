<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }
        
    $categories = ProductCategory::where('language', $language_name)->where('status', '1')->get();

    // If no categories in selected language, fallback to English
    if($categories->isEmpty() && $language_name !== 'English') {
        $categories = ProductCategory::where('language', 'English')->where('status', '1')->get();
    }

    // Fetch products with product_category_id = 2 books
    $product_books = Product::where('product_category_id', '2')->where('status', '1')->get();

    // Fetch products with product_category_id = 3 clothing
    $product_cloths = Product::where('product_category_id', '3')->where('status', '1')->get();

    // Fetch products with product_category_id = 4 courses
    $product_courses = Product::where('product_category_id', '4')->where('status', '1')->get();

    // Fetch products with product_category_id = 5 merchandises
    $product_merchandises = Product::where('product_category_id', '5')->where('status', '1')->get();


    return view('frontend.pages.products', [
        'language' => $language,
        'categories' => $categories,
        'product_books' => $product_books,
        'product_cloths' => $product_cloths,
        'product_courses' => $product_courses,
        'product_merchandises' => $product_merchandises
    ]);
    }
}