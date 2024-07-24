<?php

use App\Models\Text;
use App\Models\Items;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PensController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PapersController;
use App\Http\Controllers\ContactController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtcolorsController;
use App\Http\Controllers\MeasuringController;
use App\Http\Controllers\ToysgiftsController;
use App\Http\Controllers\OfficesuppliesController;
use App\Http\Controllers\SchoolsuppliesController;



Route::get('/', function () {
    $items = Items::all(); 
    $text = Text::first(); // Assuming you want to fetch the first text entry
    $specialOffer = $text ? $text->content : '';
    return view('home', ['items' => $items, 'specialOffer' => $specialOffer]);
});

 

Route::get('/Artcolors', [ArtcolorsController::class, 'index'])->name('Artcolors');
Route::get('/Measuring', [MeasuringController::class, 'index'])->name('Measuring');
Route::get('/Officesupplies', [OfficesuppliesController::class, 'index'])->name('Officesupplies');
Route::get('/Papers', [PapersController::class, 'index'])->name('Papers');
Route::get('/Pens', [PensController::class, 'index'])->name('Pens');
Route::get('/Schoolsupplies', [SchoolsuppliesController::class, 'index'])->name('Schoolsupplies');
Route::get('/Toysgifts', [ToysgiftsController::class, 'index'])->name('Toysgifts');

Route::get('/Dashboard', [ItemsController::class, 'index'])->name('items.index')->middleware(['auth','admin']);
Route::get('/Dashboard/create', [ItemsController::class, 'create'])->name('items.create')->middleware(['auth','admin']);
Route::post('/Dashboard', [ItemsController::class, 'store'])->name('items.store')->middleware(['auth','admin']);
Route::get('/Dashboard/{item}', [ItemsController::class, 'show'])->name('items.show');
Route::get('/Dashboard/{item}/edit', [ItemsController::class, 'edit'])->name('items.edit')->middleware(['auth','admin']);
Route::put('/Dashboard/{item}', [ItemsController::class, 'update'])->name('items.update')->middleware(['auth','admin']);
Route::delete('/Dashboard/{item}',[ItemsController::class, 'destroy'])->name('items.destroy')->middleware(['auth','admin']);


Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware(['auth']);
Route::post('/add-to-cart/{item}', [CartController::class, 'addToCart'])->name('cart.add')->middleware(['auth']);
Route::delete('/cart/{cartItem}', [CartController::class, 'deleteCartItem'])->name('cart.delete');
Route::put('/cart/{cartItem}', [CartController::class, 'updateCartItem'])->name('cart.update');
Route::get('/all-cart-items', [CartController::class, 'viewAllCartItems'])->name('cart.all');


Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware(['auth','admin']);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware(['auth','admin']);
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware(['auth','admin']);
Route::get('/users/{item}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{item}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{item}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{item}',[UserController::class, 'destroy'])->name('users.destroy');




Route::get('texts', [TextController::class, 'index'])->name('texts.index')->middleware(['auth','admin']);
Route::get('texts/{text}/edit', [TextController::class, 'edit'])->name('texts.edit')->middleware(['auth','admin']);
Route::patch('texts/{text}', [TextController::class, 'update'])->name('texts.update')->middleware(['auth','admin']);
Route::delete('texts/{text}', [TextController::class, 'destroy'])->name('texts.destroy')->middleware(['auth','admin']);
Route::post('texts', [TextController::class, 'store'])->name('texts.store')->middleware(['auth','admin']);


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/dashboard/contact', [ContactController::class, 'Dashindex'])->name('contact.Dashindex')->middleware(['auth','admin']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware(['auth','admin']);



// Route::get('/Dashboard', function () {
//     // return view('Dashboard');
//     return redirect()->back();
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

