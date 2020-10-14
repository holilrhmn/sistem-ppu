<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoTerkini extends Model
{
    protected $guarded = [];

    public function penulis()
    {
        return $this->belongsTo('App\User', 'penulis_id');
    }
}
