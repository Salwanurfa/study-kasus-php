<?php

namespace App\Models;

class Mobil extends Kendaraan
{
    private float $biayaAsuransi;

    public function __construct(string $kode, string $merek, float $tarifPerHari, float $biayaAsuransi = 50000)
    {
        parent::__construct($kode, $merek, $tarifPerHari);
        $this->biayaAsuransi = $biayaAsuransi;
    }

    /**
     * Mobil punya biaya tambahan asuransi.
     */
    public function hitungBiaya(int $lamaHari): float
    {
        return ($this->tarifPerHari * $lamaHari) + $this->biayaAsuransi;
    }
}
