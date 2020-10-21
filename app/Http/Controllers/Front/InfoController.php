<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\InfoTerkini;
use App\LinkMenu;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        $linkMenu = LinkMenu::all();
        $info = InfoTerkini::latest()->paginate(5);
        return view('frontend.info.index', compact('info', 'linkMenu'));
    }

    public function show($slug){
        $info = InfoTerkini::where('slug', $slug)->first();
        $linkMenu = LinkMenu::all();
        return view('frontend.info.detail',compact('info', 'linkMenu'));
    }

}
