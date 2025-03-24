<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    /**
     * Add a product to the wishlist.
     */
    public function addToWishlist($productId)
    {
        $validator = Validator::make(
            ['product_id' => $productId],
            ['product_id' => 'required|integer|exists:products,product_id']
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid product.');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to your wishlist.');
        }

        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('info', 'This product is already in your wishlist.');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $productId
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    /**
     * View the user's wishlist.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
        }

        $wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlistItems'));
    }

    /**
     * Remove a product from the wishlist.
     */
    public function removeFromWishlist($wishlistId)
    {
        $validator = Validator::make(
            ['wishlist_id' => $wishlistId],
            ['wishlist_id' => 'required|integer|exists:wishlist,wishlist_id']
        );

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid wishlist item.');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to manage your wishlist.');
        }

        $wishlistItem = Wishlist::where('wishlist_id', $wishlistId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $wishlistItem->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}