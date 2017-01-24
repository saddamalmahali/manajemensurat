@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Edit Surat Masuk</center></h3>
                </div>
                <form action="{{url('/surat_masuk/simpan_update')}}" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$surat_masuk->indexsm}}">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('no_agendasm') ? ' has-error' : '' }}">
                                    <label for="no_agendasm">No Agenda</label>
                                    <input type="text" name="no_agendasm" class="form-control" value="{{$surat_masuk->no_agendasm}}" placeholder="Input No Agenda">
                                    @if ($errors->has('no_agendasm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_agendasm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('kode_jenis') ? ' has-error' : '' }}">
                                    <label for="no_agendasm">Jenis Surat</label>
                                    <select name="kode_jenis" class="form-control">
                                        <option value="" disabled selected>Pilih Jenis Surat</option>
                                        @forelse ($data_jenis as $jenis)
                                            <option value="{{$jenis->kode_jenis}}" {{$surat_masuk->kode_jenis == $jenis->kode_jenis ? 'selected' : ''}}>{{$jenis->nama_jenis}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    @if ($errors->has('kode_jenis'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kode_jenis') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{$surat_masuk->tanggal}}">
                                    @if ($errors->has('tanggal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('pengirim') ? ' has-error' : '' }}">
                                    <label for="pengirim">Pengirim</label>
                                    <input type="text" name="pengirim" class="form-control" placeholder="Nama Pengirim" value="{{$surat_masuk->pengirim}}">
                                    @if ($errors->has('pengirim'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pengirim') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tgl_sm') ? ' has-error' : '' }}">
                                    <label for="tgl_sm">Tanggal Surat Masuk</label>
                                    <input type="date" name="tgl_sm" class="form-control" value="{{$surat_masuk->tgl_sm}}">
                                    @if ($errors->has('tgl_sm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_sm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('no_sm') ? ' has-error' : '' }}">
                                    <label for="no_sm">Nomor Surat Masuk</label>
                                    <input type="text" name="no_sm" class="form-control" placeholder="###/###/####" value="{{$surat_masuk->no_sm}}">
                                    @if ($errors->has('no_sm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_sm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('perihal') ? ' has-error' : '' }}">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" class="form-control" placeholder="Perihal Surat Masuk" value="{{$surat_masuk->perihal}}">
                                    @if ($errors->has('perihal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('perihal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Perihal</label>
                                    <input type="date" name="tgl_perihal" class="form-control" placeholder="Perihal Surat Masuk" value="{{$surat_masuk->tgl_perihal}}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tempat/Waktu Perihal</label>
                                    <input type="text" name="tmptwkt_perihal" class="form-control" placeholder="Input Tempat/Waktu Perihal" value="{{$surat_masuk->tmptwkt_perihal}}">
                                </div>
                                <div class="form-group{{ $errors->has('ringkasan') ? ' has-error' : '' }}">
                                    <label for="ringkasan">Ringkasan</label>
                                    <textarea name="ringkasan" rows="4" class="form-control">{{$surat_masuk->ringkasan}}</textarea>
                                    @if ($errors->has('ringkasan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ringkasan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('pengolah') ? ' has-error' : '' }}">
                                    <label for="pengolah">Pengolah</label>
                                    <input type="text" name="pengolah" class="form-control" placeholder="Input Pengolah" value="{{$surat_masuk->tmptwkt_perihal}}">
                                    @if ($errors->has('pengolah'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pengolah') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Lampiran</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="pull-right">
                                <input type="submit" class="btn btn-primary" value="Simpan" style="margin:10px;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection