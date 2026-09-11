<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        table { border-collapse: collapse; width: 100%; margin-top: 1rem; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #f2f2f2; }
        .habis { color: #b00020; font-weight: bold; }
        .tersedia { color: #1b7a1b; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>
    <p>Jumlah seluruh produk: <strong>{{ $jumlahProduk }}</strong></p>

    @if(!empty($produkTerbanyak))
        <p>Produk dengan stok paling banyak: <strong>{{ $produkTerbanyak['nama'] }}</strong> ({{ $produkTerbanyak['stok'] }} pcs)</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['kategori'] }}</td>
                    <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['stok'] }}</td>
                    <td class="{{ $item['stok'] > 0 ? 'tersedia' : 'habis' }}">
                        {{ $item['stok'] > 0 ? 'Tersedia' : 'Habis' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Produk yang Masih Tersedia</h2>
    <ul>
        @foreach ($produkTersedia as $item)
            <li>{{ $item['nama'] }} - {{ $item['stok'] }} pcs</li>
        @endforeach
    </ul>
</body>
</html>
