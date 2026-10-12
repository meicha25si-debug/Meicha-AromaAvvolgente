<?php

namespace App\Http\Controllers;

use App\Models\ProdukKue;
use Illuminate\Http\Request;

class ProdukKueController extends Controller
{

    public function index()
    {
        $produkKues = ProdukKue::latest()->get();

        return view('admin.produk-kue.index', compact('produkKues'));
    }

    public function create()
    {
        return view('admin.produk-kue.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kue' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        ProdukKue::create($validated);

        return redirect()
            ->route('produk-kue.index')
            ->with('success', 'Produk kue berhasil ditambahkan!');
    }

    public function edit(ProdukKue $produkKue)
    {
        return view('admin.produk-kue.edit', compact('produkKue'));
    }

    public function update(Request $request, ProdukKue $produkKue)
    {
        $validated = $request->validate([
            'nama_kue' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produkKue->update($validated);

        return redirect()
            ->route('produk-kue.index')
            ->with('success', 'Produk kue berhasil diperbarui!');
    }

    public function destroy(ProdukKue $produkKue)
    {
        $produkKue->delete();

        return redirect()
            ->route('produk-kue.index')
            ->with('success', 'Produk kue berhasil dihapus!');
    }
}
