@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Anouncement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Anouncement</li>
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
                            <h3 class="card-title">Update Anouncement</h3>
                        </div>


                        <form action="{{ route('anouncement.anouncement_update',$anouncement->id) }}"  method="post">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <input type="text" name="message" value="{{ $anouncement->message }}" required class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Message ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Broadcast To</label>                                    
                                    <select class="form-control" name="type" required aria-label="Default select example">
                                        <option disabled selected>Select List</option>
                                        <option value="student" {{ $anouncement->type == 'student' ? 'selected' : '' }} >student</option>
                                        <option value="teacher" {{ $anouncement->type == 'teacher' ? 'selected' : '' }} >teacher</option>
                                        <option value="parent" {{ $anouncement->type == 'parent' ? 'selected' : '' }} >parent</option>
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
