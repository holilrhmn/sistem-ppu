<?php

namespace App\Http\Controllers\Api;

use App\TPS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TPS as TPS_array;
use Illuminate\Support\Facades\DB;

class TPSController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {   
        //$tps = TPS::all(); 
        
        $tps = TPS::all();  
        
        $geoJSONdata = $tps->map(function ($tps_item) {
            return [
                'type'       => 'Feature',
                'properties' => new TPS_array($tps_item),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $tps_item->longitude,
                        $tps_item->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
    public function latitutLongitut(Request $request)
    {
        //$tps = TPS::all();
        $tps = DB::table('tps')
            ->join('armada', 'armada.id', '=', 'tps.id_armada')
            ->get();

        $geoJSONdata = $tps->map(function ($tps_item) {
            return [
                'type'       => 'Feature',
                'properties' => $tps_item,
                  'map_popup_content' => '<table> 
                            <tr><td align=center colspan=3><img src=' . asset('images/'.$tps_item->kondisi_eksisteing). ' width=200 height=150></td></tr>
                            
							<tr><td>Armada</td><td>:</td><td>' . $tps_item->nama_armada . '</td></tr>
							<tr><td>Supir</td><td>:</td><td>' . $tps_item->supir . '</td></tr>
                            <tr><td>TPS</td><td>:</td><td>' . $tps_item->nama_tps . '</td></tr>
                            <tr><td>Jalan</td><td>:</td><td>' . $tps_item->nama_jalan . '</td></tr>
                            <tr><td>Panjang</td><td>:</td><td>' . $tps_item->panjang . '</td></tr>
                            <tr><td>Lebar</td><td>:</td><td>' . $tps_item->lebar . '</td></tr>
                            <tr><td>Tinggi</td><td>:</td><td>' . $tps_item->tinggi . '</td></tr>
                            <tr><td>Dimensi</td><td>:</td><td>' . $tps_item->dimensi . '</td></tr>
                            <tr><td>Limpasan Luar</td><td>:</td><td>' . $tps_item->limpasan_luar . '</td></tr>
                            <tr><td>Jenis Konstruksi</td><td>:</td><td>' . $tps_item->jenis_konstruksi . '</td></tr>
                             <tr><td>Deskripsi</td><td>:</td><td>' . $tps_item->deskripsi . '</td></tr>
                   </table>',
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $tps_item->longitude,
                        $tps_item->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
