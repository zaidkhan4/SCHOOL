@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Subject</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Assign Subject</li>
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
                            <h3 class="card-title">Update Assign Subject</h3>
                        </div>


                        <form action="{{ route('asign_subject.asign_update',$asingn->id) }}"  method="post">
                            @csrf

                            <div class="card-body">
                                                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Class ID</label>
                                    <select name="class_id" required class="form-control" >
                                        <option disabled selected>Select Class</option>
                                        @foreach ($classes as $val)
                                            <option value="{{ $val->id }}" {{ $asingn->class_id == $val->id ? 'selected' : ''  }} >{{ $val->name }}</option>
                                        @endforeach
                                            
                                    </select> 
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject ID</label>
                                    <select name="subject_id" required class="form-control" >
                                        <option disabled selected>Select Subject</option>
                                        @foreach ($subjects as $val)
                                            <option value="{{ $val->id }}" {{ $asingn->subject_id == $val->id ? 'selected' : ''  }} >{{ $val->name }}</option>
                                        @endforeach
                                            
                                    </select> 
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
