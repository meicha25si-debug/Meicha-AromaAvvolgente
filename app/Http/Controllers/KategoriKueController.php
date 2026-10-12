<?php

namespace App\Http\Controllers;

use App\Models\KategoriKue;
use Illuminate\Http\Request;

class KategoriKueController extends Controller
{
    public function index()
    {
        $kategoriKues = KategoriKue::latest()->get();

        return view('admin.kategori-kue.index', compact('kategoriKues'));
    }

    public function create()
    {
        return view('admin.kategori-kue.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriKue::create($validated);

        return redirect()
            ->route('kategori-kue.index')
            ->with('success', 'Kategori kue berhasil ditambahkan!');
    }

    public function edit(KategoriKue $kategoriKue)
    {
        return view('admin.kategori-kue.edit', compact('kategoriKue'));
    }

    public function update(Request $request, KategoriKue $kategoriKue)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategoriKue->update($validated);

        return redirect()
            ->route('kategori-kue.index')
            ->with('success', 'Kategori kue berhasil diperbarui!');
    }

    public function destroy(KategoriKue $kategoriKue)
    {
        $kategoriKue->delete();

        return redirect()
            ->route('kategori-kue.index')
            ->with('success', 'Kategori kue berhasil dihapus!');
    }
}
