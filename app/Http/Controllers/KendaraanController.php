<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Motor;

class KendaraanController extends Controller
{
    public function index()
    {
        $daftarKendaraan = [
            new Mobil('K001', 'Toyota Avanza', 300000),
            new Mobil('K002', 'Honda Brio', 250000, 40000),
            new Motor('K003', 'Honda Beat', 75000),
            new Motor('K004', 'Yamaha NMAX', 100000),
        ];

        // Skenario uji: sewa, sewa ulang (harus ditolak), lalu kembalikan.
        $log = [];
        $log[] = $daftarKendaraan[0]->sewa();       // berhasil disewa
        $log[] = $daftarKendaraan[0]->sewa();       // ditolak, sudah disewa
        $log[] = $daftarKendaraan[0]->kembalikan();  // berhasil dikembalikan

        $output = "=== Log Uji Coba ===\n";
        foreach ($log as $pesan) {
            $output .= "- {$pesan}\n";
        }

        $output .= "\n=== Daftar Kendaraan ===\n";
        $lamaSewa = 3; // hari, dipakai untuk contoh perhitungan biaya
        foreach ($daftarKendaraan as $kendaraan) {
            $jenis = ($kendaraan instanceof Mobil) ? 'Mobil' : 'Motor';
            $biaya = $kendaraan->hitungBiaya($lamaSewa);

            $output .= "Kode: {$kendaraan->getKode()}\n";
            $output .= "Jenis: {$jenis}\n";
            $output .= "Merek: {$kendaraan->getMerek()}\n";
            $output .= "Status: {$kendaraan->getStatus()}\n";
            $output .= "Biaya sewa {$lamaSewa} hari: Rp" . number_format($biaya, 0, ',', '.') . "\n\n";
        }

        return response('<pre>' . e($output) . '</pre>');
    }
}
