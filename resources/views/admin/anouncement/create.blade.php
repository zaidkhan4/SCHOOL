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
                            <h3 class="card-title">Add Anouncement</h3>
                        </div>


                        <form action="{{ route('anouncement.anouncement_store') }}"  method="post">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <input type="text" name="message" required class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Message ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Broadcast To</label>                                    
                                    <select class="form-control" name="type" required aria-label="Default select example">
                                        <option selected>Open this select type</option>
                                        <option value="student">student</option>
                                        <option value="teacher">teacher</option>
                                        <option value="parent">parent</option>
                                    </select>

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
