<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url('/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">

    <link href="{{url('/css/app.css')}}" rel="stylesheet" >
    <link href="{{url('/css/font-awesome.min.css')}}" rel="stylesheet">
    <style >
            @media print{@page {size: landscape}}

            @page { size : portrait }
            @page rotated { size : landscape }
    </style>
    <script src="{{url('/plugins/jquery-ui/external/jquery/jquery.js')}}"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    
    
</head>
<body style="font-size:10px;">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12"><center><h2>DINAS PERHUBUNGAN KABUPATEN GARUT<p>Laporan Surat Keluar</p></h2></center></div>
                    </div>
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-md-4">Dari Tanggal : {{date('d-m-Y', strtotime($dari_tanggal))}}</div>
                        <div class="col-md-4">Sampai Tanggal : {{date('d-m-Y', strtotime($sampai_tanggal))}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center; width:10%;vertical-align:middle;">No Agenda</th>
                                        <th style="text-align:center; vertical-align:middle;">Tanggal</th>
                                        <th style="text-align:center; width:15%;vertical-align:middle;">Jenis<br /> Surat</th>
                                        <th style="text-align:center; vertical-align:middle;">Perihal</th>
                                        <th style="text-align:center; width:25%;vertical-align:middle;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data_sk as $sk)
                                        <tr>
                                            <td align="center">{{$sk->no_agendask}}</td>
                                            <td align="center">{{date('d-m-Y', strtotime($sk->tanggal_sk))}}</td>
                                            <td align="center">{{$sk->jenis->nama_jenis}}</td>
                                            <td align="center">{{$sk->perihal_sk}}</td>
                                            <td align="center">{{$sk->ket_sk}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" align="center">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-6 pull-right">
                            <center>{{date('D')}},{{date('d-m-Y')}} </center>
                            <center>Yang Bertanggung Jawab</center>
                            <br />
                            <br />
                            <br />
                            <br />
                            <center><b>(<u>___________________</u>)</b></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
