<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Payment;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Product;
use App\Models\Basket;
use App\Models\Category;
use App\Models\Review;
use App\Models\Wishlist;
use App\Models\Inventory;
use App\Models\Stock;



class AdminController extends Controller
{
    public function listCustomer(Request $request)
    {
        $customers = Customer::all();
        return view('admin-customers', [
            'customers' => $customers,
        ]);
    }

    public function addAdmin(Request $request)
    {
        $customer = Customer::where(['customer_id' => $request->input('customer_id')])->first();
        $customer->update(['admin' => true]);
        return redirect()->back();
    }

    public function removeAdmin(Request $request)
    {
        //check to see if there are more then one admin
        $customers = Customer::where(['admin' => true]);
        $customer = Customer::where(['customer_id' => $request->input('customer_id')])->first();
        $error = new MessageBag;


        if ($customers->count() > 1) {
            if (Auth::user()->customer_id  != $request->input('customer_id')) {
                $customer->update(['admin' => false]);
                return redirect()->back();
            }
            $error->add('admin', 'You cannot demote yourself to a customer');
        } else {
            $error->add('admin', 'You must have atleast 1 admin');
        }

        return redirect()->back()->withErrors($error);
    }

    public function editCustomer($customer_id)
    {
        $customer = Customer::where('customer_id', $customer_id)->first();
        $address = Address::where('address_id', $customer->address_id)->first();
        $payment = Payment::where('payment_id', $customer->payment_id)->first();
        return view('admin-update-details', [
            'customer' => $customer,
            'address' => $address,
            'payment' => $payment,
        ]);
    }

    public function updateCustomer(Request $request)
    {
        $vd = $request->validate([
            'customer_fname' => 'required|max:255|alpha',
            'customer_sname' => 'required|max:255|alpha',
            'customer_email' => 'required|email|max:255',
            'address_number' => 'required|integer|digits_between:1, 255',
            'address_street' => 'required|max:255',
            'address_postcode' => 'required|max:6',
            'account_number' => 'required|digits:11|integer',
        ], [
            'fname.required' => 'First name is required and cannot be empty.',
            'fname.max' => 'First name cannot exceed 255 characters.',
            'fname.alpha' => 'First name should contain only letters.',

            'sname.required' => 'Last name is required and cannot be empty.',
            'sname.max' => 'Last name cannot exceed 255 characters.',
            'sname.alpha' => 'Last name should contain only letters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',

            'address_number.required' => 'Address number is required.',
            'address_number.integer' => 'Address number must be a number.',
            'address_number.max' => 'Address number cannot exceed 255 characters.',

            'street.required' => 'Street name is required.',
            'street.max' => 'Street name cannot exceed 255 characters.',

            'postcode.required' => 'Postcode is required.',
            'postcode.max' => 'Postcode cannot exceed 6 characters.',

            'payment_number.required' => 'Payment number is required.',
            'payment_number.integer' => 'Payment number must be a number.',
            'payment_number.digits' => 'A valid payment number must be 11 characters.',


        ]);

        $customer = Customer::where('customer_id', $request->input('customer_id'))->first();
        $address = Address::where('address_id', $customer->address_id)->first();
        $payment = Payment::where('payment_id', $customer->payment_id)->first();

        $customer_check = Customer::where(['customer_email' => $vd['customer_email']])->first();
        if ($customer_check != null) {
            $error = new MessageBag;
            $error->add('email', 'email is already in use');
            return redirect()->back()->withErrors($error);
        }

        $address->update([
            'address_number' => $vd['address_number'],
            'address_street' => $vd['address_street'],
            'address_postcode' => $vd['address_postcode'],
        ]);

        $payment->update([
            'account_number' => $vd['account_number'],
        ]);

        $customer->update([
            'customer_email' => $vd['customer_email'],
            'customer_fname' => $vd['customer_fname'],
            'customer_sname' => $vd['customer_sname'],
            'address_id' => $address->address_id,
            'payment_id' => $payment->payment_id,
        ]);

        return redirect()->back();
    }

    public function customerOrders($customer_id)
    {
        //Get all times an order was made by the user
        $orders = Order::where([
            'customer_id' => $customer_id
        ])->get()->keyBy('order_id');

        $products = array();
        $orderItems = array();
        //for each order
        foreach ($orders as $order) {
            //get all orderItems for a single order
            $orderItems = collect($orderItems)->merge(
                OrderItem::where('order_id', $order->order_id)->get()
            );


            //Gets Product of each item
            foreach ($orderItems as $order_item) {
                $item = Item::where('item_id', $order_item->item_id)->first();
                $products[] = Product::where('product_id', $item->product_id)->first();
            }
        }


        return view('orders', [
            'orders' => $orders,
            'orderItems' => $orderItems,
            'products' => $products,
        ]);
    }

    public function deleteCustomer($customer_id)
    {


        $customer = Customer::where(['customer_id' => $customer_id])->first();
        $error = new MessageBag;

        //check if customer is admin
        if ($customer->admin) {
            //check if deleting thier own account
            if (Auth::user()->customer_id != $customer_id) {
                //Delete orders and order items
                $orders = Order::where('customer_id', $customer_id)->get();
                foreach ($orders as $order) {
                    OrderItem::where('order_id', $order->order_id)->delete();
                    $order->delete();
                }
                //delete basket
                Basket::where('customer_id', $customer_id)->delete();
                //delete review
                Review::where('customer_id', $customer_id)->delete();
                //delete wishlsit
                WishList::where('customer_id', $customer_id)->delete();
                //delete address
                Address::where('address_id', $customer->address_id);
                //delete payment
                Payment::where('payment_id', $customer->payment_id);
                //delete customer account
                $customer->delete();
            } else {
                $error->add('admin', 'You cannot delete your own account');
            }
        } else {
            //Delete orders and order items
            $orders = Order::where('customer_id', $customer_id)->get();
            foreach ($orders as $order) {
                OrderItem::where('order_id', $order->order_id)->delete();
                $order->delete();
            }
            //delete basket
            Basket::where('customer_id', $customer_id)->delete();
            //delete review
            Review::where('customer_id', $customer_id)->delete();
            //delete wishlsit
            WishList::where('customer_id', $customer_id)->delete();
            //delete address
            Address::where('address_id', $customer->address_id);
            //delete payment
            Payment::where('payment_id', $customer->payment_id);

            //delete customer
            $customer->delete();
        }


        return redirect()->back()->withErrors($error);
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

        $blob = file_get_contents($vd['photo']->getRealPath());

        $product = Product::create([
            'product_name' => $vd['shoe_name'],
            'product_photo' => $blob,
            'product_description' => $vd['description'],
            'product_price' => $vd['price'],
            'category_id' => $vd['category']
        ]);

        for($x = 4;  $x < 14; $x++)
        {
            Item::create([
                'product_id' => $product->product_id,
                'size_number' => (string)$x,
                'stock_number' => $vd['quantity'],
                'stock_changes_date' => date("Y-m-d"),
                'stock_changes_number' => 0,
                'customer_id' => Auth::user()->customer_id
            ]);
        }
        return redirect()->back()->with('success', 'Product Created');




    }

    public function orders(Request $request)
    {
        $orders= Order::all();
        return view('admin-orders', ['orderItems' => $orders]);
    }
}
