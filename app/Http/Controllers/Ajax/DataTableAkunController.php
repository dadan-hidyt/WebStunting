<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
class DataTableAkunController extends Controller
{
    public function index(){
        return DataTables::of(User::all())->addIndexColumn()->addColumn('action',function($row){
            $delete = "<a onclick='return confirm(\"Apakah anda yakin? Proses ini akan menghapus user secara permanen!\")' href='".route('dashboard.akun.delete',$row->id)."' class='btn btn-sm btn-danger'><i class='fa fa-trash' ></i></a>";
            $edit = "<a href='".route('dashboard.akun.edit',$row->id)."' class='btn btn-sm btn-success'><i class='fa fa-edit' ></i></a>";
            $deactive = "<a href='".route('dashboard.akun.change_active',$row->id)."' class='btn btn-sm btn-info'><i class='fa fa-edit' ></i></a>";
            return $delete."&nbsp;".$edit."&nbsp;".$deactive;
        })->addColumn('active',fn($row)=>$row->active ? 'YA' : 'NO')->addColumn('role',fn($row)=>textHakAkses($row->hak_akses))->make();
    }


}
