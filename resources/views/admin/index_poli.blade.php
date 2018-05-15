@extends('layouts.master')

@section('content')
    <h3>Data Poli</h3>

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Nama Poli</th>
            <th>Keterangan</th>
            <th>Modify</th>
        </tr>
        </thead>

        <tbody>
        @foreach($poli as $poli)
            <tr>
                <td>{{$poli->nama_poli}}</td>
                <td>{{$poli->keterangan}}</td>
                <td><button class="btn btn-info"
                            data-mynama_poli="{{$poli->nama_poli}}" data-myketerangan="{{$poli->keterangan}}"
                            data-idpoli="{{$poli->id_poli}}"
                            data-toggle="modal" data-target="#edit">Ubah</button>
                    <button class="btn btn-danger" data-idpoli ="{{$poli->id_poli}}" data-toggle="modal" data-target="#delete">Hapus</button>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Poli</h3>
                </div>
                <form action="{{route('poli.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.form_poli')
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
                    <h3 class="modal-title" id="myModalLabel">Ubah Data Poli</h3>
                </div>
                <form action="{{route('poli.update','test')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="id_poli" id="id_poli" value="">
                        @include('admin.form_poli')
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
                    <h3 class="modal-title text-center" id="myModalLabel">Hapus Data Poli</h3>
                </div>
                <form action="{{route('poli.destroy','test')}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            Apakah anda yakin ingin menghapus data ini?
                        </p>
                        <input type="hidden" name="id_poli" id="id_poli" value="">

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