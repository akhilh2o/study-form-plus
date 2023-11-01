<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Takshak\Imager\Facades\Placeholder;
use Illuminate\Support\Str;

class FacultyFactory extends Factory
{
    protected $model = Faculty::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title      = $this->faker->realText(rand(10, 20), 2);
        $avatar     = 'faculties/' . Str::of(microtime())->slug('-') . '.jpg';
        Placeholder::dimensions(150, 150)
            ->background(rand(100, 999))
            ->text(substr($title, 0, 2), [
                'color' => '#fff',
                'size'  => 60
            ])
            ->save(Storage::disk('public')->path($avatar))
            ->destroy();

        return [
            'title'     =>  $title,
            'subtitle'  =>  $this->faker->realText(rand(15, 30), 2),
            'avatar'    =>  $avatar,
            'content'   =>  $this->faker->realText(rand(100, 300), 2),
        ];
    }
}
