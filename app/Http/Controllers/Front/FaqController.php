<?php

namespace App\Http\Controllers\Front;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faq = Faq::latest()->get();
        return view('frontend.faq.index', compact('faq'));
    }
}
