<?php

namespace App;

use App\TPS;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{

    protected $table = 'armada';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $fillable = [
			id,
nama_armada,
plat,
supir,
rute,
		];

    public function tps()
    {
        return $this->hasMany(TPS::class);
    }
}
