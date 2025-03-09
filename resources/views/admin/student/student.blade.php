@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Managment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Student Managment</li>
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
                            <h3 class="card-title">Add Student Record</h3>
                        </div>


                        <form action="{{ route('student.student_store') }}"  method="post">
                            @csrf

                            <div class="card-body">


                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Select Academic Year</label>
                                        <select name="academic_year" class="form-control">
                                            <option value="">Select Academic Year Fees</option>
                                            @foreach ($academes as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Select Class</label>
                                        <select name="class" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Admission Date</label>
                                        <input type="date" name="admission" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter date of birth">
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Student Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Student Name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Father Name</label>
                                        <input type="text" name="father_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Father Name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Data Of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Data Of Birth">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <input type="number" name="mobile" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Mobile Number">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Email Address">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Create Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Create Password">
                                    </div>

                                </div>

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
