<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Models\Academic_year;
use App\Models\Classes;

class StudentController extends Controller
{
    public function student_create()
    {

        $academes = Academic_year::all();
        $classes = Classes::all();
        return view('admin.student.student', compact('academes','classes'));
    }

    public function student_store(Request $request)
    {
        $user = new User();

        $user->class_id = $request->class;
        $user->academic_id = $request->academic_year;
        $user->admission_date = $request->admission;

        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->dob = $request->dob;


        $user->mobile = $request->mobile;
        $user->email  = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'student';
        $user->save();

        flash()->success('Student Added successfully.');
        return redirect()->back();

    }



    public function student_read()
    {
        $users = User::where('role', 'student')->orderBy('id', 'desc')->get();

        return view('admin.student.list', compact('users'));
    }


    public function student_edit($id)
    {
        $user = User::find($id);
        $academes = Academic_year::all();
        $classes = Classes::all();

        return view('admin.student.edit', compact('user', 'academes',
         'classes'));

    }


    public function student_update(Request $request, $id)
    {
        $user = User::find($id);

        $user->class_id = $request->class;
        $user->academic_id = $request->academic_year;
        $user->admission_date = $request->admission;

        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->dob = $request->dob;


        $user->mobile = $request->mobile;
        $user->email  = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'student';
        $user->save();

        flash()->success('Student Updated successfully.');
        return redirect()->route('student.student_read');

    }


    public function student_delete($id)
    {
        $data = User::find($id);

        $data->delete();

        flash()->success('Student deleted successfully.');
        return redirect()->back();

    }


}
