<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function angkutan()
    {
        return $this->hasMany('App\Angkutan');
    }
}
