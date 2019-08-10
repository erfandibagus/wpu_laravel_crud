<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{

    public function index()
    {
        $students = Student::all();
        $trashed = Student::onlyTrashed()->get();
        return view('students.index', ['students' => $students, 'trashed' => $trashed]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'nrp'       => 'required|size:9',
            'email'     => 'required|email',
            'jurusan'   => 'required'
        ]);
        Student::create($request->all());
        return redirect('/students')->with('status', 'Berhasil');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama'      => 'required',
            'nrp'       => 'required|size:9',
            'email'     => 'required|email',
            'jurusan'   => 'required'
        ]);
        Student::find($student->id)->update($request->all());
        return redirect('/students/'.$student->id)->with('status', 'Berhasil');
    }

    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Berhasil');
    }

    public function trashed($id)
    {
        $student = Student::withTrashed()->where('id', $id)->get();
        return view('students.trashed', compact('student'));
    }

    public function undelete($id)
    {
        Student::withTrashed()->find($id)->restore();
        return redirect('/students')->with('status', 'Berhasil');
    }

    public function delete($id)
    {
        Student::withTrashed()->find($id)->forceDelete();
        return redirect('/students')->with('status', 'Berhasil');
    }
}
