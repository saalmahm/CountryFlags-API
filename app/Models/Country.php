<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $filables=["name","capital","population","region","subregion","flag_url","currency","language","motto"];

    public function flags(){
        return $this->hasOne(Flag::class);
    }
}
