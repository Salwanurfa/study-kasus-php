<?php

namespace App\Models;

class Buku
{
    private string $kode;
    private string $judul;
    private string $penulis;
    private int $tahunTerbit;
    private bool $sedangDipinjam = false;

    public function __construct(
        string $kode,
        string $judul,
        string $penulis,
        int $tahunTerbit
    ) {
        $this->kode        = $kode;
        $this->judul       = $judul;
        $this->penulis     = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }

    /**
     * Aturan: buku yang sedang dipinjam tidak boleh dipinjam kembali.
     */
    public function pinjam(): string
    {
        if ($this->sedangDipinjam === true) {
            return 'Buku sedang dipinjam';
        }

        $this->sedangDipinjam = true;
        return 'Buku berhasil dipinjam';
    }

    /**
     * Aturan: hanya buku yang sedang dipinjam yang bisa dikembalikan.
     */
    public function kembalikan(): string
    {
        if ($this->sedangDipinjam === false) {
            return 'Buku belum dipinjam, tidak bisa dikembalikan';
        }

        $this->sedangDipinjam = false;
        return 'Buku berhasil dikembalikan';
    }

    /**
     * Status hanya "Tersedia" atau "Dipinjam".
     */
    public function getStatus(): string
    {
        return $this->sedangDipinjam ? 'Dipinjam' : 'Tersedia';
    }

    /**
     * Mengembalikan associative array data buku menggunakan compact().
     */
    public function getData(): array
    {
        $kode        = $this->kode;
        $judul       = $this->judul;
        $penulis     = $this->penulis;
        $tahunTerbit = $this->tahunTerbit;
        $status      = $this->getStatus();

        return compact('kode', 'judul', 'penulis', 'tahunTerbit', 'status');
    }
}
