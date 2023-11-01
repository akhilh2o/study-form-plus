<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::paginate(50)
            ->withQueryString();
        return view('faculties')->with(['faculties' => $faculties]);
    }

    public function detail(Faculty $faculty)
    {
        return view('faculty')->with('faculty', $faculty);
    }
}
