@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Detail Surat Masuk</center></h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No Agenda</th>
                            <td>:</td>
                            <td width="30%">{{$surat_masuk->no_agendasm}}</td>
                            <td></td>
                            <th>Jenis Surat</th>
                            <td>:</td>
                            <td><span class="label label-primary">{{$surat_masuk->jenis->nama_jenis}}</span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td width="30%">{{date('d-m-Y', strtotime($surat_masuk->tanggal))}}</td>
                            <td></td>
                            <th>Pengirim</th>
                            <td>:</td>
                            <td>{{$surat_masuk->pengirim}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat Masuk</th>
                            <td>:</td>
                            <td width="30%">{{date('d-m-Y', strtotime($surat_masuk->tgl_sm))}}</td>
                            <td></td>
                            <th>No Surat Masuk</th>
                            <td>:</td>
                            <td>{{$surat_masuk->no_sm}}</td>
                        </tr>
                        <tr>
                            <th>Perihal</th>
                            <td>:</td>
                            <td width="30%">{{$surat_masuk->perihal}}</td>
                            <td></td>
                            <th>Tanggal Perihal</th>
                            <td>:</td>
                            <td>{{date('d-m-Y', strtotime($surat_masuk->tgl_perihal))}}</td>
                        </tr>
                        <tr>
                            <th>Tempat/Waktu Perihal</th>
                            <td>:</td>
                            <td width="30%">{{$surat_masuk->tmptwkt_perihal}}</td>
                            <td></td>
                            <th>Ringkasan</th>
                            <td>:</td>
                            <td>{{$surat_masuk->ringkasan}}</td>
                        </tr>
                        <tr>
                            <th>Pengolah</th>
                            <td>:</td>
                            <td width="30%">{{$surat_masuk->pengolah}}</td>
                            <td></td>
                            <th>Gambar</th>
                            <td>:</td>
                            <td>
                                @if($surat_masuk->gambar != '')
                                    <a href="{{url('/img').'/'.$surat_masuk->gambar}}">Download Lampiran</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection