<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function searchProduct(Request $request)
    {
        $search = Product::where('product_name', $request->input('product_name'))->first();
        if(!$search)
        {
            return redirect()->back();
        }
        return redirect(route('product', [$search->product_id]));
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



//temp -> add products since admins features are not implemented
    public function populateProducts()
    {

        $category1 = Category::create([
            'category_name' => 'Dress Shoes'
        ]);


        $filePath1 = public_path('images/product1.jpg');
        $filePath2 = public_path('images/product2.jpg');
        $filePath3 = public_path('images/product3.jpg');
        $filePath4 = public_path('images/product4.jpg');


        if(!file_exists($filePath1)){
            return 'File does noe exist';
        }

        $shoe1 = file_get_contents($filePath1);
        $shoe2 = file_get_contents($filePath2);
        $shoe3 = file_get_contents($filePath3);
        $shoe4 = file_get_contents($filePath4);

        //create shoe
        $shoe1 = Product::create([
            'product_name' => 'Derby Shoe',
            'product_photo' => $shoe1,
            'product_description'=> 'A navy-blue derby shoe with elegant perforations. Smooth matte leather is refined but slightly less formal, balancing style and luxury.',
            'product_price' => 180,
            'category_id' => $category1->category_id,
        ]);

        $shoe2 = Product::create([
            'product_name' => 'Tan leather Chelsea boot ',
            'product_photo' => $shoe2,
            'product_description'=> 'A premium tan leather Chelsea boot with brogue detailing. The sleek design and polished finish in tan leather are timeless and highly versatile.',
            'product_price' => 240,
            'category_id' => $category1->category_id,
        ]);

        $shoe3 = Product::create([
            'product_name' => 'Double monk strap show',
            'product_photo' => $shoe3,
            'product_description'=> 'A sophisticated double monk strap shoe in rich brown leather.  The hand-stitched accents and brushed silver buckles make it a standout luxury choice.',
            'product_price' => 260,
            'category_id' => $category1->category_id,
        ]);

        $shoe4 = Product::create([
            'product_name' => 'Burgundy Loafer £220',
            'product_photo' => $shoe4,
            'product_description'=> 'A modern burgundy loafer. The patent leather finish and gold chain detailing add a bold and luxury statement.',
            'product_price' => 220,
            'category_id' => $category1->category_id,
        ]);


        // SizeItem::create([
        //     'product_id' => $shoe1->product_id,
        //     'size_number' => '9',
        // ]);

        // SizeItem::create([
        //     'product_id' => $shoe1->product_id,
        //     'size_number' => '10',
        // ]);

        // SizeItem::create([
        //     'product_id' => $shoe2->product_id,
        //     'size_number' => '9',
        // ]);

        // SizeItem::create([
        //     'product_id' => $shoe2->product_id,
        //     'size_number' => '10',
        // ]);

    }
}
