@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Surat Keluar</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center><b>Daftar Surat keluar <p>Dinas Perhubungan Kabupaten Garut</p></b></center>
                            @if(Session::has('sukses'))
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Sukses!</h4>
                                    {!! Session::get('sukses') !!}
                                </div>
                            @endif
                            <div class="pull-right">
                                <a href="{{url('/surat_keluar/tambah')}}" class="btn btn-primary btn-sm" style="margin:10px;"><i class="fa fa-plus"></i>&nbsp;Tambah Surat</a>
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center; width:10%">No</th>
                                        <th style="text-align:center;">No Agenda</th>
                                        <th style="text-align:center;">Jenis</th>
                                        <th style="text-align:center;">Tanggal Surat</th>
                                        <th style="text-align:center; width:3%;">Perihal</th>
                                        <th style="text-align:center;">opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    @forelse ($data_surat_keluar as $sk)
                                        <tr>
                                            <td align="center">{{$i+1}}</td>
                                            <td align="center">{{$sk->no_agendask}}</td>
                                            <td align="center">{{$sk->jenis->nama_jenis}}</td>
                                            <td align="center">{{date('d-m-Y', strtotime($sk->tanggal_sk))}}</td>
                                            <td align="center">{{$sk->perihal_sk}}</td>
                                            <td align="center">
                                                <a href="{{url('/surat_keluar/view').'/'.$sk->indexsk }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                                                <a href="{{url('/surat_keluar/update').'/'.$sk->indexsk }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger btn-xs btn-hapus-sk" id="{{$sk->indexsk}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @empty
                                        <tr>
                                            <td colspan="5" align="center">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="text-align:center;">{{$data_surat_keluar->links()}}</div>
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
            $(document).on('click', '.btn-hapus-sk', function(e){
                e.preventDefault();
                var id_sm = $(this).attr('id');
                if(confirm('Apakah yakin akan menghapus data?')){
                    $.ajax({
                        url : '/surat_keluar/hapus',
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