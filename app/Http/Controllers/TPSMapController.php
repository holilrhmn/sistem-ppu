<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TPSMapController extends Controller
{
    /**
     * Show the outlet listing in LeafletJS map.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tps.map');
    }
    public function tps1(Request $request)
    {
        return view('tps.tps1');
    }
    public function tps2(Request $request)
    {
        return view('tps.tps2');
    }
    public function tps3(Request $request)
    {
        return view('tps.tps3');
    }
    public function tps4(Request $request)
    {
        return view('tps.tps4');
    }
    public function tps5(Request $request)
    {
        return view('tps.tps5');
    }
    public function tps6(Request $request)
    {
        return view('tps.tps6');
    }
    public function tps7(Request $request)
    {
        return view('tps.tps7');
    }
    public function tps8(Request $request)
    {
        return view('tps.tps8');
    }
    public function tps9(Request $request)
    {
        return view('tps.tps9');
    }
    public function tps10(Request $request)
    {
        return view('tps.tps10');
    }
    public function tps11(Request $request)
    {
        return view('tps.tps11');
    }
    public function tps12(Request $request)
    {
        return view('tps.tps12');
    }
    public function tps13(Request $request)
    {
        return view('tps.tps13');
    }
    public function tps14(Request $request)
    {
        return view('tps.tps14');
    }
}
