<?php

namespace App\Http\Controllers;

use App\Models\Anouncement;
use Illuminate\Http\Request;

class AnouncementController extends Controller
{
    public function anouncement_create()
    {
        return view('admin.anouncement.create');
    }
    
    public function anouncement_store(Request $request)
    {
        $anouncement = new Anouncement;

        $anouncement->message = $request->message;
        $anouncement->type = $request->type;
        $anouncement->save();

        flash()->success('Anouncement created successfully.');
        return redirect()->back();

    }

    public function anouncement_read()
    {
        $anouncements = Anouncement::all();

        return view('admin.anouncement.list', compact('anouncements'));
    }
    
    public function anouncement_edit($id)
    {
        $anouncement = Anouncement::find($id);

        return view('admin.anouncement.edit', compact('anouncement'));
    }

    public function anouncement_update(Request $request, $id)
    {
        $anouncement = Anouncement::find($id);

        $anouncement->message = $request->message;
        $anouncement->type = $request->type;
        $anouncement->save();

        flash()->success('Anouncement Updated successfully.');
        return redirect()->route('anouncement.anouncement_read');

    }

    public function anouncement_delete($id)
    {
        $data = Anouncement::find($id);

        $data->delete();

        flash()->success('Anouncement deleted successfully.');
        return redirect()->back();

    }

}
