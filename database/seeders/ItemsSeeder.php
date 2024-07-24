<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Items;
use Illuminate\Support\Facades\Storage;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Art', 'Measuring', 'Office', 'Papers', 'Pens', 'School', 'Toys'];

        foreach ($categories as $category) {
            // Copy files to storage/app/public
            $this->copyFilesToStorage($category);

            // Create items
            Items::factory()->count(12)->create(['category' => $category]);
        }
    }

    /**
 * Copy files from public/img/products to storage/app/public
 */
private function copyFilesToStorage()
{
    $sourcePath = public_path('img/products');
    $destinationPath = storage_path('app/public/products');

    // Ensure the destination directory exists
    Storage::makeDirectory('public/products');

    // Get list of files in the directory
    $files = scandir($sourcePath);

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $sourcePath . '/' . $file;

            // Copy file to storage/app/public
            Storage::putFileAs('public/products', $filePath, $file);
        }
    }
}

}
