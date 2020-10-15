<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\InfoTerkini;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        $info = InfoTerkini::latest()->paginate(5);
        return view('frontend.info.index', compact('info'));
    }

    public function show($slug){
        $info = InfoTerkini::where('slug', $slug)->first();
        return view('frontend.info.detail',compact('info'));
    }

}
