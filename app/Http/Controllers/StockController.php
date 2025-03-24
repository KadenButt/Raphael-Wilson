<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Item;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class StockController extends Controller
{
    public function stock()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin-stock', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function stockCategories($category_id)
    {
        $products = Product::where(['category_id' => $category_id])->get();
        $categories = Category::all();
        return view('admin-stock', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function stockItems($size)
    {
        $items = Item::where(['size_number' => $size])->get();
        $products = Product::All();
        return view('admin-items', [
            'size' => $size,
            'items' => $items,
            'products' => $products
        ]);
    }

    public function stockItemChange(Request $request, $item_id)
    {
        Item::where(['item_id' => $item_id])->update([
            'stock_number' => $request->input('quantity'),
        ]);
        return redirect()->back();
    }

    public function stockReport()
    {
        $products = Product::all();
        $order = Order::all();

        if($order->isEmpty())
        {
            return view('admin-generate-report-no-data');
        }


;
        foreach($products as $product)
        {
            $items = Item::where(['product_id' => $product->product_id])->get();
            //counts the number of sold items for one product
            $count  = 0;
            foreach($items as $item)
            {
                $count += $item->stock_changes_number;
            }

            $soldProducts[] = [$product, $count];
        } 




        //calculate most revenue generated from a products
        
        $items = Item::orderBy('stock_changes_number', 'desc')->get();

        return view('admin-generate-report', [
            'items' => $items,
            'products' => $products,
            'soldProducts' => $soldProducts,
        ]);
    }
}
