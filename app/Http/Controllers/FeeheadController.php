<?php

namespace App\Http\Controllers;


use App\Models\Feehead;
use Illuminate\Http\Request;

class FeeheadController extends Controller
{
    public function fee_create()
    {
        return view('admin.fee.fee_create');
    }


    public function fee_store(Request $request)
    {
        $fees = new Feehead;

        $fees->name = $request->name;
        $fees->save();

        flash()->success('Fee created successfully.');
        return redirect()->back();

    }

    public function fee_read()
    {
        $fees = Feehead::all();
        return view('admin.fee.fee_read', compact('fees'));
    }


    public function fee_edit($id)
    {
        $data = Feehead::find($id);
        return view('admin.fee.fee_edit', compact('data'));
    }


    public function fee_update(Request $request, $id)
    {
        $data = Feehead::find($id);

        $data->name = $request->name;
        $data->save();

        flash()->success('Fee updated successfully.');
        return redirect()->route('fee.fee_read');

    }


    public function fee_delete($id)
    {
        $data = Feehead::find($id);

        $data->delete();

        flash()->success('Fee deleted successfully.');
        return redirect()->back();

    }


}
