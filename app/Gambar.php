<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = "gambar";
    protected $guarded = [];


    protected static function boot() {
        parent::boot();

        static::deleted(function($image) { // before delete() method call this
            if(file_exists('images/'.$image->type.'/'.$image->gambar)){
	            $filename = public_path('images/'.$image->type.'/'.$image->gambar);
                unlink($filename);
            }
        });
    }
}
