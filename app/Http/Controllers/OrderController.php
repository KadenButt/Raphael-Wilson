<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Item;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        //if basket is empty will not allow user to create an order
        if(count(Basket::all()) <= 0)
        {
            return redirect()->back();
        }

        //create order for all orderItems
        $order = Order::create([
            'order_date' => date('Y-m-d'),
            'order_status' => 'Processing',
            'order_total_price' => $request->input('total_price'),
            'customer_id' => Auth::user()->customer_id
        ]);

        //gets all items within a basket
        $basket_items = Basket::where('customer_id', Auth::user()->customer_id)->get();

        //for each basket_item it will add the the order_item
        foreach ($basket_items as $basket_item)
        {
            $item = Item::where('item_id', $basket_item->item_id)->first();
            //edit stock details
            $item->update([
                'stock_number' => $item->stock_number - $basket_item->quantity,
                'stock_change_date' => date("Y-m-d"),
                'stock_changes_number' => $item->stock_changes_number + $basket_item->quantity,
            ]);
            $product = Product::where('product_id', $item->product_id)->first();
            OrderItem::create([
                'order_item_quantity' => $basket_item->quantity,
                'order_item_price' => $product->product_price,
                'item_id' => $item->item_id,
                'order_id' => $order->order_id
            ]);

            //remove from basket
            Basket::where('basket_item_id', $basket_item->basket_item_id)->first()->delete();

        }

        return redirect(route('order'))->with('success', 'Your Order was successful, Your order number is ' . (string)$order->order_id);

    }

    public function deleteOrder(Request $request)
    {
        //the order item for deletion
        $orderItem = OrderItem::where('order_item_id', $request->input('order_item_id'))->first();

        //the total amount of order items within one order
        $ordersTotal = OrderItem::where('order_id', $orderItem->order_id)->get();

        //check are any order items within an order
        if(count($ordersTotal) <= 1 )
        {
            $orderItem->delete();
            Order::where('order_id', $orderItem->order_id)->first()->delete();
        }
        else
        {
            $orderItem->delete();
        }
        return redirect()->back();
    }

    public function listOrder(Request $request)
    {
        //Get all times an order was made by the user
        $orders = Order::where([
            'customer_id' => Auth::user()->customer_id
        ])->get()->keyBy('order_id');

        $products = array();
        $orderItems = array();
        //for each order
        foreach($orders as $order)
        {
            //get all orderItems for a single order
            $orderItems = collect($orderItems)->merge(
                OrderItem::where('order_id', $order->order_id)->get()
            );


            //Gets Product of each item
            foreach($orderItems as $order_item)
            {
                $item = Item::where('item_id', $order_item->item_id)->first();
                $products[] = Product::where('product_id', $item->product_id)->first();
            }

        }


        return view('orders',[
            'orders' => $orders,
            'orderItems' => $orderItems,
            'products' => $products,
        ]);
    }
}
