<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class MeasuringController extends Controller
{
    public function index()
    {
        $items = Items::all(); 

        return view('categories.Measuring', ['items' => $items]);
    }
    public function show(string $id)
    {
        $items = Items::findOrFail($id);
        return view('items.show', ['items' => $items]);
    }
}
