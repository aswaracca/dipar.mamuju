<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = "profil";
    protected $guarded = [];

    public function dokumentasi(){
    	return $this->belongsTo(Dokumentasi::class,'id_dokumentasi');
    }
}
