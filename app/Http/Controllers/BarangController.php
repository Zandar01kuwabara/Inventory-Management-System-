<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::with('kategori')
            ->when($request->filled('q'), function ($query) use ($request) {
                $q = $request->string('q')->toString();
                $query->where(function ($sub) use ($q) {
                    $sub->where('nama', 'like', "%{$q}%")
                        ->orWhere('kode_barang', 'like', "%{$q}%")
                        ->orWhere('lokasi', 'like', "%{$q}%");
                });
            })
            ->when($request->filled('kategori_id'), fn ($query) =>
                $query->where('kategori_id', $request->integer('kategori_id')))
            ->orderBy('nama')
            ->paginate(8)
            ->withQueryString();

        return view('barang.index', [
            'barang' => $barang,
            'kategori' => Kategori::orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('barang.create', ['kategori' => Kategori::orderBy('nama')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang' => ['required', 'string', 'max:30', 'unique:barang,kode_barang'],
            'nama' => ['required', 'string', 'max:120'],
            'kategori_id' => ['required', 'exists:kategori,id'],
            'lokasi' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:0'],
            'stok_minimum' => ['required', 'integer', 'min:0'],
            'harga_satuan' => ['required', 'numeric', 'min:0'],
            'kondisi' => ['required', Rule::in(['Baik', 'Perlu Perbaikan', 'Rusak'])],
        ]);

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', ['barang' => $barang->load('kategori')]);
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'barang' => $barang,
            'kategori' => Kategori::orderBy('nama')->get(),
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'kode_barang' => ['required', 'string', 'max:30', Rule::unique('barang', 'kode_barang')->ignore($barang->id)],
            'nama' => ['required', 'string', 'max:120'],
            'kategori_id' => ['required', 'exists:kategori,id'],
            'lokasi' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:0'],
            'stok_minimum' => ['required', 'integer', 'min:0'],
            'harga_satuan' => ['required', 'numeric', 'min:0'],
            'kondisi' => ['required', Rule::in(['Baik', 'Perlu Perbaikan', 'Rusak'])],
        ]);

        $barang->update($data);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
