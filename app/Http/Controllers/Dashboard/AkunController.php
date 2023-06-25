<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    
    public function index(){
        
        return view('dashboard.akun.manage',[
            'title' => "manage Akun",
        ]);
    }
    public function edit(User $user) {
        return view('dashboard.akun.edit',compact('user'));
    }
    public function delete(User $user) {
        $current_id = auth()->user()->id;
        if ( $user->delete() && $current_id != $user->id ) {
            return redirect()->route('dashboard.akun.index')->with('success',"Data berhasil di hapus");
        } else {
            return redirect()->route('dashboard.akun.index')->with('gagal',"Data gagal di hapus!"); 
        }
        abort(500);
    }
}
