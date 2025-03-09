<?php

namespace App\Http\Controllers;

use App\Models\AsignSubjectToClass;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;

class AsignSubjectToClassController extends Controller
{
    public function asign_create()
    {
        $subjects = Subject::all();
        $classes = Classes::all();
        return view('admin.asign_subject.create', compact('subjects', 'classes'));
    
    }
    
    public function asign_store(Request $request)
    {
        {
            $class_id = $request->class_id;
            $subject_id = $request->subject_id;

            foreach ($subject_id as $sub_id) {
                AsignSubjectToClass::updateOrCreate(
                    [
                        'class_id' => $class_id,
                        'subject_id' => $sub_id, 
                    ],
                    [
                        'class_id' => $class_id,
                        'subject_id' => $sub_id, 
                    ]
                );
            }

            flash()->success('Assign created successfully.');
            return redirect()->back();
        }
    }

    
    public function asign_read()
    {
        $asingns = AsignSubjectToClass::all();

        return view('admin.asign_subject.list', compact('asingns'));
    }
    
    public function asign_edit($id)
    {
        $asingn = AsignSubjectToClass::find($id);
        $subjects = Subject::all();
        $classes = Classes::all();

        return view('admin.asign_subject.edit', compact('asingn', 'subjects', 'classes'));
    
    }
    
    public function asign_update(Request $request, $id)
    {
        $asingn = AsignSubjectToClass::find($id);

        $asingn->class_id = $request->class_id;
        $asingn->subject_id = $request->subject_id;
        $asingn->save();

        flash()->success('AsignSubjectToClass Updated successfully.');
        return redirect()->route('asign_subject.asign_read');

    }
    
    public function asign_delete($id)
    {
        $data = AsignSubjectToClass::find($id);

        $data->delete();

        flash()->success('AsignSubjectToClass deleted successfully.');
        return redirect()->back();

    }
        



}
