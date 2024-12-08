<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use App\Models\Product;
use App\Models\sizeItem;

use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function createCategory($category)
    {
        Category::create([
            'category_name' => $category
        ]);
    }

    public function showProduct($id)
    { 
        $product = Product::where('product_id', $id)->first();
        return view('productView', ['product' => $product]);
    }

    public function showProducts()
    { 
        $products = Product::all();
        $categories = Category::all();
        return view('products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function showCategory($category_id)
    { 
        $products = Product::where(['category_id' => $category_id])->get();
        $categories = Category::all();
        return view('products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }



//temp
    public function populateProducts()
    {

        //cat
        $category1 = Category::create([
            'category_name' => 'Smart'
        ]);

        $category2 = Category::create([
            'category_name' => 'Sport'
        ]);

        $filePath = public_path('images/place.jpg');

        if(!file_exists($filePath)){
            return 'File does noe exist';
        }

        $binaryData = file_get_contents($filePath);
        //create shoe 
        $shoe1 = Product::create([
            'product_name' => 'shoe1',
            'product_photo' => $binaryData,
            'product_description'=> 'A realy smart Cool shoe that does stuff',
            'product_price' => 2000,
            'category_id' => $category1->category_id,
        ]);

        $shoe2 = Product::create([
            'product_name' => 'shoe2',
            'product_photo' => $binaryData,
            'product_description'=> 'A realy Cool sport shoe that does stuff',
            'product_price' => 1000,
            'category_id' => $category2->category_id,
        ]);


        SizeItem::create([
            'product_id' => $shoe1->product_id,
            'size_number' => '9',
        ]);

        SizeItem::create([
            'product_id' => $shoe1->product_id,
            'size_number' => '10',
        ]);

        SizeItem::create([
            'product_id' => $shoe2->product_id,
            'size_number' => '9',
        ]);

        SizeItem::create([
            'product_id' => $shoe2->product_id,
            'size_number' => '10',
        ]);

    }
}
