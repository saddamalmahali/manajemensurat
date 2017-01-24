@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Edit Surat Keluar</center></h3>
                </div>
                <form action="{{url('/surat_keluar/simpan_update')}}" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$surat_keluar->indexsk}}">
                    <div class="panel-body">
                        
                            
                        <div class="form-group{{ $errors->has('no_agendask') ? ' has-error' : '' }}">
                            <label for="no_agendasm">No Agenda</label>
                            <input type="text" name="no_agendask" value="{{$surat_keluar->no_agendask}}" class="form-control" placeholder="Input No Agenda">
                            @if ($errors->has('no_agendask'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_agendask') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('kode_jenis') ? ' has-error' : '' }}">
                            <label for="kode_jenis">Jenis Surat</label>
                            <select name="kode_jenis" class="form-control">
                                <option value="" disabled selected>Pilih Jenis Surat</option>
                                @forelse ($data_jenis as $jenis)
                                    <option value="{{$jenis->kode_jenis}}" {{$surat_keluar->kode_jenis == $jenis->kode_jenis ? 'selected' : ''}}>{{$jenis->nama_jenis}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            @if ($errors->has('kode_jenis'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kode_jenis') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('tanggal_sk') ? ' has-error' : '' }}">
                            <label for="tanggal_sk">Tanggal</label>
                            <input type="text" name="tanggal_sk" id="tanggal_sk" class="form-control" placeholder="Tanggal Surat Keluar" value="{{$surat_keluar->tanggal_sk}}">
                            @if ($errors->has('tanggal_sk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_sk') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('perihal_sk') ? ' has-error' : '' }}">
                            <label for="perihal_sk">Perihal</label>
                            <input type="text" name="perihal_sk" class="form-control" placeholder="Perihal Surat Keluar" value="{{$surat_keluar->perihal_sk}}">
                            @if ($errors->has('perihal_sk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('perihal_sk') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('ket_sk') ? ' has-error' : '' }}">
                            <label for="ket_sk">Ringkasan</label>
                            <textarea name="ket_sk" rows="4" class="form-control">{{$surat_keluar->ket_sk}}</textarea>
                            @if ($errors->has('ket_sk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ket_sk') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="gambar_sk">Lampiran</label>
                            <input type="file" name="gambar_sk" class="form-control">
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
        $( "#tanggal_sk" ).datepicker({
            autoclose : true
        });
    </script>
@endsection