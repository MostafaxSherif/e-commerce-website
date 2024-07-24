<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Items;
use App\Models\CartItem;
use Illuminate\Http\Request;
class CartController extends Controller{
public function index() {
    // Retrieve all items
    $items = Items::all();
    // Retrieve cart items for the authenticated user
    $cartItems = auth()->user()->cartItems;
    return view('add-to-cart', compact('items', 'cartItems'));}
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
    return view('add-to-cart', compact('items', 'cartItems'));
}
public function updateCartItem(Request $request, CartItem $cartItem) {
    $cartItem->update([
        'quantity' => $request->input('quantity')
    ]);
    return redirect()->route('cart.index');

}
public function deleteCartItem(CartItem $cartItem) {
    $cartItem->delete();
    return redirect()->back();
}

public function viewAllCartItems() {
    $cartItems = CartItem::with(['user', 'item'])->get();

    return view('Dashboard.orders.all-items', compact('cartItems'));
}
}
