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
                                <th>Hasil RM</th>
                                <th>Status Antar Obat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pasien as $pasien)
                            <tr>
                                <td>{{$pasien->no_kartu}}</td>
                                <td>{{$pasien->nama_pasien}}</td>
                                <td width="30%">
                                    <div class="col col-sm-4" style="padding-left: 0px; margin: 10px 0 10px 0">
                                        <a href="{{route('hasilrm', ['id'=>$pasien->id_pasien])}}" type="submit" class="btn btn-info " style="width: 100%; height: 100%; text-align: center">HASIL</a>
                                    </div>
                                    <div class="col col-sm-4" style="padding-left: 0px; margin: 10px 0 10px 0">
                                        <a href="{{route('grafik', ['id'=>$pasien->id_pasien])}}" type="submit" class="btn btn-warning " style="width: 100%; height: 100%; text-align: center">GRAFIK</a>
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="col col-sm-4" style="padding-left: 0px; margin: 10px 0 10px 0">
                                        <a href="{{route('hasilrm', ['id'=>$pasien->id_pasien])}}" type="submit" class="btn bg-maroon " style="width: 100%; height: 100%; text-align: center">Antar</a>
                                    </div>
                                    <div class="col col-sm-4" style="padding-left: 0px; margin: 10px 0 10px 0">
                                        <a href="{{route('grafik', ['id'=>$pasien->id_pasien])}}" type="submit" class="btn disabled btn-warning " style="width: 100%; height: 100%; text-align: center">Proses</a>
                                    </div>
                                    <div class="col col-sm-4" style="padding-left: 0px; margin: 10px 0 10px 0">
                                        <a href="{{route('grafik', ['id'=>$pasien->id_pasien])}}" type="submit" class="btn disabled btn-success " style="width: 100%; height: 100%; text-align: center">Selesai</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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