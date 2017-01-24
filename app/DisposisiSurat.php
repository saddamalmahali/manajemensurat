<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposisiSurat extends Model
{
    protected $table = 'tb_disposisi';
    protected $primaryKey = 'indexd';
    public $timestamps = false;

    public function surat_masuk()
    {
        return $this->hasOne('App\SuratMasuk', 'indexsm', 'indexsm');
    }

    public function tujuan()
    {
        return $this->hasOne('App\TujuanDisposisi', 'kode_organisasi', 'kode_organisasi');
    }
}
