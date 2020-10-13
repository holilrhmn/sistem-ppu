<?php

namespace App\Exports;

use App\Perusahaan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PerusahaanExportPerParameter implements FromQuery
{
    use Exportable;

    public function __construct(String $kecamatan)
    {
        $this->kecamatan = $kecamatan;
    }

    public function query()
    {
        //dd($this->kecamatan);
        return $data = Perusahaan::query()->where('kecamatan', $this->kecamatan);
        //dd($data);
        //return Perusahaan::query()->where('kecamatan', $this->$kecamatan);
    }
}
