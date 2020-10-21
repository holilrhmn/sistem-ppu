<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\LinkMenu;
use App\Sambutan;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    public function index(){
        $sambutan = Sambutan::all();
        $linkMenu = LinkMenu::all();
        return view('frontend.sambutan.index', compact('sambutan', 'linkMenu'));
    }
}
