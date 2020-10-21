<?php

namespace App\Http\Controllers;

use App\LinkMenu;
use Illuminate\Http\Request;

class TPSMapController extends Controller
{
    /**
     * Show the outlet listing in LeafletJS map.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.map' ,compact('linkMenu'));
    }
    public function tps1(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps1', compact('linkMenu'));
    }
    public function tps2(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps2', compact('linkMenu'));
    }
    public function tps3(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps3', compact('linkMenu'));
    }
    public function tps4(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps4', 'linkMenu');
    }
    public function tps5(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps5',compact('linkMenu'));
    }
    public function tps6(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps6',compact('linkMenu'));
    }
    public function tps7(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps7', compact('linkMenu'));
    }
    public function tps8(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps8',compact('linkMenu'));
    }
    public function tps9(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps9',compact('linkMenu'));
    }
    public function tps10(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps10', compact('linkMenu'));
    }
    public function tps11(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps11', compact('linkMenu'));
    }
    public function tps12(Request $request)
    { 
        $linkMenu = LinkMenu::all();
        return view('tps.tps12',compact('linkMenu'));
    }
    public function tps13(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps13',compact('linkMenu'));
    }
    public function tps14(Request $request)
    {
        $linkMenu = LinkMenu::all();
        return view('tps.tps14', compact('linkMenu'));
    }
}
