<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'tb_sm';
    protected $primaryKey = 'indexsm';
    public $timestamps = false;

    public function jenis()
    {
        return $this->hasOne('App\JenisSurat', 'kode_jenis', 'kode_jenis');
    }
}
