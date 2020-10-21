<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $guarded = [];

    public function angkutan()
    {
        return $this->hasMany('App\Angkutan');
    }
}
