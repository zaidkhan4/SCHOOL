<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AssignTeacherToClassController extends Controller
{
    public function teach_create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        $teachers = User::where('role', 'teacher')->orderBy('id', 'desc')->get();

        return view('admin.asign_teacher.form', compact('classes',
         'subjects', 'teachers'));
    }

   
    public function teach_store(Request $request)
    {

        $request->validate([
            'class_id'=>'required',
            'subject_id'=>'required',
            'teacher_id'=>'required',
        ]);

        AssignTeacherToClass::updateOrCreate(
            [
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
            ],
            [
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
            ],
        );

        flash()->success('AssignTeacherToClass created successfully.');
        return redirect()->back();


    }


    public function teach_read()
    {
        $asignteachers = AssignTeacherToClass::all();

        return view('admin.asign_teacher.list', compact('asignteachers'));
    }


    public function teach_edit($id)
    {
        $asignteacher = AssignTeacherToClass::find($id);
        $classes = Classes::all();
        $subjects = Subject::all();
        $teachers = User::where('role', 'teacher')->orderBy('id', 'desc')->get();


        return view('admin.asign_teacher.edit', compact('asignteacher','classes',
        'subjects', 'teachers'));
    }

    public function teach_update(Request $request, $id)
    {
        $asignteacher = AssignTeacherToClass::find($id);

        $asignteacher->class_id = $request->class_id;
        $asignteacher->subject_id = $request->subject_id;
        $asignteacher->teacher_id = $request->teacher_id;
        $asignteacher->save();

        flash()->success('Assign Teacher To Class updated successfully.');
        return redirect()->route('asign_teacher.teach_read');

    }

    public function teach_delete($id)
    {
        $data = AssignTeacherToClass::find($id);

        $data->delete();

        flash()->success('Assign Teacher To Class deleted successfully.');
        return redirect()->back();

    }



}
