<?php

namespace App\Http\Controllers\Pwa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(){
        $loginType = request()->_type;

        $register_url = match ($loginType) {
            'masyarakat' => route('mobile.masyarakat.register'),
            'posyandu' => route('mobile.posyandu.register'),
            'bumil' => route('mobile.bumil.register'),
            default => '/'
        };


        return view('pwa.login',[
            'register_url' => $register_url,
        ])->with('title',"Login");
    }
}
