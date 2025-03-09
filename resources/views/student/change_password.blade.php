@extends('student.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                            <h3 class="card-title">Change Password</h3>
                        </div>


                        <form action="{{ route('student.update_password') }}"  method="post">
                            @csrf                            

                                <div class="card-body">

                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Old Password</label>
                                            <input type="password" name="old_password" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Old Password">
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" name="new_password" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter New Password">
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Confirm Password">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>

                                    </div>
                                        
                                </div>

                            

                            

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>

                </div>



            </div>

        </div>
    </section>

</div>

@endsection
