@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Input Rekam Medis
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
        <br>

        <div class="col col-sm-6" style="padding-left: 0px; margin: 10px 0 10px 0">
            <a href="{{route('hasilrm')}}" type="submit" class="btn btn-primary pull-left" style="width: 100%; height: 100%; text-align: center">HASIL REKAM MEDIS</a>
        </div>
        <div class="col col-sm-6" style="padding-right: 0px;">
            <form class="search-form right" style="margin: 10px 0 10px 0">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- Form Pasien -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pasien</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body row" style="margin-left: 10px">
                            <div class="form-group col-md-6">
                                <!-- /.box -->
                                <label for="inputNokartu" class="col-md-4 control-label" style="text-align: left">No. Kartu</label>
                                <div class="col-md-8">
                                    <label for="inputi" class="col-md-1 control-label" >:</label>
                                    <label for="inputNokartu" class="control-label">{{$pasien->no_kartu}}</label>
                                </div>

                                <label for="inputNik" class="col-sm-4 control-label" style="text-align: left">NIK</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label" >:</label>
                                    <label for="inputNik" class="control-label">{{$pasien->nik}}</label>
                                </div>

                                <label for="inputNama" class="col-sm-4 control-label" style="text-align: left">Nama Pasien</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label" >:</label>
                                    <label for="inputNama" class="control-label">{{$pasien->nama_pasien}}</label>
                                </div>

                                <label for="inputUsia" class="col-sm-4 control-label" style="text-align: left">Usia</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <?php 
                                        $date1 = new DateTime(date("Y-m-d", strtotime($pasien->tgl_lahir)));
                                        $date2 = new DateTime();
                                        $interval = $date1->diff($date2);
                                    ?>
                                    <label for="inputUsia" class="control-label">{{$interval->y}}</label>
                                </div>

                                <label for="inputKelamin" class="col-sm-4 control-label" style="text-align: left">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <label class="control-label">{{$pasien->jenis_kelamin}}</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <!-- /.box -->
                                <label for="inputAlamat" class="col-sm-4 control-label" style="text-align: left">Alamat</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <label class="control-label">{{$pasien->alamat}}</label>
                                </div>

                                <label for="inputTelp" class="col-sm-4 control-label" style="text-align: left">No. Telepon</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <label class="control-label">{{$pasien->no_telp}}</label>
                                </div>

                                <label for="inputRiwayat" class="col-sm-4 control-label" style="text-align: left">Riwayat Alergi</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <label class="control-label">{{$pasien->riwayat_alergi}}</label>
                                </div>

                                <label for="inputPoli" class="col-sm-4 control-label" style="text-align: left">Poli Tujuan</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <label class="control-label">{{$poli->nama_poli}}</label>
                                </div>

                                <label for="inputTglperiksa" class="col-sm-4 control-label" style="text-align: left">Tgl Periksa</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-1 control-label">:</label>
                                    <label class="control-label">{{$antrian->tgl_periksa}}</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->

        <!-- /.col -->
        <div class="col-md-14">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#cekfisik" data-toggle="tab">Pemeriksaan Fisik</a></li>
                    <li><a href="#diagnosa" data-toggle="tab">Anamnesis</a></li>
                    <li><a href="#terapi" data-toggle="tab">Terapi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="cekfisik">
                        <div class="row">
                            <div class="col-md-5">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Cek Fisik
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <form class="form-horizontal" action="{{route('cek_fisik:insert')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">
                                                        <div class="form-group">
                                                            <label for="inputTb" class="col-sm-4 control-label">Tinggi Badan</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputTb" name="tinggi_bdn" placeholder="Tinggi Badan">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">Cm</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputBb" class="col-sm-4 control-label">Berat Badan</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputBb" name="berat_bdn" placeholder="Berat Badan">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">Kg</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputTd" class="col-sm-4 control-label">Tekanan Darah</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputTd" name="tek_darah" placeholder="Tekanan Darah">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">mmHg</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputNadi" class="col-sm-4 control-label">Nadi</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputNadi" name="nadi" placeholder="Nadi">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">bpm</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputRr" class="col-sm-4 control-label">rr</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputRr" name="rr" placeholder="rr">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">x/menit</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputSuhu" class="col-sm-4 control-label">Suhu Badan</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputSuhu" name="suhu" placeholder="Suhu Badan">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">C</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputSpo" class="col-sm-4 control-label">Spo2</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control" id="inputSpo" name="spo2" placeholder="Spo2">
                                                            </div>
                                                            <label for="inputSatuan" class="control-label">mmHg</label>
                                                        </div>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-7">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Cek Lab
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-xs-10">
                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>  Tambah</button>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h3 class="modal-title" id="myModalLabel">Tambah Data Cek Lab</h3>
                                                                </div>
                                                                <form action="{{route('standarcek.store')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <div class="modal-body">
                                                                        @include('pegawai.form_ceklab')
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        <form action="{{route('input-a')}}" method="post" id="jenis_kadar">@csrf
                                                            <input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">
                                                        </form>
                                                        <table class="table table-bordered table-responsive">
                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Nama</th>
                                                                <th style="width: 10px">Standar</th>
                                                                <th style="width: 100px">Hasil</th>
                                                                <th style="width: 10px">Satuan</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                            @if(isset($jenis_pemeriksaan))
                                                                @foreach($jenis_pemeriksaan as $val)
                                                                    <input type="hidden" form="jenis_kadar" class="form-control" name="jenis[{{$val->id_jeniskadar}}][jenis]" value="{{$val->id_jeniskadar}}" id="inputHasillab" placeholder="">
                                                                    <tr>
                                                                        <td>{{$val->id_jeniskadar}}</td>
                                                                        <td>{{$val->nama_kadar}}</td>
                                                                        <td>{{$val->standart_kadar}}</td>
                                                                        <td><input type="number" form="jenis_kadar" class="form-control" name="jenis[{{$val->id_jeniskadar}}][hasil]" id="inputHasillab" placeholder=""></td>
                                                                        <td>{{$val->satuan_kadar}}</td>
                                                                        <td><textarea type="text" form="jenis_kadar" class="form-control" name="jenis[{{$val->id_jeniskadar}}][ket]" id="inputKetlab" placeholder=""></textarea></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <button type="submit" form="jenis_kadar" class="btn btn-info pull-right">Simpan</button>
                                                    </div>
                                                    <!-- /.box -->
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
                            <div class="col-md-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Anamnesis
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <form class="form-horizontal" id="diagnosa" action="{{route('rm:insert')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">
                                                        <div class="form-group">
                                                            <label for="inputDokter" class="col-sm-1 control-label">Dokter</label>
                                                            <div class="col-sm-11">
                                                                <select class="form-control" name="id_dokter"
                                                                        style="width: 100%;">
                                                                    <option value="">-- Pilih Nama Dokter --</option>
                                                                    @foreach($dokter as $val)
                                                                        <option value="{{$val->id_dokter}}">{{$val->users->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputKeluhan" class="col-sm-1 control-label">Keluhan</label>
                                                            <div class="col-sm-11">
                                                                <textarea class="form-control" name="keluhan" id="inputKeluhan" placeholder="Keluhan"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDiagnosa" class="col-sm-1 control-label">Diagnosa</label>
                                                            <div class="col-sm-11">
                                                                <textarea class="form-control" name="diagnosa" id="inputDiagnosa" placeholder="Diagnosa"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                                        </div>
                                                    </form>
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
                            <div class="col-md-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-warning">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        Resep Obat
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-xs-10">
                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalObat"><i class="fa fa-plus"></i>  Tambah</button>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalObat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h3 class="modal-title" id="myModalLabel">Tambah Data Obat</h3>
                                                                </div>
                                                                <form action="{{route('obat.store')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <div class="modal-body">
                                                                        {{--@include('pegawai.form_obat')--}}
                                                                        <div class="form-group">
                                                                            <label for="nama_obat">Nama Obat</label>
                                                                            {{--<input type="text" class="form-control" name="nama_obat" id="nama_obat">--}}
                                                                            <select class="form-control" style="width: 100%;" name="id_obat" data-placeholder="Nama Obat"
                                                                                    style="width: 100%;">
                                                                                <option selected="selected">-- Pilih Nama Obat --</option>
                                                                                @foreach($obat as $val)
                                                                                    <option value="{{$val->id_obat}}">{{ $val->nama_obat.' - '.$val->satuan_obat }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="jml_obat">Jumlah Obat</label>
                                                                            <input type="number" class="form-control" name="jml_obat" id="jml_obat">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="aturan_pakai">Aturan Pakai</label>
                                                                            <input type="text" class="form-control" name="aturan_pakai" id="aturan_pakai">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="keterangan">Keterangan</label>
                                                                            <input type="text" class="form-control" name="keterangan" id="keterangan">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--<div class="row">--}}
                                                        {{--<div class="col-xs-10">--}}
                                                            {{--<button type="button" id="add_btn" class="btn btn-success"><i class="fa fa-plus"></i>  Tambah</button>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        <form action="{{route('obat:insert')}}" method="post" id="id_obat">@csrf
                                                            {{--<input type="hidden" name="id_rm" value="{{$rm->id_rm}}">--}}
                                                        </form>
                                                        <table class="table table-bordered table-responsive">
                                                            <tr>
                                                                <th>Nama Obat</th>
                                                                <th>Satuan Obat</th>
                                                                <th style="width: 100px">Jumlah Obat</th>
                                                                <th>Aturan Pakai</th>
                                                                <th>Keterangan</th>
                                                            </tr>
                                                            @if(isset($viewobat))
                                                                @foreach($viewobat as $val)
                                                                    <input type="hidden" form="obat" class="form-control" name="obat[{{$val->id_obat}}][obat]" value="{{$val->id_obat}}" id="inputObat" placeholder="">
                                                                    <tr>
                                                                        <td>{{$val->nama_obat}}</td>
                                                                        <td>{{$val->satuan_obat}}</td>
                                                                        <td>{{$val->jml_obat}}</td>
                                                                        <td>{{$val->aturan_pakai}}</td>
                                                                        <td>{{$val->keterangan}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                        {{--<form action="{{route('obat:insert')}}" method="post" id="id_obat">@csrf--}}

                                                        {{--</form>--}}
                                                        {{--<table class="table table-bordered" id="table_terapi">--}}
                                                            {{--<tr>--}}
                                                                {{--<!--<th>Jenis Obat</th>-->--}}
                                                                {{--<th>Nama Obat</th>--}}
                                                                {{--<th style="width: 100px">Jumlah Obat</th>--}}
                                                                {{--<th>Aturan Pakai</th>--}}
                                                                {{--<th>Keterangan</th>--}}
                                                                {{--<!--<th style="width: 50px">Action</th>-->--}}
                                                            {{--</tr>--}}
                                                            {{--<tr>--}}

                                                                {{--@if(isset($obat))--}}
                                                                    {{--@foreach($obat as $val)--}}
                                                                        {{--<input type="hidden" form="id_obat" class="form-control" name="obat[{{$val->id_obat}}][obat]" value="{{$val->id_obat}}" id="inputResepobat" placeholder="">--}}
                                                            {{--<tr>--}}
                                                                {{--<td>--}}
                                                                    {{--<select class="form-control" style="width: 100%;" name="id_obat[]" data-placeholder="Nama Obat"--}}
                                                                            {{--style="width: 100%;">--}}
                                                                        {{--<option selected="selected">-- Pilih Nama Obat --</option>--}}
                                                                        {{--@foreach($obat as $val)--}}
                                                                            {{--<option value="{{$val->id_obat}}">{{ $val->nama_obat.' - '.$val->satuan_obat }}</option>--}}
                                                                        {{--@endforeach--}}
                                                                    {{--</select>--}}
                                                                {{--</td>--}}
                                                                {{--<td><input type="number" form="id_obat" class="form-control" name="obat[{{$val->id_obat}}][jml]" id="inputJml" placeholder="Jml Obat"></td>--}}
                                                                {{--<td><input type="text" form="id_obat" class="form-control" name="obat[{{$val->id_obat}}][aturan]" id="inputAturan" placeholder="Aturan Pakai"></td>--}}
                                                                {{--<td><textarea type="text" form="id_obat" class="form-control" name="obat[{{$val->id_obat}}][ket]" id="inputKetobat" placeholder="Keterangan"></textarea></td>--}}
                                                            {{--</tr>--}}
                                                            {{--@endforeach--}}
                                                            {{--@endif--}}
                                                                {{--<!--<td><input type="text" class="form-control" id="inputJenis" placeholder="Obat Jadi/Racikan" name="jenis[]"></td>-->--}}
                                                                {{--<!--<td><button class="btn btn-danger" name="remove[]">Remove</button></td>-->--}}
                                                            {{--</tr>--}}
                                                        {{--</table>--}}
                                                    </div>
                                                    <!-- /.box-body -->
                                                    {{--<div class="box-footer">--}}
                                                        {{--<button type="submit" form="jenis_kadar" class="btn btn-info pull-right">Simpan</button>--}}
                                                    {{--</div>--}}
                                                    <!-- /.box -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->


    </section>
    <!-- /.content -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endsection