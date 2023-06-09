<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        $title = "Login Dashboard";
        return view('auth.login', compact('title'));
    }
}
