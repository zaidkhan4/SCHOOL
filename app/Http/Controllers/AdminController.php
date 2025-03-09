<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password]))
        {
            if(Auth::guard('admin')->user()->role != 'admin'){
                Auth::guard('admin')->logout();
                flash()->error('Unauthorize user. accress denite.');
                return redirect()->route('admin.login');
            }
            flash()->success('Login successfully.');
            return redirect()->route('admin.dashboard');
        }else
        {
            return redirect()->back();
        }
    }

    public function register()
    {
        $user = new User;

        $user->name = 'admin';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345');
        $user->class_id = '1';
        $user->academic_id = '1';


        $user->save();


        flash()->success('User created successfully.');
        return redirect()->route('admin.login');

    }


    public function dashboard()
    {
        $student = User::where('role', 'student')->orderBy('id', 'desc')->get()->count();
        $teacher = User::where('role', 'teacher')->orderBy('id', 'desc')->get()->count();
        $parent = User::where('role', 'parent')->orderBy('id', 'desc')->get()->count();
        $class = Classes::all()->count();

        return view('admin.dashboard', compact('student','teacher','parent','class'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        flash()->error('Logged out successfully.');
        return redirect()->route('admin.login');
    }

    public function form()
    {
        return view('admin.form');
    }

    public function table()
    {
        return view('admin.table');
    }

    public function new_admin()
    {
        return view('admin.new_add');
    }

    public function new_store(Request $request)
    {
        $admin = new User();

        $admin->name = $request->name;
        $admin->email  = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = 'admin';
        $admin->save();

        flash()->success('Admin Added successfully.');
        return redirect()->back();

    }


    public function new_read()
    {
        $admins = User::where('role', 'admin')->orderBy('id', 'desc')->get();

        return view('admin.admin_show',compact('admins'));
    }

    public function new_edit($id)
    {
        $admin = User::find($id);

        return view('admin.admin_edit',compact('admin'));
    }


    public function new_update(Request $request, $id)
    {
        $admin = User::find($id);


        $admin->name = $request->name;
        $admin->email  = $request->email;
        $admin->role = 'admin';
        $admin->save();

        flash()->success('Admin Updated successfully.');
        return redirect()->route('admin.new_read');

    }


    public function new_delete($id)
    {
        $data = User::find($id);

        $data->delete();

        flash()->success('Admin deleted successfully.');
        return redirect()->back();

    }


}
