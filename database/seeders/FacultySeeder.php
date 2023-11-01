<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FacultySeeder extends Seeder
{
    public function run()
    {
        Storage::disk('public')->deleteDirectory('faculties');
        Faculty::truncate();
        Faculty::factory()->count(10)->create();
    }
}
