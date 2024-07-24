<?php

namespace App\Http\Controllers;

use App\Models\Items;

class SchoolsuppliesController extends Controller
{
    public function index()
    {
        $items = Items::all(); 

        return view('categories.School-supplies', ['items' => $items]);
    }
    public function show(string $id)
    {
        $items = Items::findOrFail($id);
        return view('items.show', ['items' => $items]);
    }
}
