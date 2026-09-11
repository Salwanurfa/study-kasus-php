<?php

namespace App\Models;

abstract class Kendaraan
{
    protected string $kode;
    protected string $merek;
    protected float $tarifPerHari;
    protected string $status;

    public function __construct(string $kode, string $merek, float $tarifPerHari)
    {
        $this->kode         = $kode;
        $this->merek        = $merek;
        $this->tarifPerHari = $tarifPerHari;
        $this->status       = 'Tersedia';
    }

    /**
     * Aturan: kendaraan yang sedang disewa tidak boleh disewa lagi.
     */
    public function sewa(): string
    {
        if ($this->status === 'Disewa') {
            return "{$this->merek} sedang disewa, tidak bisa disewa lagi";
        }

        $this->status = 'Disewa';
        return "{$this->merek} berhasil disewa";
    }

    public function kembalikan(): string
    {
        if ($this->status === 'Tersedia') {
            return "{$this->merek} belum disewa";
        }

        $this->status = 'Tersedia';
        return "{$this->merek} berhasil dikembalikan";
    }

    /**
     * Biaya sewa dasar = tarif per hari x lama sewa.
     * Mobil dan Motor mengimplementasikan tambahan biayanya masing-masing.
     */
    abstract public function hitungBiaya(int $lamaHari): float;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getKode(): string
    {
        return $this->kode;
    }

    public function getMerek(): string
    {
        return $this->merek;
    }
}
