<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function academic_year()
    {
        return view('admin.academic_year');
    }


    public function academic_store(Request $request)
    {
        $academin = new Academic_year;

        $academin->name = $request->name;
        $academin->save();

        flash()->success('Academic Year created successfully.');
        return redirect()->back();

    }

    public function academic_read()
    {
        $academins = Academic_year::all();
        return view('admin.academic_year_list', compact('academins'));
    }


    public function academic_edit($id)
    {
        $data = Academic_year::find($id);
        return view('admin.academic_edit', compact('data'));
    }


    public function academic_update(Request $request, $id)
    {
        $data = Academic_year::find($id);

        $data->name = $request->name;
        $data->save();

        flash()->success('Academic Year updated successfully.');
        return redirect()->route('admin.academic_read');

    }


    public function academic_delete($id)
    {
        $data = Academic_year::find($id);

        $data->delete();

        flash()->success('Academic Year deleted successfully.');
        return redirect()->route('admin.academic_read');

    }

    
}
