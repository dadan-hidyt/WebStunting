<?php

namespace App\Http\Controllers\Pwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  
    public function index(){
        return view('pwa.home');
    }
    public function showHomePage(){
        if ( auth()->check() === false ) {
            return redirect()->route('mobile.index');
        }
        return view('pwa.homepage');
    }
}
