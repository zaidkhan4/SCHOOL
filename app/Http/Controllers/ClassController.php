<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function class_add()
    {
        return view('admin.class.class_add');
    }


    public function class_store(Request $request)
    {
        $class = new Classes;

        $class->name = $request->name;
        $class->save();

        flash()->success('Class created successfully.');
        return redirect()->back();

    }

    public function class_read()
    {
        $datas = Classes::all();
        return view('admin.class.class_list', compact('datas'));
    }


    public function class_edit($id)
    {
        $data = Classes::find($id);
        return view('admin.class.class_edit', compact('data'));
    }


    public function class_update(Request $request, $id)
    {
        $data = Classes::find($id);

        $data->name = $request->name;
        $data->save();

        flash()->success('Class updated successfully.');
        return redirect()->route('class.class_read');

    }


    public function class_delete($id)
    {
        $data = Classes::find($id);

        $data->delete();

        flash()->success('Class deleted successfully.');
        return redirect()->back();

    }


}
