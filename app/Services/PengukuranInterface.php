<?php

namespace App\Services;

interface PengukuranInterface
{
    public function ukurBeratBadanByUmur(string $jenisKelamin, int $umur, float|int $beratBadan);
    public function ukurTinggiBadanByUmur(string $jenisKelamin, int $umur, float|int $tinggiBadan);
    public function ukurPanjangBadanByUmur(string $jenisKelamin, int $umur, float|int $panjangBadan);
    public function ukurBeratBadanByPanjangBadan(string $jenisKelamin, int $umur, float|int $beratBadan);
    public function ukurBeratBadanByTinggiBadan(string $jenisKelamin, int $umur, float|int $beratBadan);
}
