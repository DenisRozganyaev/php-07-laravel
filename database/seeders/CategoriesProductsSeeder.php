<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(4)->create()->each(function($category) {
            Product::factory(rand(2, 4))->make()->each(function($product) use ($category) {
                $category->products()->create($product->attributesToArray());
//                $product->create(array_merge(
//                    $product->attributesToArray(),
//                    ['category_id' => $category->id]
//                ));
                // Create new product row (in products table) with category_id = $category->id
            });
        });
    }
}
