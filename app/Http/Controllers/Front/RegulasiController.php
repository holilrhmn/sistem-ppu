<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    public function index(){
        $regulasi = Regulasi::all();
        return view('frontend.regulasi.index', compact('regulasi'));
    }
}
