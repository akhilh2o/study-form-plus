<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->deleteDirectory('categories');
        // Category::truncate();
        // Course::truncate();

        foreach (range(1, 10) as $key) {

            $category = new Category();
            $category->name                      =  fake()->name();
            $category->parent_id                 =  0;
            $category->status                    =  true;
            $category->slug                      =  fake()->slug();
            $category->content                   =  fake()->realText(100, 2);
            $category->meta_title                =  fake()->realText(100, 2);
            $category->meta_keyword              =  fake()->realText(100, 2);
            $category->meta_description          =  fake()->realText(100, 2);
            $category->save();
        }
    }
}
