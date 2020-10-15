<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(){
        $kontak = Kontak::all();
        return view('frontend.kontak.index', compact('kontak'));
    }
}
