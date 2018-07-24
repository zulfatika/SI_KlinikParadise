@extends('layouts.master')

@section('content')
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            HASIL REKAM MEDIS
            <small>Pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="active tab-pane" id="hasilrm">
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <!-- title row -->

                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            <i class="fa fa-file-text-o"></i> Data Pasien
                                        </h2>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        No. Kartu : 1234<br>
                                            <strong>NIK : 12345</strong><br>
                                            Nama : Zulfa<br>
                                            Usia : 12<br>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6 invoice-col">
                                        Dokter Periksa : zulfa<br>
                                            <strong>Poli : Umum</strong><br>
                                            Riwayat Alergi : -<br>
                                    </div>
                                </div><br>
                                <!-- /.row -->
                                <div class="panel box box-warning">
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                <tr style="background-color: #a7ffa2;">
                                                    <th>Tgl Periksa</th>
                                                    <th>Cek Fisik</th>
                                                    <th>Cek Lab</th>
                                                    <th>Keluhan</th>
                                                    <th>Diagnosa</th>
                                                    <th>Terapi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {{--@foreach($hasilrm as $hasilrm)--}}
                                                    {{--<tr>--}}
                                                        {{--<td>{{$hasilrm->shift_praktek}}</td>--}}
                                                        {{--<td>{{$hasilrm->hari_praktek}}</td>--}}
                                                        {{--<td>{{$hasilrm->jam_praktek}}</td>--}}
                                                        {{--<td><button class="btn btn-info"--}}
                                                                    {{--data-myshift_praktek="{{$jadwal->shift_praktek}}" data-myhari_praktek="{{$jadwal->hari_praktek}}"--}}
                                                                    {{--data-myjam_praktek="{{$jadwal->jam_praktek}}" data-idjadwal ="{{$jadwal->id_jadwal}}"--}}
                                                                    {{--data-toggle="modal" data-target="#edit">Ubah</button>--}}
                                                            {{--<button class="btn btn-danger" data-idjadwal ="{{$jadwal->id_jadwal}}" data-toggle="modal" data-target="#delete">Hapus</button>--}}
                                                        {{--</td>--}}
                                                    {{--</tr>--}}
                                                {{--@endforeach--}}
                                                <tr>

                                                    <td>23-07-2018</td>
                                                    <td>Tinggi Badan : 150 cm<br>Berat Badan : 45 kg<br>Tek. darah : 120 mmHg<br>Nadi : 65 bpm<br>
                                                    rr : 34 x/menit<br>Suhu : 38 C<br>Spo2 : 45 mmHg</td>
                                                    <td>Haemoglobin : 210 hg</td>
                                                    <td>Meriang, Panas, Batuk, Pilek</td>
                                                    <td>Demam</td>
                                                    <td>Obat jadi<br>Amoxicillin<br>10 tablet<br>3 x sehari 1 tab<br>Obat satuan</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
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