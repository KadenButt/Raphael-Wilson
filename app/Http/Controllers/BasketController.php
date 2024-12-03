<?php

namespace App\Http\Controllers;

use App\Models\BasketItem;
use App\Models\Product;
use App\Models\SizeItem;
use App\Models\Size;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{


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
            $sumPrice += $product->product_price;
            $products[]  = $product;

        }
        //2D array that hold all the size of each shoe 
        $shoe_size = array();


        foreach ($products as $item) {

            //get size ID for product
            $size_items = SizeItem::where('product_id', $item->product_id)->get();
            
            foreach ($size_items as $size_item) {
                $shoe_size[] = Size::where('size_id', $size_item->size_id)->first();
            }
         
        }

        $itemsBasket = array_map(null, $products, $basket_items->toArray());

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
    public function addBasket()
    {

        $size1 = Size::create([
            'size_number' => '10'
        ]);

        $size2 = Size::create([
            'size_number' => '5 '
        ]);
        
        $sizeItem1 = SizeItem::create([
            'product_id' => 1,
            'size_id' => $size1->size_id
        ]);

        $sizeItem2 = SizeItem::create([
            'product_id' => 2,
            'size_id' => $size2->size_id
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
