<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use App\Models\Product;
use App\Models\Size;
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

    public function createProduct($reqest)
    {   
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

        //create size 
        $size1 = Size::create([
            'size_number' => '9',
        ]);

        $size2 = Size::create([
            'size_number' => '10',
        ]);
        

        SizeItem::create([
            'product_id' => $shoe1->product_id,
            'size_id' => $size1->size_id
        ]);

        SizeItem::create([
            'product_id' => $shoe1->product_id,
            'size_id' => $size2->size_id
        ]);

        SizeItem::create([
            'product_id' => $shoe2->product_id,
            'size_id' => $size1->size_id
        ]);

        SizeItem::create([
            'product_id' => $shoe2->product_id,
            'size_id' => $size2->size_id
        ]);

    }
}
