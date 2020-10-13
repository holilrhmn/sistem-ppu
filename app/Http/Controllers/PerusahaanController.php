<?php

namespace App\Http\Controllers;

use Session;

use App\Exports\PerusahaanExport;
use App\Exports\PerusahaanExportPerParameter;
use App\Imports\PerusahaanImport;
use App\Perusahaan;
use App\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Outlet as OutletResource;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Perusahaan::all();

        $geoJSONdata = $data->map(function ($data) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($data),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $data->longitude,
                        $data->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);


        //return view('perusahaan.index', compact('perusahaan'));
    }
    //Pencarian berdasarkan besar investasi
    public function cariBesarInvestasi($investasi)
    {
        //$data = Perusahaan::query();
        $data = Outlet::where('kecamatan', '=', $investasi)->get();

        $geoJSONdata = $data->map(function ($data) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($data),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $data->longitude,
                        $data->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }

    //Pencarian berdasarkan kecamatan
    public function showBerdasarkanKecamatan()
    {
        return view('perusahaan.cariberdasarkankecamatan');
    }

    public function cariBerdasarkanKecamatan($kecamatan)
    {
        //$data = Perusahaan::query();
        $data = Outlet::where('kecamatan', '=', $kecamatan)->get();

        $geoJSONdata = $data->map(function ($data) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($data),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $data->longitude,
                        $data->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }

    //Pencarian berdasarkan Jenis Usaha
    public function showBerdasarkanJenisUsaha()
    {
        return view('perusahaan.cariberdasarkanjenisusaha');
    }

    public function cariBerdasarkanJenisUsaha($cariberdasarkanjenisusaha)
    {
        //$data = Perusahaan::query();
        $data = Outlet::where('jenis_perseroan', '=', $cariberdasarkanjenisusaha)->get();

        $geoJSONdata = $data->map(function ($data) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($data),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $data->longitude,
                        $data->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }


    //Pencarian berdasarkan nib perusahaan
    public function showBesarInvestasi()
    {
        return view('perusahaan.index');
    }

    //Pencarian berdasarkan nib perusahaan
    public function cariNib()
    {
        return view('perusahaan.carinib');
    }

    //Pencarian berdasarkan nama perusahaan
    public function cariNama()
    {
        return view('perusahaan.carinama');
    }

    //Download File
    public function showDownloadFile()
    {
        return view('perusahaan.downloadfile');
    }

    //Download atau export File Geojson
    public function downloadFile(Request $f)
    {
        $file = $f->input('file');
        $data = $this->index();
        Storage::disk('public')->put($file . '-' . date('dmY') . '.geoJson', $data);
        $download = public_path() . '/file/' . $file . '-' . date('dmY') . '.geoJson';
        return response()->download($download);

        //return view('perusahaan.downloadfile');
    }

    //Download atau export File Excel
    public function showDownloadFileExcel()
    {
        return view('perusahaan.downloadfileexcel');
    }

    public function downloadFileExcel(Request $f)
    {
        $file = $f->input('file');
        return Excel::download(new PerusahaanExport, $file . '-' . date('dmY') . '.xlsx');
    }

    public function showDownloadFileExcelBasedOnYear()
    {
        return view('perusahaan.downloadfileexcelbasedyear');
    }

    public function downloadFileExcelBasedOnYear(Request $f)
    {
        $file = $f->input('file');
        return Excel::download(new PerusahaanExportPerParameter($file), 'data_perusahaan_perkecamatan' . '-' . date('dmY') . 'xlsx');
    }

    //Import file excel
    public function importFileExcel(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $file = $request->file('gambar');
        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('public/fileexcel', $nama_file);

        // import data
        Excel::import(new PerusahaanImport, public_path('/fileexcel/' . $nama_file));

        Session::flash('sukses', 'Data  Berhasil Diimport!');

        //tambahkan return
        //return view('outlets.index');
        return redirect()->route('outlets.index');
    }

    public function showImportFileExcel()
    {
        return view('perusahaan.importfileexcel');
    }

    //Download format import data via excel
    public function downloadFormatImportData()
    {
        $download = public_path() . '/fileexcel/Format_Import_Data_via_Excel.xlsx';
        return response()->download($download);
    }
}
