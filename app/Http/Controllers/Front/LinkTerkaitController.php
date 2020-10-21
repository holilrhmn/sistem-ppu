<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Link;
use App\LinkMenu;
use Illuminate\Http\Request;

class LinkTerkaitController extends Controller
{
    public function index(){
        $link = Link::latest()->paginate(10);
        $linkMenu = LinkMenu::all();
        return view('frontend.link.index', compact('link', 'linkMenu'));
    }
}
