@extends('admin.layout')

@section('customcss')
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endsection

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
                        <li class="breadcrumb-item active">Fees Structure </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Fees Structure List</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Academic Year</th>
                                        <th>Class</th>
                                        <th>Fee Head</th>
                                        <th>April</th>
                                        <th>May</th>
                                        <th>June</th>
                                        <th>July</th>
                                        <th>August</th>
                                        <th>September</th>
                                        <th>Octuber</th>
                                        <th>November</th>
                                        <th>December</th>
                                        <th>January</th>
                                        <th>Febuary</th>
                                        <th>March</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($fee_structures as $value)

                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->Academic_year->name }}</td>
                                            <td>{{ $value->Class->name }}</td>
                                            <td>{{ $value->FeeHead->name }}</td>
                                            <td>{{ $value->april }}</td>
                                            <td>{{ $value->may }}</td>
                                            <td>{{ $value->june }}</td>
                                            <td>{{ $value->july }}</td>
                                            <td>{{ $value->agust }}</td>
                                            <td>{{ $value->september }}</td>
                                            <td>{{ $value->october }}</td>
                                            <td>{{ $value->november }}</td>
                                            <td>{{ $value->december }}</td>
                                            <td>{{ $value->january }}</td>
                                            <td>{{ $value->febuary }}</td>
                                            <td>{{ $value->march }}</td>

                                             <td>
                                                <a href="{{ route('fee_structure.fee_edit', $value->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                             <td>
                                                <a href="{{ route('fee_structure.feestructure_delete',$value->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection


@section('customjs')
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

    <script src="dist/js/demo.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

