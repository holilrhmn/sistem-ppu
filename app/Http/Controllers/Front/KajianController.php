<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Kajian;
use Illuminate\Http\Request;

class KajianController extends Controller
{
    public function index(){
        $kajian = Kajian::all();
        return view('frontend.kajian.index', compact('kajian'));
    }
}
