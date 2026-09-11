<?php

namespace App\Models;

class MenuMinuman extends Menu
{
    private string $ukuran;

    public function __construct(
        string $kode,
        string $nama,
        float $harga,
        string $kategori,
        int $stok,
        string $ukuran = 'Regular'
    ) {
        parent::__construct($kode, $nama, $harga, $kategori, $stok);
        $this->ukuran = $ukuran;
    }

    /**
     * Override supaya data ukuran ikut tampil, tetap memakai compact()
     * dari class induk lalu ditambahkan field ukuran.
     */
    public function getData(): array
    {
        $data = parent::getData();
        $data['ukuran'] = $this->ukuran;

        return $data;
    }
}
