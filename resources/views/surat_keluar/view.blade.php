@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Detail Surat Keluar</center></h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No Agenda</th>
                            <td>:</td>
                            <td width="30%">{{$surat_keluar->no_agendask}}</td>
                            <td></td>
                            <th>Jenis Surat</th>
                            <td>:</td>
                            <td><span class="label label-primary">{{$surat_keluar->jenis->nama_jenis}}</span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat Keluar</th>
                            <td>:</td>
                            <td width="30%">{{date('d-m-Y', strtotime($surat_keluar->tanggal_sk))}}</td>
                            <td></td>
                            <th>Perihal</th>
                            <td>:</td>
                            <td>{{$surat_keluar->perihal_sk}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td width="30%">{{$surat_keluar->ket_sk}}</td>
                            <td></td>
                            <th>Lampiran</th>
                            <td>:</td>
                            <td>
                                @if($surat_keluar->gambar != '')
                                    <a href="{{url('/img').'/'.$surat_keluar->gambar}}">Download Lampiran</a>
                                @endif
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection