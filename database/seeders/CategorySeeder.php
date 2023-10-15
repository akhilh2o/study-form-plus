<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Picsum;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'English', 'Mathematics', 'Science', 'Physics', 'History', 'Moral Science', 'World War II', 'Political Science', 'Medical Science', 'Calculus', 'Computer Science', 'Literature'
        ];

        foreach ($categories as $key => $cat) {
            $category = new Category();
            $category->name                      =  $cat;
            $category->parent_id                 =  0;
            $category->status                    =  true;
            $category->slug                      =  str()->of($cat)->slug();
            $category->content                   =  fake()->realText(rand(30, 200), 2);
            $category->meta_title                =  fake()->realText(rand(30, 200), 2);
            $category->meta_keyword              =  fake()->realText(rand(30, 200), 2);
            $category->meta_description          =  fake()->realText(rand(30, 200), 2);

            $category->image = 'categories/' . time().rand() . '.jpg';
            $category->image_thumb = 'categories/thumb-' . time().rand() . '.jpg';

            // Picsum::dimensions(600, 500)
            //     ->save(Storage::disk('public')->path($category->image))
            //     ->save(Storage::disk('public')->path($category->image_thumb), 300)
            //     ->destroy();

            $category->save();
        }
    }
}
