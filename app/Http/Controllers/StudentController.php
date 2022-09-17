<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::All();
        return view('students.index',compact('students'));
    }
    
    public function create()
    {
        return view('students/create');
    }
    
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'absent' => 'required',
        ]);
        
        Student::create($request->all());

        return redirect() ->route('students.index')->with('succes', 'Berhaslil menambahkan.');
    }

    public function edit(Student $students)
    {
        return view('students.edit',compact('students'));
    }

public function update(Request $request, Student $students)
{
    $request->validate([
        'name' => 'required',
            'gender' => 'required',
            'absent' => 'required',
    ]);
    $students->update($request->all());
    return redirect()->route('students.index')->with('success','Berhasil mengupdate');
}

public function destroy(Student $students)
{
    $students->delete();

    return redirect()->route('students.index')->with('success','Berhasil menghapus');
}
}
// KAYLA MAYRAFADINI

