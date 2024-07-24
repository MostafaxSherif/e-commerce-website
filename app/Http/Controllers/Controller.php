<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Items;

abstract class Controller
{
    public function addToCart(Items $item) {
        $userId = auth()->user()->id;
        CartItem::create([
            'user_id' => $userId,
            'item_id' => $item->id,
            // Add other item information as needed
        ]);
    
        // Retrieve all items
        $items = Items::all();
    
        // Retrieve cart items for the authenticated user
        $cartItems = auth()->user()->cartItems;
    
        return view('items', compact('items', 'cartItems'))->with('success', 'Item added to cart successfully.');
    }
    public function deleteCartItem(CartItem $cartItem) {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }
}
