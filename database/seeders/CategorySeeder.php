<?php

namespace Database\Seeders;
use DB;
// use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->delete();

        Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        Category::create([
            'name' => 'Perabotan Rumah',
            'slug' => 'perabotan-rumah',
        ]);
    }
}
