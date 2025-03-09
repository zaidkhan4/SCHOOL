<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Day;
use App\Models\Subject;
use App\Models\TeacherTimetable;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherTimetableController extends Controller
{
    public function create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        $teachers = User::where('role', 'teacher')->orderBy('id', 'desc')->get();

        $days = Day::all();


        return view('admin.teacher-timetable.create', compact('classes', 'teachers', 'subjects','days'));

    }


    public function store(Request $request)
    {

        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        $teacher_id = $request->teacher_id;
         foreach ($request->timetable as $timetable) {

            $day_id = $timetable['day_id'];
            $start_time = $timetable['start_time'];
            $end_time = $timetable['end_time'];
            $room_no = $timetable['room_no'];

            if($start_time != null)
            {
                TeacherTimetable::updateOrCreate(

                    [
                        'class_id'=>$class_id,
                        'subject_id'=>$subject_id,
                        'teacher_id'=>$teacher_id,
                        'day_id'=>$day_id,
                    ],
                    [
                        'class_id'=>$class_id,
                        'subject_id'=>$subject_id,
                        'teacher_id'=>$teacher_id,
                        'day_id'=>$day_id,
                        'start_time'=>$start_time,
                        'end_time'=>$end_time,
                        'room_no'=>$room_no,
                    ]


                );
            }





        }

        flash()->success('Teacher Timetable created successfully.');
        return redirect()->back();
    }


    public function read()
    {

        $teacherstimetables = TeacherTimetable::all();

        return view('admin.teacher-timetable.list', compact('teacherstimetables'));

    }

    public function delete($id)
    {
        $data = TeacherTimetable::find($id);

        $data->delete();

        flash()->success('Teacher Timetable deleted successfully.');
        return redirect()->back();

    }


}
