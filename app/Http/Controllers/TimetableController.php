<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Day;
use App\Models\Subject;
use App\Models\TeacherTimetable;
use App\Models\Timetable;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function timetable_create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        $days = Day::all();


        return view('admin.timetable.create', compact('classes', 'subjects','days'));
    }





    public function timetable_store(Request $request)
    {

        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
         foreach ($request->timetable as $timetable) {

            $day_id = $timetable['day_id'];
            $start_time = $timetable['start_time'];
            $end_time = $timetable['end_time'];
            $room_no = $timetable['room_no'];

            if($start_time != null)
            {
                Timetable::updateOrCreate(

                    [
                        'class_id'=>$class_id,
                            'subject_id'=>$subject_id,
                            'day_id'=>$day_id,
                    ],
                    [
                        'class_id'=>$class_id,
                        'subject_id'=>$subject_id,
                        'day_id'=>$day_id,
                        'start_time'=>$start_time,
                        'end_time'=>$end_time,
                        'room_no'=>$room_no,
                    ]


                );
            }





        }

        flash()->success('Timetable created successfully.');
        return redirect()->back();
    }




    public function timetable_read()
    {
        $times = Timetable::all();

        return view('admin.timetable.list', compact('times'));
    }



    public function timetable_delete($id)
    {
        $data = Timetable::find($id);

        $data->delete();

        flash()->success('Timetable deleted successfully.');
        return redirect()->back();

    }



    // public function showtimetable()
    // {
    //     $class_id = Auth::guard('teacher')->user()->class_id;
    //     $timetable = TeacherTimetable::with(['day', 'subject', 'teacher'])->where('class_id', $class_id)->get();


    //     $group = [];

    //     foreach ($timetable as  $data) {
    //         $group[$data->day->name][]= [
    //             'teacher'=>$data->teacher->name,
    //             'subject'=>$data->subject->name,
    //             'start_time'=>$data->start_time,
    //             'end_time'=>$data->end_time,
    //             'room_no'=>$data->room_no,
    //         ];
    //     }


    //     $teachertimetables = $group;

    //     return view('teacher.teacher_timetable', compact('teachertimetables'));



    // }


}
