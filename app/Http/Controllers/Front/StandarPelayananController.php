<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Pelayanan;
use Illuminate\Http\Request;

class StandarPelayananController extends Controller
{
    public function index(){
        $pelayanan = Pelayanan::all();
        return view('frontend.pelayanan.index', compact('pelayanan'));
    }
}
