<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\LinkMenu;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $linkMenu = LinkMenu::all();
        return view('frontend.homepage.index', compact('linkMenu'));
    }
}
