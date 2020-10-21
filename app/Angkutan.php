<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkutan extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function merk()
    {
        return $this->belongsTo('App\Merk');
    }
}
