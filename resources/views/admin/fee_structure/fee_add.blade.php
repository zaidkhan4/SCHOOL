@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fees Structure</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Fees Structure</li>
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
                            <h3 class="card-title">Add Fees Structure</h3>
                        </div>


                        <form action="{{ route('fee_structure.feestructure_store') }}"  method="post">
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
                                        <label for="exampleInputEmail1">Select Fees Head</label>
                                        <select name="fee_head" class="form-control">
                                            <option value="">Select Fees Head</option>
                                            @foreach ($fee_heads as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Apri Fees</label>
                                        <input type="text" name="april" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Apri Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">May Fees</label>
                                        <input type="text" name="may" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter May Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">June Fees</label>
                                        <input type="text" name="june" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter June Fees">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">July Fees</label>
                                        <input type="text" name="july" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter July Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">August Fees</label>
                                        <input type="text" name="august" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter August Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">September Fees</label>
                                        <input type="text" name="september" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter September Fees">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">Octuber Fees</label>
                                        <input type="text" name="octuber" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Octuber Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">November Fees</label>
                                        <input type="text" name="november" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter November Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">December Fees</label>
                                        <input type="text" name="december" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter December Fees">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4 ">
                                        <label for="exampleInputEmail1">January Fees</label>
                                        <input type="text" name="january" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter January Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Febuary Fees</label>
                                        <input type="text" name="febuary" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Febuary Fees">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">March Fees</label>
                                        <input type="text" name="march" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter March Fees">
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
