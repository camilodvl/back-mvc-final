<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return $courses;
    }


    public function store(Request $request)
    {       

        Course::create([
            'name'=>$request->name,
            'credits'=>$request->credits,
            'teacher'=>$request->teacher,
            'pre_requisite'=>$request->pre_requisite,
            'a_hours'=>$request->a_hours,
            'd_hours'=>$request->d_hours
        ]);

    }

    public function getById($id)
    {

        $course = Course::find($id);

        return response()->json($course);

    }

    public function destroy($id)
    {

        $course = Course::destroy($id);
        
        return response()->json("Mensaje: eliminado");

    }

    
    public function update(Request $request, $id)
    {

        $course = Course::find($id);
        $course->update($request->all());
        
        return response()->json([
            "Mensaje"=>"Actualizado"
        ]);

    }
}
