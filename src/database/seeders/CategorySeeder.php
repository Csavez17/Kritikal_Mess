<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
    ['category_name' => 'Technológia'],
    ['category_name' => 'Szerelem'],
    ['category_name' => 'Sport'],
    ['category_name' => 'Játékok'],
    ['category_name' => 'Zene'],
    ['category_name' => 'Gasztronómia'],
    ['category_name' => 'Film és sorozat'],
    ['category_name' => 'Oktatás / Tanulás'],
    ['category_name' => 'Társalgás / Közélet'],
    ['category_name' => 'Utazás'],
    ];

        foreach ($categories as $category) {
            \DB::table('categories')->insert($category);
        }
    }
}
