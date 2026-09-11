<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuMinuman;

class MenuController extends Controller
{
    public function index()
    {
        $daftarMenu = [
            new Menu('M001', 'Nasi Goreng', 12000, 'Makanan', 10),
            new Menu('M002', 'Mie Ayam', 10000, 'Makanan', 0),   // stok habis
            new Menu('M003', 'Roti Bakar', 8000, 'Makanan', 5),
            new MenuMinuman('M004', 'Es Teh Manis', 4000, 'Minuman', 20, 'Large'),
            new MenuMinuman('M005', 'Es Jeruk', 5000, 'Minuman', 15, 'Regular'),
        ];

        // Skenario uji kurangiStok(): stok cukup, stok habis, dan melebihi stok.
        $log = [];
        $log[] = $daftarMenu[0]->kurangiStok(3);   // stok cukup
        $log[] = $daftarMenu[1]->kurangiStok(1);   // stok sudah habis (0)
        $log[] = $daftarMenu[2]->kurangiStok(10);  // melebihi stok (hanya ada 5)

        $output = "=== Log Uji Coba ===\n";
        foreach ($log as $pesan) {
            $output .= "- {$pesan}\n";
        }

        // Kelompokkan & tampilkan menu berdasarkan kategori.
        $kategoriList = [];
        foreach ($daftarMenu as $menu) {
            $kategoriList[$menu->getKategori()][] = $menu;
        }

        $output .= "\n=== Daftar Menu per Kategori ===\n";
        foreach ($kategoriList as $kategori => $menus) {
            $output .= "\n-- Kategori: {$kategori} --\n";
            foreach ($menus as $menu) {
                $data = $menu->getData();
                foreach ($data as $field => $value) {
                    $output .= ucfirst($field) . ": {$value}\n";
                }
                $output .= "\n";
            }
        }

        return response('<pre>' . e($output) . '</pre>');
    }
}
