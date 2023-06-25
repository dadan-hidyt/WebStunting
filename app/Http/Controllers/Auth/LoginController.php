<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(){
        return view('auth.login',[
            'title' => "Login"
        ]);
    }
    public function logout(){
        auth()->logout();
        session()->regenerate();
        return redirect()->route('index');
    }
}
?>
