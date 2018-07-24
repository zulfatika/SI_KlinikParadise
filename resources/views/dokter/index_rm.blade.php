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

        <div class="col col-sm-6" >

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
            <div class="col-md-6">
                <!-- Form Pasien -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pasien</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <!-- /.box -->
                                <label for="inputNokartu" class="col-md-3 control-label">No. Kartu</label>
                                <div class="col-md-8">
                                    <label for="inputi" class="col-md-2 control-label">:</label>
                                    <label for="inputNokartu" class="control-label">{{$pasien->no_kartu}}</label>
                                </div>

                                <label for="inputNik" class="col-sm-3 control-label">NIK</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label for="inputNik" class="control-label">{{$pasien->nik}}</label>
                                </div>

                                <label for="inputNama" class="col-sm-3 control-label">Nama Pasien</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label for="inputNama" class="control-label">{{$pasien->nama_pasien}}</label>
                                </div>

                                <label for="inputUsia" class="col-sm-3 control-label">Usia</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <?php
                                    $date1 = new DateTime(date("Y-m-d", strtotime($pasien->tgl_lahir)));
                                    $date2 = new DateTime();
                                    $interval = $date1->diff($date2);
                                    ?>
                                    <label for="inputUsia" class="control-label">{{$interval->y}}</label>
                                </div>

                                <label for="inputKelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label class="control-label">{{$pasien->jenis_kelamin}}</label>
                                </div>

                                <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label class="control-label">{{$pasien->alamat}}</label>
                                </div>

                                <label for="inputTelp" class="col-sm-3 control-label">No. Telepon</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label class="control-label">{{$pasien->no_telp}}</label>
                                </div>

                                <label for="inputRiwayat" class="col-sm-3 control-label">Riwayat Alergi</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label class="control-label">{{$pasien->riwayat_alergi}}</label>
                                </div>

                                <label for="inputPoli" class="col-sm-3 control-label">Poli Tujuan</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
                                    <label class="control-label">{{$poli->nama_poli}}</label>
                                </div>

                                <label for="inputTglperiksa" class="col-sm-3 control-label">Tgl Periksa</label>
                                <div class="col-sm-8">
                                    <label for="inputi" class="col-sm-2 control-label">:</label>
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
            <!-- right column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Dokter</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body">
                            <form action="{{route('input-a')}}" method="post" id="jenis_kadar">@csrf
                                <input type="hidden" name="id_dokter" value="{{$pasien->id_dokter}}">
                            </form>
                            <div class="form-group">
                                <label for="inputDokter" class="col-sm-2 control-label">Dokter</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" data-placeholder="Nama Dokter"
                                            style="width: 100%;">
                                        <option value="">-- Pilih Dokter --</option>
                                        @foreach($dokter as $val)
                                            <option value="{{$val->id_dokter}}">{{$val->users->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPoli" class="col-sm-2 control-label">Poli</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{$poli->nama_poli}}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <a href="{{route('hasilrm')}}" type="submit" class="btn-lg btn-primary pull-right" style="width: 100%; text-align: center">HASIL REKAM MEDIS</a>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->

        <!-- /.col -->
        <div class="col-md-14">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#cekfisik" data-toggle="tab">Pemeriksaan Fisik</a></li>
                    <li><a href="#diagnosa" data-toggle="tab">Diagnosa</a></li>
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
                                                                        @include('dokter.form_ceklab')
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
                                                        Diagnosis
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                    <form class="form-horizontal" action="{{route('rm:insert')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id_pasien" value="{{$pasien->id_pasien}}">
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

                        <div class="box-header">
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>

                        <div class="box-body">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Jenis Obat</th>
                                        <th>Nama Obat</th>
                                        <th style="width: 10px">Satuan Obat</th>
                                        <th style="width: 100px">Jumlah Obat</th>
                                        <th>Aturan Pakai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tr>
                                        <td>Jadi</td>
                                        <td><input type="number" class="form-control" id="inputNama" placeholder="nama obat"></td>
                                        <td><input type="number" class="form-control" id="inputSatuan" placeholder="satuan obat"></td>
                                        <td><input type="number" class="form-control" id="inputJml" placeholder="jml obat"></td>
                                        <td><input type="text" class="form-control" id="inputAturan" placeholder="_x sehari"></td>
                                        <td><textarea type="text" class="form-control" id="inputKetobat" placeholder="keterangan"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Racikan1</td>
                                        <td><input type="number" class="form-control" id="inputNama" placeholder="nama obat"></td>
                                        <td><input type="number" class="form-control" id="inputSatuan" placeholder="satuan obat"></td>
                                        <td><input type="number" class="form-control" id="inputJml" placeholder="jml obat"></td>
                                        <td><input type="text" class="form-control" id="inputAturan" placeholder="_x sehari"></td>
                                        <td><textarea type="text" class="form-control" id="inputKetobat" placeholder="keterangan"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Racikan1</td>
                                        <td><input type="number" class="form-control" id="inputNama" placeholder="nama obat"></td>
                                        <td><input type="number" class="form-control" id="inputSatuan" placeholder="satuan obat"></td>
                                        <td><input type="number" class="form-control" id="inputJml" placeholder="jml obat"></td>
                                        <td><input type="text" class="form-control" id="inputAturan" placeholder="_x sehari"></td>
                                        <td><textarea type="text" class="form-control" id="inputKetobat" placeholder="keterangan"></textarea></td>
                                    </tr>

                                </table>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>
    </section>
    <!-- /.content -->
@endsection