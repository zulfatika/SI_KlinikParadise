@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 style="text-align: center">DATA JADWAL KLINIK</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr style="background-color: #a7ffa2">
                            <th>Shift Klinik</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                            <th style="width: 200px">Modify</th>
                        </tr>
                        <tbody>
                        @foreach($jadwalklinik as $jadwalklinik)
                            <tr>
                                <td>{{$jadwalklinik->shift_klinik}}</td>
                                <td>{{$jadwalklinik->jam_buka}}</td>
                                <td>{{$jadwalklinik->jam_tutup}}</td>
                                <td><button class="btn btn-info"
                                            data-myshift_klinik="{{$jadwalklinik->shift_klinik}}" data-myjam_buka="{{$jadwalklinik->jam_buka}}"
                                            data-myjam_tutup="{{$jadwalklinik->jam_tutup}}" data-idjadwalklinik ="{{$jadwalklinik->id_jadwalklinik}}"
                                            data-toggle="modal" data-target="#edit">Ubah</button>
                                    <button class="btn btn-danger" data-idjadwalklinik ="{{$jadwalklinik->id_jadwalklinik}}" data-toggle="modal" data-target="#delete">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Tambah Baru
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Jadwal Klinik</h3>
                </div>
                <form action="{{route('jadwalklinik.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.form_jadwal_klinik')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Ubah Data Jadwal Klinik</h3>
                </div>
                <form action="{{route('jadwalklinik.update','test')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="id_jadwalklinik" id="id_jadwalklinik" value="">
                        @include('admin.form_jadwal_klinik')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center" id="myModalLabel">Hapus Data Jadwal Klinik</h3>
                </div>
                <form action="{{route('jadwalklinik.destroy','test')}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Apakah anda yakin ingin menghapus data ini?
                        </p>
                        <input type="hidden" name="id_jadwalklinik" id="id_jadwalklinik" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection