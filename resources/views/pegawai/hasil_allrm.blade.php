@extends('layouts.master')

@section('content')
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hasil Rekam Medis
            <small>Semua pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    {{--<div class="col col-sm-12">--}}
                        {{--<form class="search-form right" style="margin: 10px 0 10px 0">--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" name="search" class="form-control" placeholder="Search">--}}

                                {{--<div class="input-group-btn">--}}
                                    {{--<button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- /.input-group -->--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr style="background-color: #a7ffa2;">
                                <th>No. Kartu</th>
                                <th>Nama Pasien</th>
                                <th>Poli</th>
                                <th>Tgl Periksa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1234</td>
                                <td>Zulfa</td>
                                <td>Umum</td>
                                <td>23-07-2018</td>
                            </tr>
                            <tr>
                                <td>1234</td>
                                <td>Zulfa</td>
                                <td>Umum</td>
                                <td>23-07-2018</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- SlimScroll -->
    <script src="{{asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection