<?php

namespace App\Http\Controllers\Front;

use App\dokumenPembangunan;
use App\Http\Controllers\Controller;
use App\LinkMenu;
use Illuminate\Http\Request;

class PembangunanController extends Controller
{
    public function index(){
        $pembangunan = dokumenPembangunan::all();
        $linkMenu = LinkMenu::all();
        return view('frontend.pembangunan.index', compact('pembangunan', 'linkMenu'));
    }
}
