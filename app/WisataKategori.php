<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisataKategori extends Model
{
    protected $table = "wisata_kategori";
    protected $guarded = [];

    public function setNameAttribute($value){
    	$this->attributes['name'] = ucfirst($value);
    }
}
