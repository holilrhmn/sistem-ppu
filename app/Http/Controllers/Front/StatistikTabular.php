<?php

namespace App\Http\Controllers\Front;

use App\Angkutan;
use App\Http\Controllers\Controller;
use App\LinkMenu;
use App\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikTabular extends Controller
{
    public function merk()
    {
        $linkMenu = LinkMenu::all();
        $merk_kendaraan = DB::table('merks')
            ->select(
                DB::raw('name as merk'),
                DB::raw('count(*) as number_merk')
            )
            ->groupBy('name')
            ->get();
        $array_merk[] = ['Merk', 'Number_merk'];
        foreach ($merk_kendaraan as $key_merk => $value_merk) {
            $array_merk[++$key_merk] = [$value_merk->merk, $value_merk->number_merk];
        }

        return view('frontend/statistik-tabular.merk')->with(compact('linkMenu'))->with('merk', json_encode($array_merk));
    }

    public function type()
    {
        $linkMenu = LinkMenu::all();
        $data = DB::table('types')
            ->select(
                DB::raw('name as type'),
                DB::raw('count(*) as number')
            )
            ->groupBy('name')
            ->get();
        $array[] = ['Type', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->type, $value->number];
        }

        return view('frontend/statistik-tabular.type')->with(compact('linkMenu'))->with('type', json_encode($array));
    }

    public function tahun()
    {
        $linkMenu = LinkMenu::all();
        $data = DB::table('angkutans')
            ->select(
                DB::raw('tahun_kendaraan as tahun'),
                DB::raw('count(*) as number')
            )
            ->groupBy('tahun_kendaraan')
            ->get();
        $array[] = ['Tahun', 'Number'];
        foreach ($data as $key => $value) {
            $array[++$key] = [$value->tahun, $value->number];
        }

        return view('frontend/statistik-tabular.tahun')->with(compact('linkMenu'))->with('tahun', json_encode($array));
    }

    public function tps()
    {
        $tps = Angkutan::all();
        $linkMenu = LinkMenu::all();
        return view("frontend/statistik-tabular.tps", compact("tps", "linkMenu"));
    }

    public function rute()
    {
        $rute = Angkutan::all();
        $linkMenu = LinkMenu::all();
        return view("frontend/statistik-tabular.rute", compact("rute", "linkMenu"));
    }

    public function jalan()
    {
        $jalan = Angkutan::all();
        $linkMenu = LinkMenu::all();
        return view("frontend/statistik-tabular.jalan", compact("jalan", "linkMenu"));
    }

    public function durasi()
    {
        $durasi = Angkutan::all();
        $linkMenu = LinkMenu::all();
        return view("frontend/statistik-tabular.durasi", compact("durasi", "linkMenu"));
    }
}
