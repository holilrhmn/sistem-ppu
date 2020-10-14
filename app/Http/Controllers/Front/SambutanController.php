<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Sambutan;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    public function index(){
        $sambutan = Sambutan::all();
        return view('frontend.sambutan.index', compact('sambutan'));
    }
}
