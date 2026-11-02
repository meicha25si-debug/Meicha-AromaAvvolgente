<?php

namespace App\Http\Controllers;

use App\Models\ProdukKue;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // QUERY BUILDER: mengambil ringkasan jumlah data dari database.
        $totalProduk = DB::table('produk_kues')->count();
        $totalKategori = DB::table('kategori_kues')->count();
        $totalPelanggan = DB::table('pelanggan')->count();
        $totalUser = DB::table('users')->count();

        // QUERY BUILDER: produk dengan stok menipis (5 atau kurang).
        $stokMenipis = DB::table('produk_kues')
            ->select('id', 'nama_kue', 'kategori', 'stok', 'harga')
            ->where('stok', '<=', 5)
            ->orderBy('stok', 'asc')
            ->orderBy('nama_kue', 'asc')
            ->get();

        // QUERY BUILDER: jumlah produk berdasarkan kategori.
        $produkPerKategori = DB::table('produk_kues')
            ->select('kategori', DB::raw('COUNT(*) as jumlah_produk'))
            ->groupBy('kategori')
            ->orderBy('kategori')
            ->get();

        // ELOQUENT ORM: mengambil lima produk terbaru menggunakan model.
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
