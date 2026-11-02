<?php

namespace App\Http\Controllers;

use App\Models\ProdukKue;
use App\Models\KategoriKue;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // PENERAPAN ELOQUENT ORM
        $totalProduk = ProdukKue::count();
        $totalKategori = KategoriKue::count();
        $totalUser = User::count();

        // PENERAPAN QUERY BUILDER
        $totalPelanggan = DB::table('pelanggan')->count();

        // Query Builder: menampilkan stok menipis
        $stokMenipis = DB::table('produk_kues')
            ->select('id', 'nama_kue', 'kategori', 'stok', 'harga')
            ->where('stok', '<=', 5)
            ->orderBy('stok', 'asc')
            ->orderBy('nama_kue', 'asc')
            ->get();

        // Query Builder: jumlah produk berdasarkan kategori
        $produkPerKategori = DB::table('produk_kues')
            ->select('kategori', DB::raw('COUNT(*) as jumlah_produk'))
            ->groupBy('kategori')
            ->orderBy('kategori')
            ->get();

        // Eloquent: lima produk terbaru
        $produkTerbaru = ProdukKue::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalPelanggan',
            'totalUser',
            'stokMenipis',
            'produkPerKategori',
            'produkTerbaru'
        ));
    }
}
