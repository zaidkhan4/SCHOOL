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
                            <h3 class="card-title">Add Assign Subject</h3>
                        </div>


                        <form action="{{ route('asign_subject.asign_store') }}"  method="post">
                            @csrf

                            <div class="card-body">
                                
                                    <select name="class_id" class="form-control" >
                                        <option disabled selected>Select Class</option>
                                        @foreach ($classes as $val)
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                            
                                    </select>                                

                            </div>

                            @foreach ($subjects as $subject)

                                <div class="form-check">
                                    <input type="checkbox" value="{{ $subject->id }}" name="subject_id[]" id="subject-{{ $subject->id }}">
                                    <label for="subject-{{ $subject->id }}" >{{ $subject->name }}</label>
                                </div>

                            @endforeach

                            
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
