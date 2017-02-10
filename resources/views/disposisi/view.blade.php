@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Detail Surat Disposisi</center></h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No Agenda</th>
                            <td>:</td>
                            <td width="30%">{{$disposisi->surat_masuk->no_agendasm}}</td>
                            <td></td>
                            <th>Jenis Surat</th>
                            <td>:</td>
                            <td><span class="label label-primary"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat Keluar</th>
                            <td>:</td>
                            <td width="30%"></td>
                            <td></td>
                            <th>Perihal</th>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td width="30%"></td>
                            <td></td>
                            <th>Lampiran</th>
                            <td>:</td>
                            <td>
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection