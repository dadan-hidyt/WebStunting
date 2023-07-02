<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class UkurBuMil extends Facade{
    protected static function getFacadeAccessor(){
        return 'PengukuranIbuHamilService';
    }
}