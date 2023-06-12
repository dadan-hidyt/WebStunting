<?php

namespace Tests\Feature;

use App\Services\PengukuranService;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PengukuranTest extends TestCase
{

    public function test_beratBadan(){
        $service = new PengukuranService();

        $this->assertIsObject($service->ukurBeratBadanByUmur('L',20,30));
    }
    public function test_panjangBadan(){
        $service = new PengukuranService();
        $this->assertIsObject($service->ukurPanjangBadanByUmur('P',20,30));
    }
    public function test_tinggiBadan()
    {
        $service = new PengukuranService();
        $this->assertIsObject($service->ukurTinggiBadanByUmur('P',27,20));
    }
}
