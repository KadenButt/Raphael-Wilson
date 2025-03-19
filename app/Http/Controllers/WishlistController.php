<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    // Add a product to the wishlist
    public function addToWishlist($productId)
    {
        // Validate the product ID
        $validator = Validator::make(['product_id' => $productId], [
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid product.');
        }

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to add items to your wishlist.');
        }

        // Check if the product already exists in the user's wishlist
        $existingWishlistItem = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($existingWishlistItem) {
            return redirect()->back()->with('error', 'Product is already in your wishlist.');
        }

        // Add the product to the wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist successfully.');
    }

    // View the user's wishlist
    public function showWishlist()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to view your wishlist.');
        }

        // Fetch the user's wishlist items with product details
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('wishlist', ['wishlistItems' => $wishlistItems]);
    }

    // Remove a product from the wishlist
    public function removeFromWishlist($wishlistId)
    {
        // Validate the wishlist ID
        $validator = Validator::make(['wishlist_id' => $wishlistId], [
            'wishlist_id' => 'required|integer|exists:wishlists,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid wishlist item.');
        }

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to remove items from your wishlist.');
        }

        // Find and delete the wishlist item
        $wishlistItem = Wishlist::where('id', $wishlistId)
            ->where('user_id', Auth::id())
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist successfully.');
        }

        return redirect()->back()->with('error', 'Product not found in your wishlist.');
    }
}