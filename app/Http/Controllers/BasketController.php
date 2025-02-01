<?php

namespace App\Http\Controllers;

use App\Models\BasketItem;
use App\Models\Product;
use App\Models\SizeItem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    //adds item from product page to basket
    public static function addBasket(Request $request)
    {
        $sizeItem = SizeItem::create([
            'product_id' => $request->input('product_id'),
            'size_number' => $request->input('size')
        ]);

        BasketItem::create([
            'customer_id' => Auth::user()->customer_id,
            'size_item_id' => $sizeItem->size_item_id,
            'quantity' => $request->input('quantity')
        ]);

        return redirect()->back();
    }


    public function deleteBasket(Request $request)
    {
        BasketItem::where('basket_item_id', $request->input('basket_item_id'))->first()->delete();
        return redirect()->back();
    }

    public function listBasket()
    {
        $basket_items = BasketItem::where('customer_id', Auth::user()->customer_id)->get();

        //get product table

        $products = array();
        $sumPrice = 0;

        foreach ($basket_items as $basket) {
            $sizeItem = SizeItem::where('size_item_id', $basket->size_item_id)->first();
            $product = Product::where('product_id', $sizeItem->product_id)->first();
            $sumPrice += $product->product_price * $basket->quantity;
            $products[]  = $product;

        }
        //2D array that hold all the size of each shoe
        $shoe_size = array();


        foreach ($products as $item) {

            //get size ID for product
            $size_items = SizeItem::where('product_id', $item->product_id)->get();

            foreach ($size_items as $size_item) {
                $shoe_size[] = $size_item->size_number;
            }

        }

        return view('basket', [
            'products' => $products,
            'basket_items' => $basket_items,
            'sizes' => $shoe_size,
            'price' => $sumPrice,
        ]);
    }

    public function updateQuantity(Request $request)
    {
        BasketItem::where('basket_item_id', $request->input('basket_item_id'))->update(['quantity' => $request->input('quantity')]);
        return redirect()->back();
    }


    ////////////////temp
    public function addBasketTemp()
    {

        $sizeItem1 = SizeItem::create([
            'product_id' => 1,
            'size_number' => '10'
        ]);

        $sizeItem2 = SizeItem::create([
            'product_id' => 2,
            'size_number' => '9'
        ]);

        BasketItem::create([
            'quantity' => 1,
            'size_item_id' => $sizeItem1->size_item_id,
            'customer_id' => Auth::user()->customer_id
        ]);

        BasketItem::create([
            'quantity' => 1,
            'size_item_id' =>  $sizeItem2->size_item_id,
            'customer_id' => Auth::user()->customer_id
        ]);


    }



}
