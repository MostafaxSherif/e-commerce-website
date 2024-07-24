<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ToysgiftsController extends Controller
{
    public function index()
    {
        $items = Items::all(); 

        return view('categories.Toys-gifts', ['items' => $items]);
    }
    public function show(string $id)
    {
        $items = Items::findOrFail($id);
        return view('items.show', ['items' => $items]);
    }
}
