@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Masukan Tanggal</h3>
                </div>
                <div class="panel-body">
                    <form action="{{url('/laporan/print_surat_keluar')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">                                    
                                    <input type="text" name="tanggal_dari" id="tanggal_dari" class="form-control" placeholder="Tanggal Dari">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tanggal_sampai" id="tanggal_sampai" class="form-control" placeholder="Tanggal Sampai">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary pull-right" value="Tampilkan">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#tanggal_dari').datepicker({
            autoclose : true
        });
        $('#tanggal_sampai').datepicker({
            autoclose : true
        });
    </script>
@endsection