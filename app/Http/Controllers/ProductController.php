<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Basket;
use App\Models\Review;
use App\Models\Wishlist;


class ProductController extends Controller
{


    public function showProduct($id)
    {
        $product = Product::where('product_id', $id)->first();
        $items = Item::where(['product_id' => $product->product_id])->get();
        $outStock = "";
        foreach ($items as $item) {
            if ($item->stock_number == 0) {
                $outStock = $outStock . $item->size_number . " ";
            }
        }

        return view('productView', ['product' => $product, 'outStock' => $outStock]);
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
        if (!$search) {
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

    public function newProduct(Request $request)
    {
        $categories = Category::all();
        return view('newproduct', [
            'categories' => $categories,
        ]);
    }

    public function createProduct(Request $request)
    {
        $vd = $request->validate([
            'shoe_name' => 'required|max:255|alpha',
            'category' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ], [
            'shoe_name.required' => 'The shoe name is required.',
            'shoe_name.alpha' => 'The shoe name must contain only letters.',
            'category.required' => 'The category is required.',
            'category.integer' => 'The category must be an integer.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'price.required' => 'The price is required.',
            'price.integer' => 'The price must be an integer.',
            'description.required' => 'The description is required.',
            'photo.required' => 'The photo is required.',
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'photo.max' => 'The image must not exceed 10MB in size.',
        ]);

        //check if product name is unquie
        $product = Product::where([
            "product_name" => $vd['shoe_name']
        ])->first();

        if ($product != null) {
            $error = new MessageBag;
            $error->add('name', 'The product name is already in use');
            return redirect()->back()->withErrors($error);
        }


        $blob = file_get_contents($vd['photo']->getRealPath());

        $product = Product::create([
            'product_name' => $vd['shoe_name'],
            'product_photo' => $blob,
            'product_description' => $vd['description'],
            'product_price' => $vd['price'],
            'category_id' => $vd['category']
        ]);

        for ($x = 4; $x < 14; $x++) {
            Item::create([
                'product_id' => $product->product_id,
                'size_number' => (string)$x,
                'stock_number' => $vd['quantity'],
                'stock_changes_date' => date("Y-m-d"),
                'stock_changes_number' => 0,
            ]);
        }
        return redirect()->back()->with('success', 'Product Created');
    }

    public function editProduct($product_id)
    {
        $product = Product::where(['product_id' => $product_id])->first();
        $categories = Category::all();

        return view('admin-edit-product', [
            'product' => $product,
            'categories' => $categories,

        ]);
    }

    public function udpateProduct(Request $request, $product_id)
    {
        $vd = $request->validate([
            'shoe_name' => 'required|max:255|alpha',
            'category' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
        ], [
            'shoe_name.required' => 'The shoe name is required.',
            'shoe_name.alpha' => 'The shoe name must contain only letters.',
            'category.required' => 'The category is required.',
            'category.integer' => 'The category must be an integer.',
            'price.required' => 'The price is required.',
            'price.integer' => 'The price must be an integer.',
            'description.required' => 'The description is required.',

        ]);

        //check if product name is unquie
        $product = Product::where([
            "product_name" => $vd['shoe_name']
        ])->first();

        if ($product != null) {
            $error = new MessageBag;
            $error->add('name', 'The product name is already in use');
            return redirect()->back()->withErrors($error);
        }


        $product = Product::where(['product_id' => $product_id]);

        $product->update([
            'product_name' => $vd['shoe_name'],
            'product_description' => $vd['description'],
            'product_price' => $vd['price'],
            'category_id' => $vd['category']
        ]);

        if ($request->file('photo') != null) {
            $vd = $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            ], [
                'photo.required' => 'The photo is required.',
                'photo.image' => 'The file must be an image.',
                'photo.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
                'photo.max' => 'The image must not exceed 10MB in size.',
            ]);
            $blob = file_get_contents($vd['photo']->getRealPath());

            $product->update([
                'product_photo' => $blob,

            ]);
        }

        return redirect()->back();
    }

    public function deleteProductCheck($product_id)
    {
        $product = Product::where(['product_id' => $product_id])->first();
        return view('product-check-delete-account', [
            'product' => $product
        ]);
    }

    public function deleteProduct(Request $request, $product_id)
    {
        $product = Product::where([
            'product_id' => $product_id
        ])->first();

        if ($request->input('product-text') == $product->product_name) {
            Wishlist::where(['product_id' => $product_id])->delete();
            Review::where(['product_id' => $product_id])->delete();

            //get all items of the product
            $items = Item::where(['product_id' => $product_id])->get();
            $test[] = [];


            foreach ($items as $item) {

                //delete from basket
                Basket::where(['item_id' => $item->item_id])->delete();
                //get all order_id of OrderItem for one $item
                $orderIds = OrderItem::where(['item_id' => $item->item_id])->pluck('order_id');

                //delete all order items
                OrderItem::where(['item_id' => $item->item_id])->delete();

                //for each orderId of the Orderitems that we deleted 
                foreach ($orderIds as $orderId) {
                    //how many order_items belong to an order 
                    $orderItems = OrderItem::where(['order_id' => $orderId])->get();
                    if (count($orderItems) == 0) {
                        Order::where(['order_id' => $orderId])->delete();
                    }
                }

                $item->delete();
            }
            $product->delete();
            Item::where(['product_id' => $product_id])->delete();
            $product->delete();
            return redirect(route('admin.stock'));

        } else {
            $error = new MessageBag;
            $error->add('Prodcut', 'The products\'s name was not typed correctly');
            return redirect()->back()->withErrors($error);
        }

    }



}
