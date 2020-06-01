<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search=request()->query('search');
        if ($search) {
            $students=Student::where('firstname','LIKE',"%{$search}%")->paginate(5);
        }else {
            $students=Student::paginate(5);
        }
        return view('welcome')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        Student::create([
            'firstname'=>request()->firstname,
            'lastname'=>request()->lastname,
            'age'=>request()->age,
            'speciality'=>request()->speciality,
        ]);
        session()->flash('success','New student has been added successfully');
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('create')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update([
            'firstname'=>request()->firstname,
            'lastname'=>request()->lastname,
            'age'=>request()->age,
            'speciality'=>request()->speciality,
        ]);
        session()->flash('success','student data has been updated successfully');
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        session()->flash('success','Student has beent deleted successfully');
        return redirect(route('students.index'));
    }
}
