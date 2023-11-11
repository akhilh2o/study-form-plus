<?php

namespace Database\Seeders;

use App\Models\Ebook\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Picsum;

class EbookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'      => 'CA-Ebook',
                'children'  => [
                    ['name' => 'CA Foundation'],
                    ['name' => 'CA Inter GR-1'],
                    ['name' => 'CA Inter GR-2'],
                ]
            ],
            [
                'name'     => 'Test Paper',
                'children' => [
                    ['name' => 'Class 11'],
                    ['name' => 'Class 12'],
                ]
            ],
            [
                'name'     => 'CMA-Ebook',
                'children' => [
                    ['name' => 'CMA Foundation'],
                    ['name' => 'CMA Inter GR-1'],
                    ['name' => 'CMA Inter GR-2'],
                ]
            ],
            [
                'name'     => 'Class 12th Sample Paper',
                'children' => [
                    ['name' => 'CBSE Accounts'],
                ]
            ],
            [
                'name'     => 'Class 10th Sample Paper',
                'children' => [
                    ['name' => 'CBSE Accounts'],
                ]
            ],
            [
                'name'     => 'Chapter wise Ebook',
                'children' => [
                    ['name' => 'Ebook'],
                ]
            ],
        ];

        foreach ($categories as $key => $cat) {

            $category = new Category();

            $category->name                      =  $cat['name'];
            $category->parent_id                 =  0;
            $category->status                    =  true;
            $category->slug                      =  str()->of($cat['name'])->slug();
            $category->content                   =  fake()->realText(rand(30, 200), 2);
            $category->meta_title                =  fake()->realText(rand(30, 200), 2);
            $category->meta_keyword              =  fake()->realText(rand(30, 200), 2);
            $category->meta_description          =  fake()->realText(rand(30, 200), 2);

            $category->image = 'ebook-categories/' . time() . rand() . '.jpg';
            $category->image_thumb = 'ebook-categories/thumb-' . time() . rand() . '.jpg';

            Picsum::dimensions(600, 500)
                ->save(Storage::disk('public')->path($category->image))
                ->save(Storage::disk('public')->path($category->image_thumb), 300)
                ->destroy();

            $category->save();

            if (count($cat['children'])) {
                foreach ($cat['children'] as $key => $child) {
                    $childCategory = new Category();
                    $childCategory->name                      =  $child['name'];
                    $childCategory->parent_id                 =  $category->id;
                    $childCategory->status                    =  true;
                    $childCategory->slug                      =  str()->of($child['name'])->slug();
                    $childCategory->content                   =  fake()->realText(rand(30, 200), 2);
                    $childCategory->meta_title                =  fake()->realText(rand(30, 200), 2);
                    $childCategory->meta_keyword              =  fake()->realText(rand(30, 200), 2);
                    $childCategory->meta_description          =  fake()->realText(rand(30, 200), 2);

                    $childCategory->image = 'ebook-categories/' . time() . rand() . '.jpg';
                    $childCategory->image_thumb = 'ebook-categories/thumb-' . time() . rand() . '.jpg';

                    Picsum::dimensions(600, 500)
                        ->save(Storage::disk('public')->path($childCategory->image))
                        ->save(Storage::disk('public')->path($childCategory->image_thumb), 300)
                        ->destroy();

                    $childCategory->save();
                }
            }
        }
    }
}
