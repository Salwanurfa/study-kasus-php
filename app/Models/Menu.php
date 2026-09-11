<?php

namespace App\Models;

use InvalidArgumentException;

class Menu
{
    private string $kode;
    protected string $nama;
    protected float $harga;
    protected string $kategori;
    protected int $stok;

    public function __construct(string $kode, string $nama, float $harga, string $kategori, int $stok)
    {
        if ($harga < 0) {
            throw new InvalidArgumentException('Harga tidak boleh bernilai negatif');
        }

        if ($stok < 0) {
            throw new InvalidArgumentException('Stok tidak boleh bernilai negatif');
        }

        $this->kode     = $kode;
        $this->nama     = $nama;
        $this->harga    = $harga;
        $this->kategori = $kategori;
        $this->stok     = $stok;
    }

    public function tambahStok(int $jumlah): string
    {
        if ($jumlah < 0) {
            return "Jumlah tambahan stok tidak valid";
        }

        $this->stok += $jumlah;
        return "Stok {$this->nama} berhasil ditambah, stok sekarang: {$this->stok}";
    }

    /**
     * Aturan: pesanan tidak boleh melebihi jumlah stok.
     */
    public function kurangiStok(int $jumlah): string
    {
        if ($jumlah < 0) {
            return "Jumlah pembelian tidak valid";
        }

        if ($jumlah > $this->stok) {
            return "Pembelian {$this->nama} gagal, stok tidak mencukupi";
        }

        $this->stok -= $jumlah;
        return "Pembelian {$this->nama} berhasil, sisa stok: {$this->stok}";
    }

    public function hitungTotalHarga(int $jumlah): float
    {
        return $this->harga * $jumlah;
    }

    /**
     * Aturan: menu dengan stok 0 berstatus "Habis".
     */
    public function getStatus(): string
    {
        return $this->stok === 0 ? 'Habis' : 'Tersedia';
    }

    public function getKategori(): string
    {
        return $this->kategori;
    }

    public function getData(): array
    {
        $kode     = $this->kode;
        $nama     = $this->nama;
        $harga    = $this->harga;
        $kategori = $this->kategori;
        $stok     = $this->stok;
        $status   = $this->getStatus();

        return compact('kode', 'nama', 'harga', 'kategori', 'stok', 'status');
    }
}
