<?php

namespace App\Models;

class Siswa
{
    private string $nama;
    private string $nis;
    protected string $kelas;
    protected float $nilai;

    public function __construct(string $nama, string $nis, string $kelas, float $nilai)
    {
        $this->nama  = $nama;
        $this->nis   = $nis;
        $this->kelas = $kelas;
        $this->nilai = $nilai;
    }

    /**
     * Menampilkan seluruh data siswa dalam format teks.
     */
    public function tampilkanData(): string
    {
        return "Nama: {$this->nama}\n" .
               "NIS: {$this->nis}\n" .
               "Kelas: {$this->kelas}\n" .
               "Nilai: {$this->nilai}\n" .
               "Status: {$this->cekKelulusan()}\n";
    }

    /**
     * Aturan: nilai lulus minimal 75, tanpa pengecualian.
     */
    public function cekKelulusan(): string
    {
        return $this->nilai >= 75 ? 'Lulus' : 'Tidak Lulus';
    }
}
