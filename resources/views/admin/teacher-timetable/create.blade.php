@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher Timetable</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Teacher Timetable</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Teacher Timetable</h3>
                        </div>


                        <form action="{{ route('teacher-timetable.store') }}"  method="post">
                            @csrf

                            <div class="card-body">

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Select Class</label>
                                    <select name="class_id" id="class_id" class="form-control">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Select Subject</label>
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        <option value="">Select Subject</option>
                                        @foreach ($subjects as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Select Teacher</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Time</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    @php
                                        $i=1;
                                    @endphp

                                        @foreach ($days as $day)

                                            <tr>
                                                <td>{{ $day->name }}</td>
                                                <input type="hidden" name="timetable[{{ $i }}][day_id]" value="{{ $day->id }}">
                                                <td><input type="time" name="timetable[{{ $i }}][start_time]" ></td>
                                                <td><input type="time" name="timetable[{{ $i }}][end_time]" ></td>
                                                <td><input type="number" name="timetable[{{ $i }}][room_no]" placeholder="Room Number" ></td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp

                                        @endforeach

                                    </tbody>


                                </table>



                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>



            </div>

        </div>
    </section>

</div>

@endsection

