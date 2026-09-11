<?php

namespace App\Http\Controllers;

use App\Services\ProdukService;

class ProdukController extends Controller
{
    protected ProdukService $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    public function index()
    {
        $produk = $this->produkService->getAllProduk();

        // Data tambahan untuk fitur bonus, dikirim juga lewat compact().
        $jumlahProduk    = $this->produkService->jumlahSeluruhProduk($produk);
        $produkTersedia  = $this->produkService->filterTersedia($produk);
        $produkTerbanyak = $this->produkService->produkStokTerbanyak($produk);

        return view('produk.index', compact(
            'produk',
            'jumlahProduk',
            'produkTersedia',
            'produkTerbanyak'
        ));
    }
}
