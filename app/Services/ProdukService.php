<?php

namespace App\Services;

class ProdukService
{
    /**
     * Mengembalikan array multidimensi data produk.
     */
    public function getAllProduk(): array
    {
        return [
            ['nama' => 'Indomie Goreng',  'kategori' => 'Makanan', 'harga' => 3500, 'stok' => 20],
            ['nama' => 'Aqua 600ml',      'kategori' => 'Minuman', 'harga' => 4000, 'stok' => 0],
            ['nama' => 'Kopi Kapal Api',  'kategori' => 'Minuman', 'harga' => 2500, 'stok' => 15],
            ['nama' => 'Buku Tulis',      'kategori' => 'ATK',     'harga' => 5000, 'stok' => 10],
            ['nama' => 'Pulpen',          'kategori' => 'ATK',     'harga' => 2000, 'stok' => 0],
        ];
    }

    /** Bonus: filter berdasarkan kategori. */
    public function filterByKategori(array $produk, string $kategori): array
    {
        return array_values(array_filter(
            $produk,
            fn ($item) => $item['kategori'] === $kategori
        ));
    }

    /** Bonus: filter produk yang masih tersedia (stok > 0). */
    public function filterTersedia(array $produk): array
    {
        return array_values(array_filter(
            $produk,
            fn ($item) => $item['stok'] > 0
        ));
    }

    /** Bonus: produk dengan harga di atas nilai tertentu. */
    public function filterHargaDiAtas(array $produk, float $harga): array
    {
        return array_values(array_filter(
            $produk,
            fn ($item) => $item['harga'] > $harga
        ));
    }

    /** Bonus: jumlah seluruh produk. */
    public function jumlahSeluruhProduk(array $produk): int
    {
        return count($produk);
    }

    /** Bonus: produk dengan stok paling banyak. */
    public function produkStokTerbanyak(array $produk): array
    {
        if (empty($produk)) {
            return [];
        }

        usort($produk, fn ($a, $b) => $b['stok'] <=> $a['stok']);

        return $produk[0];
    }
}
