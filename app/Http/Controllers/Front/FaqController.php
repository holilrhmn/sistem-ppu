<?php

namespace App\Http\Controllers\Front;

use App\Faq;
use App\Http\Controllers\Controller;
use App\LinkMenu;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faq = Faq::latest()->get();
        $linkMenu = LinkMenu::all();
        return view('frontend.faq.index', compact('faq' , 'linkMenu'));
    }
}
