@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Selamat Datang di Sistem Manajemen Surat</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>SURAT MASUK</center></h3>
                                </div>
                                <div class="panel-body">
                                        <a href="{{url('/surat_masuk/index')}}"><h2>
                                            {{$data['jml_masuk']}}
                                            <p><small>Total Surat Masuk</small></p>                                        
                                        </h2></a>
                                    
                                </div>                                
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>SURAT KELUAR</center></h3>
                                </div>
                                <div class="panel-body">
                                        <a href="{{url('/surat_keluar/index')}}"><h2>
                                            {{$data['jml_keluar']}}
                                            <p><small>Total Surat Keluar</small></p>                                        
                                        </h2></a>
                                    
                                </div>                                
                            </div>    
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>DISPOSISI </center></h3>
                                </div>
                                <div class="panel-body">
                                       <a href="{{url('/disposisi/index')}}"> <h2>
                                             {{$data['jml_disposisi']}}
                                            <p><small>Total Disposisi</small></p>                                        
                                        </h2></a>
                                    
                                </div>                                
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
