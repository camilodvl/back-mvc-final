<?php

namespace App\Http\Controllers;

use App\Models\CourseProgram;
use Illuminate\Http\Request;

class CourseProgramController extends Controller
{
    
    public function store(Request $request)
    {

        CourseProgram::create([
            'course_id'=>$request->course_id,
            'program_id'=>$request->program_id,
            'semester'=>$request->semester,
        ]);

    }
}
