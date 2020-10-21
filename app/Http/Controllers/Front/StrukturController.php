<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\LinkMenu;
use App\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index(){
        $struktur = StrukturOrganisasi::all();
        $linkMenu = LinkMenu::all();
        return view('frontend.struktur.index', compact('struktur', 'linkMenu'));
    }
}
