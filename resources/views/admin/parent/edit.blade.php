@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Parent Managment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Parent Managment</li>
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
                            <h3 class="card-title">Update Parent Record</h3>
                        </div>


                        <form action="{{ route('parent.parent_update', $parent->id) }}"  method="post">
                            @csrf

                            <div class="card-body">



                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Parent Name</label>
                                        <input type="text" name="name" value="{{ $parent->name }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Parent Name">
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" value="{{ $parent->email }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Email">
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Data Of Birth</label>
                                        <input type="date" name="dob" value="{{ $parent->dob }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Data Of Birth">
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
