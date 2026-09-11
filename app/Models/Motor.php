<?php

namespace App\Models;

class Motor extends Kendaraan
{
    /**
     * Motor tanpa biaya tambahan.
     */
    public function hitungBiaya(int $lamaHari): float
    {
        return $this->tarifPerHari * $lamaHari;
    }
}
