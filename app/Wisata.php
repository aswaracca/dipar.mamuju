<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = "wisata";
    protected $guarded = [];

    protected static function boot() {
        parent::boot();
        
        static::deleting(function($wisata) {
            $wisata->gambar()->delete();
        });
    }

    public function kategori(){
    	return $this->belongsTo(WisataKategori::class,'id_kategori');
    }

    public function gambarUtama(){
    	return $this->hasOne(Gambar::class,'id_ref','id')
    				->where('type','wisata')
    				->where('is_thumb',1);
    }

    public function gambar(){
    	return $this->hasMany(Gambar::class,'id_ref','id')
    				->where('type','wisata');
    }
}
