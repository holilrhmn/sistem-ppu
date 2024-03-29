<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Kajian;
use App\LinkMenu;
use Illuminate\Http\Request;

class KajianController extends Controller
{
    public function index(){
        $kajian = Kajian::all();
        $linkMenu = LinkMenu::all();
        return view('frontend.kajian.index', compact('kajian', 'linkMenu'));
    }
}
