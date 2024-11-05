<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductOrder;
use App\Models\ProductOrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    private function processProductOrders($product_purchases)
    {
        foreach($product_purchases as $product_purchase) {
            $product_purchase->action = '
            <a href="'. route('backend.purchases.product-purchases.products', $product_purchase->id) .'" class="review-button" title="Products"><i class="bi bi-basket-fill"></i></a>
            <a href="'. route('backend.purchases.product-purchases.show', $product_purchase->id) .'" class="edit-button" title="View"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$product_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $product_purchase->student_id = User::find($product_purchase->student_id)->first_name . ' ' . User::find($product_purchase->student_id)->last_name;

            $product_purchase->date_time = $product_purchase->date . ' | ' . $product_purchase->time;

            $product_purchase->payment_status = 
                ($product_purchase->payment_status == 'Completed') 
                ? '<span class="active-status">Completed</span>' 
                : (($product_purchase->payment_status == 'Pending') 
                    ? '<span class="pending-status">Pending</span>' 
                    : '<span class="inactive-status">Failed</span>');

            $product_purchase->course_access_status = ($product_purchase->course_access_status == 'Active') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Revoked</span>';

        }

        return $product_purchases;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $product_purchases = ProductOrder::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $product_purchases = $this->processProductOrders($product_purchases);

        return view('backend.purchases.product-purchases.index', [
            'product_purchases' => $product_purchases,
            'items' => $items
        ]);
    }

    public function show(ProductOrder $product_purchase)
    {
        $student = User::find($product_purchase->student_id)->first_name . ' ' . User::find($product_purchase->student_id)->last_name;

        return view('backend.purchases.product-purchases.show', [
            'product_purchase' => $product_purchase,
            'student' => $student
        ]);
    }

    public function products(ProductOrder $product_purchase)
    {
        $items = $request->items ?? 10;
        $ordered_products = ProductOrderDetail::where('product_order_id', $product_purchase->id)->paginate($items);

        foreach($ordered_products as $key => $ordered_product) {
            $product = Product::find($ordered_product->product_id);

            $ordered_product->image = '<img src="'. asset('storage/backend/products/products/' . $product->thumbnail) .'" class="table-image">';
            $ordered_product->name = $product->name;
            $ordered_product->category = ProductCategory::find($product->product_category_id)->name;
        }

        return view('backend.purchases.product-purchases.products', [
            'product_purchase' => $product_purchase,
            'ordered_products' => $ordered_products,
            'items' => $items
        ]);
    }

    public function destroy(ProductOrder $product_purchase)
    {
        $product_purchase->status = '0';
        $product_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.purchases.product-purchases.index');
        }

        $transaction_id = $request->transaction_id;
        $date = $request->date;

        $product_purchases = ProductOrder::where('status', '1')->orderBy('id', 'desc');

        if($transaction_id != null) {
            $product_purchases->where('transaction_id', 'like', '%' . $transaction_id . '%');
        }

        if($date != null) {
            $product_purchases->where('date', $date);
        }

        $items = $request->items ?? 10;
        $product_purchases = $product_purchases->paginate($items);
        $product_purchases = $this->processProductOrders($product_purchases);

        return view('backend.purchases.product-purchases.index', [
            'product_purchases' => $product_purchases,
            'items' => $items,
            'transaction_id' => $transaction_id,
            'date' => $date
        ]);
    }
}