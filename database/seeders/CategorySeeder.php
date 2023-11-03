<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "title" => "Outwear"
        ]);

        Category::create([
            "title"=> "T-shirt"
        ]);

        Category::create([
            "title"=> "Shirts & Blouses"
        ]);

        Category::create([
            "title"=> "Pants"
        ]);
        
        Category::create([
            "title"=> "Accesories"
        ]);
    }
}
