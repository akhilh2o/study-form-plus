<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'               =>  Category::first()->id,
            'title'                     =>  $this->faker->text(rand(50, 70)),
            'sub_title'                 =>  $this->faker->realText(rand(50, 150)),
            'slug'                      =>  $this->faker->slug(4),
            'description'               =>  $this->faker->realText(rand(150, 400)),
            'download_link'             =>   $this->faker->url(),
            'status'                    =>  true,
            'popular'                   =>  true,
            'meta_title'                =>  $this->faker->realText(rand(50, 150)),
            'meta_keyword'              =>  $this->faker->realText(rand(50, 150)),
            'meta_description'          =>  $this->faker->realText(rand(50, 150)),
            'thumbnail' => '',
        ];
    }
}
