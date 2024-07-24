<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class PapersController extends Controller
{
    public function index()
    {
        $items = Items::all(); 

        return view('categories.Papers', ['items' => $items]);
    }
    public function show(string $id)
    {
        $items = Items::findOrFail($id);
        return view('items.show', ['items' => $items]);
    }
}
