@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xs-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 style="text-align: center">DATA PEGAWAI</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr style="background-color: #a7ffa2">
                            <th>Username</th>
                            <th>Nama Pegawai</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telepon</th>
                            <th style="width: 200px">Modify</th>
                        </tr>
                        <tbody>
                        @foreach($pegawai as $pegawai)
                            <tr>
                                <td>{{$pegawai->users->username}}</td>
                                <td>{{$pegawai->users->name}}</td>
                                <td>{{$pegawai->alamat}}</td>
                                <td>{{$pegawai->jenis_kelamin}}</td>
                                <td>{{$pegawai->no_telp}}</td>
                                <td><button class="btn btn-info"
                                            data-myusername="{{$pegawai->username}}" data-myname="{{$pegawai->name}}"
                                            data-myalamat="{{$pegawai->alamat}}"
                                            data-myjenis_kelamin="{{$pegawai->jenis_kelamin}}" data-myno_telp="{{$pegawai->no_telp}}"
                                            data-idpegawai data-toggle="modal" data-target="#edit">Ubah</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete">Hapus</button>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Pegawai</h3>
                </div>
                <form action="{{route('pegawai.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.form_pegawai')
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
                    <h3 class="modal-title" id="myModalLabel">Ubah Data Pegawai</h3>
                </div>
                <form action="{{route('pegawai.update','test')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="id_pegawai" id="id_pegawai" value="">
                        @include('admin.form_pegawai')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection