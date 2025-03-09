@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher Managment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Teacher Managment</li>
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
                            <h3 class="card-title">Update Teacher Record</h3>
                        </div>


                        <form action="{{ route('teacher.teacher_update', $user->id) }}"  method="post">
                            @csrf

                            <div class="card-body">                              


                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Teacher Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Teacher Name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Teacher Father Name</label>
                                        <input type="text" name="father_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Teacher Father Name" value="{{ $user->father_name }}" >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Data Of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Data Of Birth" value="{{ $user->dob }}">
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <input type="number" name="mobile" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Mobile Number" value="{{ $user->mobile }}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Email Address" value="{{ $user->email }}">
                                    </div>

                                    

                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                </div>



            </div>

        </div>
    </section>

</div>

@endsection
