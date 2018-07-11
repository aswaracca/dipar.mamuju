<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hotel";
    protected $guarded = [];

    public function gambarUtama(){
    	return $this->hasOne(Gambar::class,'id_ref','id')
    				->where('type','hotel')
    				->where('is_thumb',1);
    }

    public function gambar(){
    	return $this->hasMany(Gambar::class,'id_ref','id')
    				->where('type','hotel');
    }
}
