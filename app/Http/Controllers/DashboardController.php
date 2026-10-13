<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahBarang' => Barang::count(),
            'jumlahKategori' => Kategori::count(),
            'totalUnit' => (int) Barang::sum('jumlah'),
            'stokMenipis' => Barang::with('kategori')
                ->whereColumn('jumlah', '<=', 'stok_minimum')
                ->orderBy('jumlah')
                ->take(5)
                ->get(),
        ]);
    }
}
