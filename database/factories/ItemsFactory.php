<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Items;
use Illuminate\Support\Facades\Storage;

class ItemsFactory extends Factory
{
    protected $model = Items::class;

    public function definition()
    {
        $categories = ['Art', 'Measuring', 'Office', 'Papers', 'Pens', 'School', 'Toys'];
        $category = $this->faker->randomElement($categories);

        // Get list of files in the directory
        $files = Storage::disk('public')->files('products');

        // Choose a random image file
        $randomImage = $this->faker->randomElement($files);

        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->words(7, true),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'sale_price' => $this->faker->randomFloat(2, 1, 50),
            'category' => $category,
            'product_image' => $randomImage, // Use the randomly chosen image file
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
