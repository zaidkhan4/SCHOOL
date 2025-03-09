<?php

namespace App\Http\Controllers;

use App\Models\Anouncement;
use App\Models\AssignTeacherToClass;
use App\Models\Timetable;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{




    public function login()
    {
        return view('student.login');
    }

    public function authenticate(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {

            if(Auth::user()->role != 'student'){
                Auth::logout();
                flash()->error('Unauthorize user. accress denite.');
                return redirect()->route('student.login');
            }
            flash()->success('Login successfully.');
            return redirect()->route('student.dashboard');


        }else{
            flash()->error('Something with wrong.');
            return redirect()->route('student.login');
        }
    }

    public function dashboard()
    {
        $data = Anouncement::where('type', 'student')->latest()->limit(1)->get();

        return view('student.dashboard', compact('data'));
    }

    public function logout()
    {
        Auth::logout();

        flash()->success('Logged out Successfully.');
        return redirect()->route('student.login');
    }


    public function change_password()
    {
        return view('student.change_password');
    }


    public function update_password(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $user =  User::find(Auth::user()->id);

        if(Hash::check($old_password, $user->password))
        {
            $user->password = $new_password;
            $user->update();

            flash()->success('Password Change Successfully.');
            return redirect()->route('student.dashboard');
        }
        else
        {
            flash()->error('Old password Does not Match.');
            return redirect()->back();
        }

    }

    public function my_subject()
    {
        $class_id = Auth::guard('web')->user()->class_id;
        $my_subjects = AssignTeacherToClass::where('class_id', $class_id)->with('subject','teacher')->get();

        return view('student.mysubject', compact('my_subjects'));

    }



    public function timeables()
    {
        $class_id = Auth::guard('web')->user()->class_id;
        $timetable = Timetable::with(['day', 'subject'])->where('class_id', $class_id)->get();
        $group = [];

        foreach ($timetable as  $data) {
            $group[$data->day->name][]= [
                'subject'=>$data->subject->name,
                'start_time'=>$data->start_time,
                'end_time'=>$data->end_time,
                'room_no'=>$data->room_no,
            ];
        }

        $timetables = $group;

        return view('student.timetable', compact('timetables'));

        

    }


}
