<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function add_student_submit(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'department' => 'required',
        // ]);

        $entity = new Student();
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->department = $request->department;
        $entity->save();

        return response()->json([
            'is_success' => true,
            'message' => 'Student Added Successfully',
            'data' => $entity,
        ]);
    }
}
