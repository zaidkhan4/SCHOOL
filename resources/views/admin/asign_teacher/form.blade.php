@extends('admin.layout')


@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Teachert</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Assign Teachert</li>
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
                            <h3 class="card-title">Add Assign Teacher</h3>
                        </div>


                        <form action="{{ route('asign_teacher.teach_store') }}"  method="post">
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
                                    <label for="exampleInputEmail1">Select Subjects</label>
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

@section('customjs')
{{-- <script>

    $('#class_id').change(function(){
        const class_id = $(this).val();
        $.ajax({
            url:"{{ route('findSubject') }}",
            type:"get",
            data:{class_id},
            dataType:'json',
            success:function(response){
                $('#subject_id').find('option').not(":first").remove();
                $.each(response['subjects'],(key,item)=>{
                    $('#subject_id').append(`
                        <option value="${item.subject_id}" >${item.subject.name}</option>
                    `)
                });

            }
        });
    });



</script> --}}






@endsection
