<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subject_create()
    {
        return view('admin.subject.create');
    }

    public function subject_store(Request $request)
    {
        $subject = new Subject;

        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->save();

        flash()->success('Subject Added successfully.');
        return redirect()->back();

    }

    public function subject_read()
    {
        $subjects = Subject::all();
        return view('admin.subject.list', compact('subjects'));
    }

    public function subject_edit($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.edit', compact('subject'));
    }

    public function subject_update(Request $request, $id)
    {
        $subject = Subject::find($id);

        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->save();

        flash()->success('Subject Updated successfully.');
        return redirect()->route('subject.subject_read');

    }

    public function subject_delete($id)
    {
        $data = Subject::find($id);

        $data->delete();

        flash()->success('Subject deleted successfully.');
        return redirect()->back();

    }

    
}
