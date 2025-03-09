<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Classes;
use App\Models\Fee_Structure;
use App\Models\Feehead;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    public function fee_add()
    {
        $academes = Academic_year::all();
        $classes = Classes::all();
        $fee_heads = Feehead::all();

        return view('admin.fee_structure.fee_add', compact('academes',
         'classes','fee_heads'));
    }


    public function feestructure_store(Request $request)
    {
        $feestructure = new Fee_Structure;

        $feestructure->class_id = $request->class;
        $feestructure->academic_id = $request->academic_year;
        $feestructure->feehead_id = $request->fee_head;

        $feestructure->april = $request->april;
        $feestructure->may = $request->may;
        $feestructure->june = $request->june;


        $feestructure->july = $request->july;
        $feestructure->agust = $request->august;
        $feestructure->september = $request->september;

        $feestructure->october = $request->octuber;
        $feestructure->november = $request->november;
        $feestructure->december = $request->december;

        $feestructure->january = $request->january;
        $feestructure->febuary = $request->febuary;
        $feestructure->march = $request->march;

        $feestructure->save();

        flash()->success('Fees Structure created successfully.');
        return redirect()->back();

    }

    public function fee_list()
    {
        $fee_structures = Fee_Structure::all();

        return view('admin.fee_structure.fee_list', compact('fee_structures'));
    }


    public function fee_edit($id)
    {
        $feesstrutre = Fee_Structure::find($id);
        $academes = Academic_year::all();
        $classes = Classes::all();
        $fee_heads = Feehead::all();

        return view('admin.fee_structure.fee_edit', compact('feesstrutre', 'academes',
         'classes','fee_heads'));

    }


    public function fee_update(Request $request, $id)
    {

        $feestructure = Fee_Structure::find($id);


        $feestructure->class_id = $request->class;
        $feestructure->academic_id = $request->academic_year;
        $feestructure->feehead_id = $request->fee_head;

        $feestructure->april = $request->april;
        $feestructure->may = $request->may;
        $feestructure->june = $request->june;


        $feestructure->july = $request->july;
        $feestructure->agust = $request->august;
        $feestructure->september = $request->september;

        $feestructure->october = $request->octuber;
        $feestructure->november = $request->november;
        $feestructure->december = $request->december;

        $feestructure->january = $request->january;
        $feestructure->febuary = $request->febuary;
        $feestructure->march = $request->march;

        $feestructure->save();

        flash()->success('Fee Structure updated successfully.');
        return redirect()->route('fee_structure.fee_list');

    }


    public function feestructure_delete($id)
    {
        $data = Fee_Structure::find($id);

        $data->delete();

        flash()->success('Fee Structure deleted successfully.');
        return redirect()->back();

    }








}
