<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function login()
    {
        return view('parent.login');
    }



    public function paret_authenticate(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('parent')->attempt(['email' => $req->email, 'password' => $req->password])) {
            // Check the role
            $user = Auth::guard('parent')->user();
            if($user->role != 'parent'){
                Auth::guard('parent')->logout();
                flash()->error('Unauthorized user. Access denied.');
                return redirect()->route('parent.login');
            }
            flash()->success('Login successful.');
            return redirect()->route('parent.dashboard');
        } else {
            flash()->error('Invalid credentials.');
            return redirect()->back();
        }
    }





    public function dashboard()
    {
        return view('parent.dashboard');

    }

    public function parent_create()
    {
        return view('admin.parent.create');
    }


    public function parent_store(Request $request)
    {
        $parent = new User();


        $parent->name = $request->name;
        $parent->email  = $request->email;
        $parent->dob = $request->dob;
        $parent->password = Hash::make($request->password);
        $parent->role = 'parent';
        $parent->save();

        flash()->success('Parent Added successfully.');
        return redirect()->back();

    }

    public function parent_read()
    {
        $parents = User::where('role', 'parent')->orderBy('id', 'desc')->get();

        return view('admin.parent.list', compact('parents'));
    }

    public function parent_edit($id)
    {
        $parent = User::find($id);

        return view('admin.parent.edit', compact('parent'));
    }


    public function parent_update(Request $request, $id)
    {
        $parent = User::find($id);


        $parent->name = $request->name;
        $parent->email  = $request->email;
        $parent->dob = $request->dob;
        $parent->save();

        flash()->success('Parent Updated successfully.');
        return redirect()->route('parent.parent_read');

    }


    public function parent_delete($id)
    {
        $data = User::find($id);

        $data->delete();

        flash()->success('Parent deleted successfully.');
        return redirect()->back();

    }

}
