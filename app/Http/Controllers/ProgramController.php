<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('courses')->get();
        return $programs;//response()->json($programs);
    }


    public function store(Request $request)
    {

        Program::create([
            'name'=>$request->name
        ]);

    }


    public function getById($id)
    {

        $program = Program::with('courses')->find($id);
        
        return response()->json($program);

    }
}
