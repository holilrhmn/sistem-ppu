<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\LinkMenu;
use App\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index(){
        $sejarah = Sejarah::all();
        $linkMenu = LinkMenu::all();
        return view('frontend.sejarah.index', compact('sejarah', 'linkMenu'));
    }
}
