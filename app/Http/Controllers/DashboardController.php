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
        // =====================================
        // PENERAPAN ELOQUENT ORM
        // =====================================

        $totalProduk = ProdukKue::count();
        $totalKategori = KategoriKue::count();
        $totalUser = User::count();

        // Eloquent: lima produk terbaru
        $produkTerbaru = ProdukKue::latest()
            ->take(5)
            ->get();


        // =====================================
        // PENERAPAN QUERY BUILDER
        // =====================================

        // Menghitung seluruh pelanggan
        $totalPelanggan = DB::table('pelanggan')
            ->count();


        // =====================================
        // 1. LEFT JOIN
        // Menampilkan stok produk dan kategorinya
        // =====================================

        $stokMenipis = DB::table('produk_kues')
            ->leftJoin(
                'kategori_kues',
                'produk_kues.kategori_id',
                '=',
                'kategori_kues.id'
            )
            ->select(
                'produk_kues.id',
                'produk_kues.nama_produk as nama_kue',
                'kategori_kues.nama_kategori as kategori',
                'produk_kues.stok',
                'produk_kues.harga'
            )
            ->where('produk_kues.stok', '<=', 5)
            ->orderBy('produk_kues.stok', 'asc')
            ->orderBy('produk_kues.nama_produk', 'asc')
            ->get();


        // =====================================
        // 2. INNER JOIN
        // Menggabungkan produk dan kategori
        // =====================================

        $produkDenganKategori = DB::table('produk_kues')
            ->join(
                'kategori_kues',
                'produk_kues.kategori_id',
                '=',
                'kategori_kues.id'
            )
            ->select(
                'produk_kues.id',
                'produk_kues.nama_produk',
                'kategori_kues.nama_kategori',
                'produk_kues.harga',
                'produk_kues.stok'
            )
            ->get();


        // =====================================
        // 3. LEFT JOIN
        // Menampilkan seluruh kategori dan jumlah produk
        // =====================================

        $produkPerKategori = DB::table('kategori_kues')
            ->leftJoin(
                'produk_kues',
                'kategori_kues.id',
                '=',
                'produk_kues.kategori_id'
            )
            ->select(
                'kategori_kues.nama_kategori as kategori',
                DB::raw('COUNT(produk_kues.id) as jumlah_produk')
            )
            ->groupBy(
                'kategori_kues.id',
                'kategori_kues.nama_kategori'
            )
            ->orderBy('kategori_kues.nama_kategori')
            ->get();


        // =====================================
        // 4. NESTED WHERE
        // Produk stok sedikit ATAU harga tinggi
        // =====================================

        $produkFilter = DB::table('produk_kues')
            ->leftJoin(
                'kategori_kues',
                'produk_kues.kategori_id',
                '=',
                'kategori_kues.id'
            )
            ->select(
                'produk_kues.nama_produk',
                'kategori_kues.nama_kategori',
                'produk_kues.harga',
                'produk_kues.stok'
            )
            ->where(function ($query) {
                $query->where('produk_kues.stok', '<=', 5)
                    ->orWhere('produk_kues.harga', '>=', 50000);
            })
            ->orderBy('produk_kues.nama_produk')
            ->get();


        // =====================================
        // MENAMPILKAN DATA KE DASHBOARD
        // =====================================

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalUser',
            'totalPelanggan',
            'produkTerbaru',
            'stokMenipis',
            'produkPerKategori',
            'produkDenganKategori',
            'produkFilter'
        ));
    }
}
