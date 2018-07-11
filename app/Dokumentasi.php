<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = "dokumentasi";
    protected $guarded = [];

    public function kategori(){
    	return $this->belongsTo(DokumentasiKategori::class,'id_kategori');
    }

}
