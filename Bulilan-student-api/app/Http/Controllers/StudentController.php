<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{




    public function index(Request $request)
    {
        $query = Student::query();
    
        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('firstname', 'like', "%{$search}%")
                         ->orWhere('lastname', 'like', "%{$search}%")
                         ->orWhere('nickname', 'like', "%{$search}%");
            });
        }
    
        // Sort
        if ($request->has('sort')) {
            $sortDirection = strtolower($request->get('direction', 'asc')) === 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort, $sortDirection);
        }
    
        // Fields
        $fields = $request->get('fields');
        if ($fields) {
            $fieldsArray = explode(',', $fields); //explode, comma for more than 1 field
            $query->select($fieldsArray);
        }
    
        // Limit
        $limit = $request->get('limit', 10);
        $students = $query->paginate($limit);
    
       
        //after the logic above, always return the response :>
        return response()->json($students);
    }
    




    public function find($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student);
    }





    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer',
            'nickname' => 'required|string|max:255',
        ]);

        $student = Student::create($validatedData);
        return response()->json($student, Response::HTTP_CREATED);
    }


    public function update(UpdateStudentRequest $request, $id) {
        $student = Student::findOrFail($id);
        $student->update($request->validated());
        return response()->json($student);
    }


    public function destroy($id)
    {
    $student = Student::findOrFail($id);
    $student->delete();

    return response()->json(['message' => 'Student deleted successfully'], 204);
    }

   
}
