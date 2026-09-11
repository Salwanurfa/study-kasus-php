<?php

namespace App\Http\Controllers;

use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $daftarBuku = [
            new Buku('B001', 'Laskar Pelangi', 'Andrea Hirata', 2005),
            new Buku('B002', 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980),
            new Buku('B003', 'Filosofi Teras', 'Henry Manampiring', 2018),
        ];

        // Skenario uji:
        // 1) Pinjam buku pertama yang statusnya masih Tersedia.
        // 2) Coba pinjam buku yang sama lagi (harus ditolak).
        // 3) Kembalikan buku tersebut.
        $log = [];
        $log[] = $daftarBuku[0]->pinjam();       // Buku berhasil dipinjam
        $log[] = $daftarBuku[0]->pinjam();       // Buku sedang dipinjam
        $log[] = $daftarBuku[0]->kembalikan();   // Buku berhasil dikembalikan

        $output = "=== Log Uji Coba ===\n";
        foreach ($log as $pesan) {
            $output .= "- {$pesan}\n";
        }

        $output .= "\n=== Daftar Buku ===\n";
        foreach ($daftarBuku as $buku) {
            $data = $buku->getData();
            $output .= "Kode: {$data['kode']}\n";
            $output .= "Judul: {$data['judul']}\n";
            $output .= "Penulis: {$data['penulis']}\n";
            $output .= "Tahun Terbit: {$data['tahunTerbit']}\n";
            $output .= "Status: {$data['status']}\n\n";
        }

        return response('<pre>' . e($output) . '</pre>');
    }
}
