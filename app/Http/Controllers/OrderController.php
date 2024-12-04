<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\BasketItem;
use App\Models\Product;
use App\Models\sizeItem;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $order = Order::create([
            'order_date' => date('Y-m-d'),
            'order_status' => 'Processing',
            'order_total_price' => $request->input('total_price'),
            'customer_id' => Auth::user()->customer_id
        ]);

        $basket_items = BasketItem::where('customer_id', Auth::user()->customer_id)->get();


        foreach ($basket_items as $item) 
        {
            $sizeItem = SizeItem::where('size_item_id', $item->size_item_id)->first();
            $product = Product::where('product_id', $sizeItem->product_id)->first();
            OrderItem::create([
                'order_item_quantity' => $item->quantity,
                'order_item_price' => $product->product_price,
                'size_item_id' => $item->size_item_id,
                'order_id' => $order->order_id
            ]);
        }
        
    }
}
