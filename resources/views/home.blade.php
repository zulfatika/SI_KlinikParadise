@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Antrian</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @role('user_pegawai')

        <div class="row">
            @if($status_antrian == 0)
                <div class="col-lg-2 col-xs-6">
                    <div class="box-body" style="padding-left: 0">
                        <a href="{{ url('bukaAntrian')}}" class="btn btn-success" onclick="reloadPage()">
                            BUKA ANTRIAN
                        </a>
                    </div>
                </div>
            @else
                <div class="col-lg-2 col-xs-6">
                    <div class="box-body" style="padding-left: 0">
                        <a href="{{ url('tutupAntrian')}}" class="btn btn-danger" onclick="reloadPage()">
                            TUTUP ANTRIAN
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Poli Umum</h4>
                        <h3>0</h3>
                        <h6>Jumlah Antrian : @if(isset($polis)){{$polis->sum(1)}}@else 0 @endif</h6>
                        <h6>Sisa Antrian : 0</h6>
                    </div>

                    <div class="icon">
                        <i class="ion ion-medkit"></i>
                    </div>
                    <a href="#" class="small-box-footer">Panggil No. Antrian <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4>Poli Gigi</h4>
                        <h3>0</h3>
                        <h6>Jumlah Antrian : 0</h6>
                        <h6>Sisa Antrian : 0</h6>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-analytics"></i>
                    </div>
                    <a href="#" class="small-box-footer">Panggil No. Antrian <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h4>Poli Kecantikan</h4>
                        <h3>0</h3>
                        <h6>Jumlah Antrian : 0</h6>
                        <h6>Sisa Antrian : 0</h6>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-rose"></i>
                    </div>
                    <a href="#" class="small-box-footer">Panggil No. Antrian <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            @if($polis)
            @foreach($polis as $poli)
            <div class="col-lg-4 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Antrian {{$poli->nama_poli}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>No. Antrian</th>
                                <th>Status</th>
                            </tr>
                            @if(empty($poli->antrian))
                                <div class="panel">
                                    <div class="panel-body panel-danger">Tidak Ada Antrian</div>
                                </div>
                                @else
                                <?php $i=1;?>
                            @foreach($poli->antrian as $val)
                            <tr>
                                <td>{{$i++}}.</td>
                                <td>{{$val->urutan_antrian}}</td>
                                <td>
                                    @if($val->status_cek == 0)<span class="label label-danger">Belum Dipanggil</span>@endif
                                        @if($val->status_cek == 1)<span class="label label-warning">Sedang Dipanggil</span>@endif
                                        @if($val->status_cek == 2)<span class="label label-success">Sudah Dipanggil</span>@endif
                                </td>
                            </tr>
                                @endforeach
                            @endif
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
                </div>
                <!-- /.box -->
            </div>
            @endforeach
            @endif
        </div>


        <!-- /.modal -->
        @endrole
    </section>
    </div>
    <script>
        function reloadPage(){
            location.reload();
        }
    </script>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
@endsection
