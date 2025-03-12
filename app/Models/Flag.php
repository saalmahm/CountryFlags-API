<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $filables=["country_id","file_path","mime_type","file_size"];

    public function countries(){
        return $this->belongsTo(Country::class);
    }
}
