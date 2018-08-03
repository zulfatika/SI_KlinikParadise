@extends('layouts.master')

<style>
    #container {
        min-width: 400px;
        max-width: 900px;
        height: 500px;
        margin: 0 auto
    }
</style>

@section('content')

    <section class="content">
        <div id="container"></div>
        <?php

            if (!empty($data)){
                foreach ($data as $val){

                }
            }
        ?>

    </section>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script>
        Highcharts.chart('container', {
            title: {
                text: 'GRAFIK CEK FISIK PADA PASIEN PER BULAN'
            },

            subtitle: {
                text: 'Klinik Paradise'
            },
            xAxis: {
                title: {
                    text: 'Tanggal Pemeriksaan'
                },
                categories: <?= $tanggal ?>
            },
            yAxis: {
                title: {
                    text: 'Value'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                }
            },

            series: [{
                name: 'Tinggi Badan (cm)',
                data: [
                    @foreach($tinggi_badan as $val)
                        {{ $val[1] }},
                    @endforeach
                ]
            }, {
                name: 'Berat Badan (kg)',
                data: [
                    @foreach($berat_badan as $val)
                        {{ $val[1] }},
                    @endforeach
                ]
            }, {
                name: 'Tekanan Darah (mmHg)',
                data: [
                    @foreach($tekanan_darah as $val)
                        {{ $val[1] }},
                    @endforeach
                ]
            }, {
                name: 'Nadi (x/menit)',
                data: [
                    @foreach($nadi as $val)
                        {{ $val[1] }},
                    @endforeach
                ]
            }, {
                name: 'rr (x/menit)',
                data: [
                    @foreach($rr as $val)
                    {{ $val[1] }},
                    @endforeach
                ]
            }, {
                name: 'Suhu Badan (°C)',
                data: [
                    @foreach($suhu_badan as $val)
                    {{ $val[1] }},
                    @endforeach
                ]
            }, {
                name: 'Spo2 (mmHg)',
                data: [
                    @foreach($spo2 as $val)
                    {{ $val[1] }},
                    @endforeach
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>

    {{--<script type="application/javascript">--}}
        {{--Highcharts.chart('container', {--}}
            {{--chart: {--}}
                {{--type: 'line'--}}
            {{--},--}}

            {{--title: {--}}
                {{--text: 'GRAFIK CEK FISIK PADA PASIEN PER BULAN'--}}
            {{--},--}}

            {{--// subtitle: {--}}
            {{--//     text: 'Source: thesolarfoundation.com'--}}
            {{--// },--}}

            {{--xAxis: {--}}
                {{--type: 'datetime',--}}
                {{--dateTimeLabelFormats: { // don't display the dummy year--}}
                    {{--month: '%e. %b',--}}
                    {{--year: '%b'--}}
                {{--},--}}
                {{--title: {--}}
                    {{--text: 'Date'--}}
                {{--}--}}
            {{--},--}}
            {{--yAxis: {--}}
                {{--title: {--}}
                    {{--// text: 'Snow depth (m)'--}}
                {{--},--}}
                {{--min: 0--}}
            {{--},--}}
            {{--legend: {--}}
                {{--layout: 'vertical',--}}
                {{--align: 'right',--}}
                {{--verticalAlign: 'middle'--}}
            {{--},--}}

            {{--// plotOptions: {--}}
            {{--//     series: {--}}
            {{--//         label: {--}}
            {{--//             connectorAllowed: false--}}
            {{--//         },--}}
            {{--//         pointStart: 2010--}}
            {{--//     }--}}
            {{--// },--}}

            {{--series: [{--}}
                {{--name: 'Tinggi Badan (cm)',--}}
                {{--data: [--}}
                    {{--@foreach($tinggi_badan as $val)--}}
                        {{--[{{$val[0]}},{{ $val[1] }}],--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--}, {--}}
                {{--name: 'Berat Badan (kg)',--}}
                {{--data: [--}}
                    {{--@foreach($berat_badan as $val)--}}
                        {{--[{{$val[0]}},{{$val[1]}}],--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--}, {--}}
                {{--name: 'Tekanan Darah (mmHg)',--}}
                {{--data: [--}}
                    {{--@foreach($tekanan_darah as $val)--}}
                        {{--[{{$val[0]}},{{$val[1]}}],--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--}, {--}}
                {{--name: 'Nadi (x/menit)',--}}
                {{--data: [--}}
                    {{--@foreach($nadi as $val)--}}
                        {{--[{{$val[0]}},{{$val[1]}}],--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--}, {--}}
                {{--name: 'rr (x/menit)',--}}
                {{--data: [--}}
                    {{--@foreach($rr as $val)--}}
                        {{--[{{$val[0]}},{{$val[1]}}],--}}
                    {{--@endforeach--}}

                {{--]--}}
            {{--}, {--}}
                {{--name: 'Suhu Badan (C)',--}}
                {{--data: [--}}
                    {{--@foreach($suhu_badan as $val)--}}
                        {{--[{{$val[0]}},{{$val[1]}}],--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--}, {--}}
                {{--name: 'Spo2 (mmHg)',--}}
                {{--data: [--}}
                    {{--@foreach($spo2 as $val)--}}
                        {{--[{{$val[0]}},{{$val[1]}}],--}}
                    {{--@endforeach--}}
                {{--]--}}
            {{--}],--}}

            {{--responsive: {--}}
                {{--rules: [{--}}
                    {{--condition: {--}}
                        {{--maxWidth: 500--}}
                    {{--},--}}
                    {{--chartOptions: {--}}
                        {{--legend: {--}}
                            {{--layout: 'horizontal',--}}
                            {{--align: 'center',--}}
                            {{--verticalAlign: 'bottom'--}}
                        {{--}--}}
                    {{--}--}}
                {{--}]--}}
            {{--}--}}

        {{--});--}}
    {{--</script>--}}

@endsection
