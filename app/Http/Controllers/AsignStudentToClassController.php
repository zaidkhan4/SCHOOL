<?php

namespace App\Http\Controllers;

use App\Models\AsignStudentToClass;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AsignStudentToClassController extends Controller
{

    public function stud_create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        $students = User::where('role', 'student')->orderBy('id', 'desc')->get();

        return view('admin.asign_student.create', compact('classes',
         'subjects', 'students'));


    }


    public function stud_store(Request $request)
    {

        $request->validate([
            'class_id'=>'required',
            'subject_id'=>'required',
            'student_id'=>'required',
        ]);

        AsignStudentToClass::updateOrCreate(
            [
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
            ],
            [
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
                'student_id' => $request->student_id,
            ],
        );

        flash()->success('AsignStudentToClass created successfully.');
        return redirect()->back();


    }


    public function stud_read()
    {
        $asignstudents = AsignStudentToClass::all();

        return view('admin.asign_student.list', compact('asignstudents'));
    }


    public function stud_edit($id)
    {
        $asignstudent = AsignStudentToClass::find($id);
        $classes = Classes::all();
        $subjects = Subject::all();
        $students = User::where('role', 'student')->orderBy('id', 'desc')->get();


        return view('admin.asign_student.edit', compact('asignstudent','classes',
        'subjects', 'students'));

    }


    public function stud_update(Request $request, $id)
    {
        $asignstudent = AsignStudentToClass::find($id);

        $asignstudent->class_id = $request->class_id;
        $asignstudent->subject_id = $request->subject_id;
        $asignstudent->student_id = $request->student_id;
        $asignstudent->save();

        flash()->success('Assign Student To Class updated successfully.');
        return redirect()->route('asign_student.stud_read');

    }


    public function stud_delete($id)
    {
        $data = AsignStudentToClass::find($id);

        $data->delete();

        flash()->success('Assign Student To Class deleted successfully.');
        return redirect()->back();

    }


}
