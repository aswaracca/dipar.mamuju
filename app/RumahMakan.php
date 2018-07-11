<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumahMakan extends Model
{
    protected $table ="rumah_makan";
    protected $guarded = [];

    protected static function boot() {
        parent::boot();
        
        static::deleting(function($wisata) {
            $wisata->gambar()->delete();
        });
    }

    public function kategori(){
    	return $this->belongsTo(RumahMakanKategori::class,'id_kategori');
    }

    public function gambarUtama(){
    	return $this->hasOne(Gambar::class,'id_ref','id')
    				->where('type','rm')
    				->where('is_thumb',1);
    }

    public function gambar(){
    	return $this->hasMany(Gambar::class,'id_ref','id')
    				->where('type','rm');
    }
}
