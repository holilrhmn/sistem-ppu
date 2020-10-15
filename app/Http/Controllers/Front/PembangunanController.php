<?php

namespace App\Http\Controllers\Front;

use App\dokumenPembangunan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembangunanController extends Controller
{
    public function index(){
        $pembangunan = dokumenPembangunan::all();
        return view('frontend.pembangunan.index', compact('pembangunan'));
    }
}
