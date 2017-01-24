@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Tambah Surat Masuk</center></h3>
                </div>
                <form action="{{url('/surat_masuk/simpan')}}" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('no_agendasm') ? ' has-error' : '' }}">
                                    <label for="no_agendasm">No Agenda</label>
                                    <input type="text" name="no_agendasm" class="form-control" placeholder="Input No Agenda">
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
                                            <option value="{{$jenis->kode_jenis}}">{{$jenis->nama_jenis}}</option>
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
                                    <input type="text" name="tanggal" id="sm_tanggal" class="form-control" placeholder="Tanggal">
                                    @if ($errors->has('tanggal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('pengirim') ? ' has-error' : '' }}">
                                    <label for="pengirim">Pengirim</label>
                                    <input type="text" name="pengirim" class="form-control" placeholder="Nama Pengirim">
                                    @if ($errors->has('pengirim'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pengirim') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tgl_sm') ? ' has-error' : '' }}">
                                    <label for="tgl_sm">Tanggal Surat Masuk</label>
                                    <input type="text" id="sm_tgl_sm" name="tgl_sm" class="form-control" placeholder="Tanggal Surat Masuk">
                                    @if ($errors->has('tgl_sm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_sm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('no_sm') ? ' has-error' : '' }}">
                                    <label for="no_sm">Nomor Surat Masuk</label>
                                    <input type="text" name="no_sm" class="form-control" placeholder="###/###/####">
                                    @if ($errors->has('no_sm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_sm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('perihal') ? ' has-error' : '' }}">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" class="form-control" placeholder="Perihal Surat Masuk">
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
                                    <input type="text" id="sm_tgl_perihal" name="tgl_perihal" class="form-control" placeholder="Tanggal Perihal Surat Masuk" >
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tempat/Waktu Perihal</label>
                                    <input type="text" name="tmptwkt_perihal" class="form-control" placeholder="Input Tempat/Waktu Perihal">
                                </div>
                                <div class="form-group{{ $errors->has('ringkasan') ? ' has-error' : '' }}">
                                    <label for="ringkasan">Ringkasan</label>
                                    <textarea name="ringkasan" rows="4" class="form-control"></textarea>
                                    @if ($errors->has('ringkasan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ringkasan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('pengolah') ? ' has-error' : '' }}">
                                    <label for="pengolah">Pengolah</label>
                                    <input type="text" name="pengolah" class="form-control" placeholder="Input Pengolah">
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
    <script>
        $( "#sm_tanggal" ).datepicker({
            autoclose : true
        });
        $( "#sm_tgl_sm" ).datepicker({
            autoclose : true
        });
        $( "#sm_tgl_perihal" ).datepicker({
            autoclose : true
        });
    </script>
@endsection