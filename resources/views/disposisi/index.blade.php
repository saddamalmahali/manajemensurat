@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Disposisi Surat</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><b><h3>Dinas Perhubungan Kabupaten Garut</h3><p><h4>Daftar Disposisi Surat</h4> </p></b></center>
                            @if(Session::has('sukses'))
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Sukses!</h4>
                                    {!! Session::get('sukses') !!}
                                </div>
                            @endif
                            <div class="pull-right">
                                <a href="{{url('/disposisi/tambah')}}" class="btn btn-primary btn-sm" style="margin:10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Surat</a>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center; width:7%">No</th>
                                        <th style="text-align:center; width:10%">Tanggal</th>
                                        <th style="text-align:center;">No Surat Masuk</th>
                                        <th style="text-align:center;">Tujuan Disposisi</th>
                                        <th style="text-align:center; width:10%;">Sifat</th>
                                        <th style="text-align:center;">Tindakan</th>
                                        <th style="text-align:center; width:20%;">Catatan</th>
                                        <th style="text-align:center;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @forelse ($data_disposisi as $disposisi)
                                        <tr>
                                            <td align="center">{{$i+1}}</td>
                                            <td align="center">{{date('d-m-Y', strtotime($disposisi->tanggal_disposisi))}}</td>
                                            <td align="center">{{$disposisi->surat_masuk->no_sm}}</td>
                                            <td align="center">{{$disposisi->tujuan->nama_organisasi}}</td>
                                            <td align="center">{{$disposisi->sifat}}</td>
                                            <td align="center">{{$disposisi->tindakan}}</td>
                                            <td align="center">{{$disposisi->catatan}}</td>
                                            <td align="center">
                                                <a href="{{url('/disposisi/view').'/'.$disposisi->indexd }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                                                <a href="{{url('/disposisi/update').'/'.$disposisi->indexd }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                
                                                <a class="btn btn-danger btn-xs btn-hapus-disposisi" id="{{$disposisi->indexd}}"><i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    @empty
                                        <tr>
                                            <td colspan="8" align="center">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="text-align:center;">{{$data_disposisi->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.btn-hapus-disposisi', function(e){
                e.preventDefault();
                var id_sm = $(this).attr('id');
                if(confirm('Apakah yakin akan menghapus data?')){
                    $.ajax({
                        url : '/disposisi/hapus',
                        type : 'post',
                        data : {id : id_sm},
                        dataType : 'json',
                        success : function(data){

                            if(data == "sukses"){
                                window.location.reload(false);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection