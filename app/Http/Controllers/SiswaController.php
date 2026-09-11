<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        // Uji dengan nilai di bawah 75, tepat 75, dan di atas 75.
        $daftarSiswa = [
            new Siswa('Andi', '1001', 'XI PPLG 1', 85),
            new Siswa('Budi', '1002', 'XI PPLG 1', 70),
            new Siswa('Citra', '1003', 'XI PPLG 2', 75),
        ];

        $output = '';
        foreach ($daftarSiswa as $siswa) {
            $output .= $siswa->tampilkanData() . "\n";
        }

        return response('<pre>' . e($output) . '</pre>');
    }
}
