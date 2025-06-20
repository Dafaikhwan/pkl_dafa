<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use DB;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::table('products')->delete();


        $category1 = Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        $category2 = Category::create([
            'name' => 'Perabotan Rumah',
            'slug' => 'perabotan-rumah',
        ]);

        Product::create([
            'name' => 'Samsung S35 5G',
            'slug' => 'Samsung-S35-5G',
            'category_id' => $category1->id,
            'description' => 'Lorem Ipsum',
            'image' => 'image.png',
            'price' =>  24000000,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Sapu lidi',
            'slug' => 'sapu-lidi',
            'category_id' => $category2->id,
            'description' => 'Lorem Ipsum',
            'image' => 'image.png',
            'price' =>  5000,
            'stock' => 1000,
        ]);
    }
}
