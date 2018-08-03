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
            <small>Per Pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
        <br>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.col -->
        <div class="col-md-14">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#cekfisik" data-toggle="tab">Cek Fisik</a></li>
                    <li><a href="#ceklab" data-toggle="tab">Cek Lab</a></li>
                    <li><a href="#diagnosa" data-toggle="tab">Anamnesis</a></li>
                    <li><a href="#terapi" data-toggle="tab">Terapi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="cekfisik">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        {{--<form action="{{route('input-a')}}" method="post" id="jenis_kadar">@csrf--}}
                                                            {{--<input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">--}}
                                                        {{--</form>--}}
                                                        <table id="example1" class="table table-bordered table-responsive table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Tinggi Badan</th>
                                                                <th>Berat Badan</th>
                                                                <th>Tekanan Darah</th>
                                                                <th>Nadi</th>
                                                                <th>rr</th>
                                                                <th>Suhu Badan</th>
                                                                <th>Spo2</th>
                                                            </tr>
                                                            </thead>

                                                            @if(isset($hasilfisik))
                                                                @foreach($hasilfisik as $val)
                                                                    <tr>
                                                                        <td>{{date('d-m-Y',strtotime($val->tgl))}}</td>
                                                                        <td>{{$val->tinggi_bdn}}</td>
                                                                        <td>{{$val->berat_bdn}}</td>
                                                                        <td>{{$val->tek_darah}}</td>
                                                                        <td>{{$val->nadi}}</td>
                                                                        <td>{{$val->rr}}</td>
                                                                        <td>{{$val->suhu}}</td>
                                                                        <td>{{$val->spo2}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="ceklab">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        {{--<form action="{{route('input-a')}}" method="post" id="jenis_kadar">@csrf--}}
                                                        {{--<input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">--}}
                                                        {{--</form>--}}
                                                        <table id="example2" class="table table-bordered table-responsive table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Nama</th>
                                                                <th>Standar</th>
                                                                <th>Hasil</th>
                                                                <th>Satuan</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                            </thead>
                                                            @if(isset($hasillab))
                                                                @foreach($hasillab as $lab)
                                                                    <tr>
                                                                        <td>{{date('d-m-Y',strtotime($lab->tgl))}}</td>
                                                                        {{--                                                                        @foreach($terapitgl as $terapi)--}}
                                                                        <td>{{$lab->nama_kadar}}</td>
                                                                        <td>{{$lab->standart_kadar}}</td>
                                                                        <td>{{$lab->hasil_kadar}}</td>
                                                                        <td>{{$lab->satuan_kadar}}</td>
                                                                        <td>{{$lab->keterangan}}</td>
                                                                        {{--@endforeach--}}
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="diagnosa">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        {{--<form action="{{route('input-a')}}" method="post" id="jenis_kadar">@csrf--}}
                                                        {{--<input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">--}}
                                                        {{--</form>--}}
                                                        <table id="example3" class="table table-bordered table-responsive table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Tanggal Periksa</th>
                                                                <th>Keluhan</th>
                                                                <th>Diagnosa</th>
                                                            </tr>
                                                            </thead>
                                                            @if(isset($hasilrm))
                                                                @foreach($hasilrm as $rm)
                                                                <tr>
                                                                    <td>{{date('d-m-Y',strtotime($rm->tgl))}}</td>
                                                                    <td>{{$rm->keluhan}}</td>
                                                                    <td>{{$rm->diagnosa}}</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="terapi">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        {{--<form action="{{route('input-a')}}" method="post" id="jenis_kadar">@csrf--}}
                                                        {{--<input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">--}}
                                                        {{--</form>--}}
                                                        <table id="example4" class="table table-bordered table-responsive table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Tgl Periksa</th>
                                                                <th>Nama Obat</th>
                                                                <th>Satuan Obat</th>
                                                                <th>Jumlah Obat</th>
                                                                <th>Aturan Pakai</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                            </thead>
                                                            @if(isset($hasilterapi))
                                                                @foreach($hasilterapi as $terapi)
                                                                <tr>
                                                                    <td>{{date('d-m-Y',strtotime($terapi->time->date))}}</td>
                                                                    <td>{{$terapi->obat->nama_obat}}</td>
                                                                    <td>{{$terapi->obat->satuan_obat}}</td>
                                                                    <td>{{$terapi->jml_obat}}</td>
                                                                    <td>{{$terapi->aturan_pakai}}</td>
                                                                    <td>{{$terapi->keterangan}}</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </section>
    <!-- SlimScroll -->
    <script src="{{asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('#example1').DataTable()
            $('#example2').DataTable()
            $('#example3').DataTable()
            $('#example4').DataTable()
        });
    </script>
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('#example1').DataTable()--}}
            {{--$('#example2').DataTable({--}}
                {{--'paging'      : true,--}}
                {{--'lengthChange': false,--}}
                {{--'searching'   : false,--}}
                {{--'ordering'    : true,--}}
                {{--'info'        : true,--}}
                {{--'autoWidth'   : false--}}
            {{--})--}}
        {{--})--}}
    {{--</script>--}}
    <!-- /.content -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endsection