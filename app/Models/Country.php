<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'capital', 'population', 'region', 'subregion', 'flag_url', 'currency', 'language', 'motto'
    ];

    public function flag()
    {
        return $this->hasOne(Flag::class);
    }
}
