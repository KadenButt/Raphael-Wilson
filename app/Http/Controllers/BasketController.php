<?php

namespace App\Http\Controllers;

use App\Models\Basket;
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
        $basket = Basket::where('customer_id', Auth::user()->customer_id)->first();

        BasketItem::where([
            ['basket_id', '=', $basket->basket_id],
            ['product_id', '=', $request->input('product_id')],
        ])->first()->delete();;

        return redirect()->back();
    }

    public function listBasket()
    {
        $basket = Basket::where('customer_id', Auth::user()->customer_id)->first();
        $basket_items = BasketItem::where('basket_id', $basket->basket_id)->get();

        //get product table

        $items = array();
        $sumPrice = 0;

        foreach ($basket_items as $item) {
            $temp = Product::where('product_id', $item->product_id)->first();
            $sumPrice += $temp->product_price;
            $items[]  = $temp;
        }
        //2D array that hold all the size of each shoe 
        $shoe_size = array();


        foreach ($items as $item) {

            //get size ID for product
            $size_items = SizeItem::where('product_id', $item->product_id)->get();
            //stores the size of shoe for each product
            $sizes = array();

            foreach ($size_items as $size_item) {
                $temp = Size::where('size_id', $size_item->size_id)->first();
                $sizes[] = $temp->size_number;
            }
            $sizesString = implode(', ', $sizes);
            $shoe_size[$item->product_id] = $sizesString;
        }

        return view('basket', [
            'items' => $items,
            'sizes' => $shoe_size,
            'price' => $sumPrice,
        ]);
    }



    ////////////////temp
    public function addBasket()
    {
        $basket = Basket::where('customer_id', Auth::user()->customer_id)->first();
        BasketItem::create([
            'basket_id' => $basket->basket_id,
            'product_id' => 1,
        ]);

        BasketItem::create([
            'basket_id' => $basket->basket_id,
            'product_id' => 2,
        ]);
    }
}
