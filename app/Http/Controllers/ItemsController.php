<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage; // Add this line for correct namespace
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all(); 
        return view('Dashboard.items.index', ['items' => $items]);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Items::all(); 


        return view('Dashboard.items.create', ['items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data, including the presence of the image
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'sale_price' => 'required',
        'category' => 'required',
        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules for image upload
    ]);

    // Retrieve validated data
    $name = $validatedData['name'];
    $description = $validatedData['description'];
    $price = $validatedData['price'];
    $sale_price = $validatedData['sale_price'];
    $category = $validatedData['category'];

    // Handle image upload
    if ($request->hasFile('product_image')) {
        $imagePath = $request->file('product_image')->store('products', 'public');
    } else {
        // If image is required but not provided, return an error response
        return redirect()->back()->withErrors(['product_image' => 'The image is required.'])->withInput();
    }

    // Create item with image
    Items::create([
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'sale_price' => $sale_price,
        'category' => $category,
        'product_image' => $imagePath,
    ]);

    return redirect()->route('Dashboard.items.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Items::findOrFail($id);
        return view('Dashboard.items.show', ['items' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Items::findOrFail($id);

        return view('Dashboard.items.edit', ['items' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         $request->validate([
             'name' => 'required|string',
             'description' => 'required|string',
             'price' => 'required|numeric',
             'sale_price' => 'nullable|numeric',
             'category' => 'required|string',
             'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image rules as needed
         ]);
     
         $item = Items::findOrFail($id);
     
         // Handle image upload if a new image is provided
         if ($request->hasFile('product_image')) {
             // Delete the old product_image if it exists
             if ($item->product_image) {
                 Storage::delete($item->product_image);
             }
             $imagePath = $request->file('product_image')->store('public/products'); // Store the file in the storage directory
             $imagePath = str_replace('public/', '', $imagePath); // Adjust the path to remove the 'public/' prefix
         } else {
             $imagePath = $item->product_image;
         }
     
         $item->update([
             'name' => $request->name,
             'description' => $request->description,
             'price' => $request->price,
             'sale_price' => $request->sale_price,
             'category' => $request->category,
             'product_image' => $imagePath,
         ]);
     
         return redirect()->route('Dashboard.items.index');
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Items::findOrFail($id);

        $item->delete();

        return to_route('Dashboard.items.index');
    }
}
