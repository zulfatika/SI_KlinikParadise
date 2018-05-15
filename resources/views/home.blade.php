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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Poli Umum</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-medkit"></i>
                        </div>
                        <a href="#" class="small-box-footer">Antrian Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Poli Gigi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-analytics"></i>
                        </div>
                        <a href="#" class="small-box-footer">Antrian Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Poli Kecantikan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-rose"></i>
                        </div>
                        <a href="#" class="small-box-footer">Antrian Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            @endrole
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
@endsection
