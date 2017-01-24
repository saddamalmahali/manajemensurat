@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Tambah Surat Keluar</center></h3>
                </div>
                <form action="{{url('/disposisi/simpan')}}" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('tanggal_disposisi') ? ' has-error' : '' }}">
                            <label for="tanggal_disposisi">Tanggal</label>
                            <input type="text" name="tanggal_disposisi" id="tanggal_disposisi" class="form-control" placeholder="Tanggal Disposisi">
                            @if ($errors->has('tanggal_disposisi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_disposisi') }}</strong>
                                </span>
                            @endif
                        </div>
                            
                        <div class="form-group{{ $errors->has('indexsm') ? ' has-error' : '' }}">
                            <label for="indexsm">No Surat Masuk</label>
                            <select name="indexsm" class="form-control">
                                <option value="" disabled selected >Pilih Surat Masuk</option>
                                @forelse ($data_sm as $item)
                                    <option value="{{$item->indexsm}}">{{$item->no_sm}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                            @if ($errors->has('indexsm'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('indexsm') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('kode_organisasi') ? ' has-error' : '' }}">
                            <label for="kode_organisasi">Tujuan Disposisi</label>
                            <select name="kode_organisasi" class="form-control">
                                <option value="" disabled selected>Pilih Tujuan</option>
                                @forelse($data_td as $td)
                                    <option value="{{$td->kode_organisasi}}">{{$td->kode_organisasi.' | '.$td->nama_organisasi}}</option>
                                @empty

                                @endforelse
                            </select>
                            @if ($errors->has('kode_organisasi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kode_organisasi') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('sifat') ? ' has-error' : '' }}">
                            <label for="sifat">Sifat</label>
                            <input type="text" name="sifat" class="form-control" placeholder="Sifat">
                            @if ($errors->has('sifat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sifat') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('tindakan') ? ' has-error' : '' }}">
                            <label for="tindakan">Tindakan</label>
                            <input type="text" name="tindakan" class="form-control" placeholder="Tindakan">
                            
                            @if ($errors->has('tindakan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tindakan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" rows="4" class="form-control"></textarea>
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
        $( "#tanggal_disposisi" ).datepicker({
            autoclose : true
        });
    </script>
@endsection