<?php

namespace App\Http\Controllers\Pwa\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('pwa.masyarakat.register')->with('title',"Daftar Masyarakt");
    }
}
