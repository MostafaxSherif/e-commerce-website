<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'product_image',
        'sale_price',
        'category',
    ];

    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

}
