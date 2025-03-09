<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacher_create()
    {
        return view('admin.teacher.create');
    }

    public function teacher_store(Request $request)
    {
        $user = new User;



        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->dob = $request->dob;


        $user->mobile = $request->mobile;
        $user->email  = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'teacher';
        $user->save();

        flash()->success('Teacher Added successfully.');
        return redirect()->back();

    }

    public function teacher_read()
    {
        $users = User::where('role', 'teacher')->orderBy('id', 'desc')->get();

        return view('admin.teacher.list', compact('users'));

    }

    public function teacher_edit($id)
    {
        $user = User::find($id);
        return view('admin.teacher.edit', compact('user'));

    }

    public function teacher_update(Request $request, $id)
    {
        $user = User::find($id);



        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->dob = $request->dob;


        $user->mobile = $request->mobile;
        $user->email  = $request->email;
        $user->save();

        flash()->success('Teacher Updated successfully.');
        return redirect()->route('teacher.teacher_read');

    }

    public function teacher_delete($id)
    {
        $data = User::find($id);

        $data->delete();

        flash()->success('Teacher deleted successfully.');
        return redirect()->back();

    }


    public function login()
    {
        return view('teacher.login');

    }

    public function authenticate(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('teacher')->attempt(['email' => $req->email, 'password' => $req->password]))
        {
            if(Auth::guard('teacher')->user()->role != 'teacher'){
                Auth::guard('teacher')->logout();
                flash()->error('Unauthorize user. accress denite.');
                return redirect()->route('teacher.login');
            }
            flash()->success('Login successfully.');
            return redirect()->route('teacher.dashboard');
        }else
        {
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('teacher.dashboard');

    }

    public function logout()
    {
        Auth::guard('teacher')->logout();

        flash()->success('Logged out Successfully.');
        return redirect()->route('teacher.login');
    }


    public function myclass()
    {
        $teacher_id = Auth::guard('teacher')->user()->id;
        $assign_class = AssignTeacherToClass::where('teacher_id', $teacher_id)->with(['class', 'subject'])->get();

        return view('teacher.myclass', compact('assign_class'));
    }








}
