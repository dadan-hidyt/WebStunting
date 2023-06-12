<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\StandardAntropometriBbByUmur;
use App\Services\PengukuranService;
use Illuminate\Http\Request;
/**
 * @author dadan hidayat <dadanhidyt@gmail.com>
 */
class AuthController extends Controller
{
    public function showLoginForm( PengukuranService $pengukuranService ){
        $title = "Login Dashboard";
        return view('auth.login', compact('title'));
    }
}
