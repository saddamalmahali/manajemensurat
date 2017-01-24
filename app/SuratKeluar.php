<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'tb_sk';
    protected $primaryKey = 'indexsk';
    public $timestamps = false;
    
    public function jenis()
    {
        return $this->hasOne('App\JenisSurat', 'kode_jenis', 'kode_jenis');
    }
}
