@extends('layouts.master')

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Pendaftaran Pasien</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputNokartu" class="col-sm-2 control-label" style="text-align: left">No. Kartu</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputNokartu" name="no_kartu" placeholder="No. Kartu">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label" style="text-align: left">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNama" name="nama_pasien" placeholder="Nama Pasien">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTgl" class="col-sm-2 control-label" style="text-align: left">Tanggal Pemeriksaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTgl" name="tgl_periksa" placeholder="Tanggal Pemeriksaan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputJadwal" class="col-sm-2 control-label" style="text-align: left">Jadwal Periksa</label>
                    <div class="col-sm-10">
                        <select class="form-control" data-placeholder="Jadwal Periksa"
                                style="width: 100%;">
                            <option value="">-- Pilih Jadwal Periksa --</option>
                            <option value="">Siang (09.00-14.00)</option>
                            <option value="">Malam (19.00-22.00)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPoli" class="col-sm-2 control-label" style="text-align: left">Poli Tujuan</label>
                    <div class="col-sm-10">
                        <select class="form-control" data-placeholder="Nama Poli"
                                style="width: 100%;">
                            <option value="">-- Pilih Poli --</option>
                            <option value="">Poli Umum</option>
                            <option value="">Poli Gigi</option>
                            <option value="">Poli Kecantikan</option>
                        </select>
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
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endsection