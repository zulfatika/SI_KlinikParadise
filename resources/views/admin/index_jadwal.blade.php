@extends('layouts.master')

@section('content')
    <h3>Data Jadwal</h3>

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Shift Praktek</th>
            <th>Hari Praktek</th>
            <th>Jam Praktek</th>
            <th>Modify</th>
        </tr>
        </thead>

        <tbody>
        @foreach($jadwal as $jadwal)
            <tr>
                <td>{{$jadwal->shift_praktek}}</td>
                <td>{{$jadwal->hari_praktek}}</td>
                <td>{{$jadwal->jam_praktek}}</td>
                <td><button class="btn btn-info"
                            data-myshift_praktek="{{$jadwal->shift_praktek}}" data-myhari_praktek="{{$jadwal->hari_praktek}}"
                            data-myjam_praktek="{{$jadwal->jam_praktek}}" data-idjadwal ="{{$jadwal->id_jadwal}}"
                            data-toggle="modal" data-target="#edit">Ubah</button>
                    <button class="btn btn-danger" data-idjadwal ="{{$jadwal->id_jadwal}}" data-toggle="modal" data-target="#delete">Hapus</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Jadwal</h3>
                </div>
                <form action="{{route('jadwal.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.form_jadwal')
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
                    <h3 class="modal-title" id="myModalLabel">Ubah Data Jadwal</h3>
                </div>
                <form action="{{route('jadwal.update','test')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="id_jadwal" id="id_jadwal" value="">
                        @include('admin.form_jadwal')
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
                    <h3 class="modal-title text-center" id="myModalLabel">Hapus Data Jadwal</h3>
                </div>
                <form action="{{route('jadwal.destroy','test')}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Apakah anda yakin ingin menghapus data ini?
                        </p>
                        <input type="hidden" name="id_jadwal" id="id_jadwal" value="">

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