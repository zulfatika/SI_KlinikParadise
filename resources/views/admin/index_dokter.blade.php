@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xs-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 style="text-align: center">DATA DOKTER</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr style="background-color: #a7ffa2">
                            <th>SIP Dokter</th>
                            <th>Username</th>
                            <th>Nama Dokter</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telepon</th>
                            <th>Spesialis</th>
                            <th>Jadwal</th>
                            <th style="width: 200px">Modify</th>
                        </tr>
                        <tbody>
                        @foreach($dokter as $dok)
                            <tr>
                                <td>{{$dok->sip_dokter}}</td>
                                <td>{{$dok->users->username}}</td>
                                <td>{{$dok->users->name}}</td>
                                <td>{{$dok->alamat}}</td>
                                <td>{{$dok->jenis_kelamin}}</td>
                                <td>{{$dok->no_telp}}</td>
                                <td>{{$dok->poli->nama_poli}}</td>
                                <td>{{$dok->jadwal->shift_praktek}}/{{$dok->jadwal->hari_praktek}}/{{$dok->jadwal->jam_praktek}}</td>
                                <td><button class="btn btn-info"
                                            data-mysip_dokter="{{$dok->sip_dokter}}"
                                            data-myusername="{{$dok->username}}" data-myname="{{$dok->name}}"
                                            data-myalamat="{{$dok->alamat}}"
                                            data-myjenis_kelamin="{{$dok->jenis_kelamin}}" data-myno_telp="{{$dok->no_telp}}"
                                            data-myid_poli="{{$dok->id_poli}}" data-myid_jadwal="{{$dok->id_jadwal}}"
                                            data-dokid data-toggle="modal" data-target="#edit">Ubah</button>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Dokter</h3>
                </div>
                <form action="{{route('dokter.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.form_dokter')
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
                    <h3 class="modal-title" id="myModalLabel">Ubah Data Dokter</h3>
                </div>
                <form action="{{route('dokter.update','test')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="dokter_id" id="dok_id" value="">
                        @include('admin.form_dokter')
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