<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'phone_num' => 'required|numeric',
            'user_type' => 'required|in:user,admin',
        ]);
    
        $userData = $request->all();
        $userData['password'] = Hash::make($request->password);
    
        User::create($userData);
        
        return redirect()->route('users.index');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $cartItems = CartItem::where('user_id', $id)->get();
        return view('users.show', ['user' => $user, 'cartItems' => $cartItems]);
    }

    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.edit', ['users' => $users]);
    }

    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6', // Password is nullable because it's optional in the update form
        'address' => 'required',
        'phone_num' => 'required|numeric',
        'user_type' => 'required|in:user,admin',
    ]);

    // Prepare data to update
    $userData = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'phone_num' => $request->phone_num,
        'user_type' => $request->user_type,
    ];

    // Update password only if provided
    if ($request->filled('password')) {
        $userData['password'] = bcrypt($request->password);
    }

    // Update user record
    $user->update($userData);

    // Redirect back to the edit page or any other appropriate route
    return redirect()->back()->with('status', 'User updated successfully');
}


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
