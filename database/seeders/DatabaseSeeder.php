<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $alatTulis = Kategori::create([
            'nama' => 'Alat Tulis',
            'deskripsi' => 'Perlengkapan tulis dan kebutuhan administrasi.',
        ]);
        $elektronik = Kategori::create([
            'nama' => 'Elektronik',
            'deskripsi' => 'Perangkat elektronik untuk menunjang pekerjaan.',
        ]);
        $perlengkapan = Kategori::create([
            'nama' => 'Perlengkapan Ruang',
            'deskripsi' => 'Barang yang digunakan di ruang kerja.',
        ]);

        $items = [
            ['AT-001', 'Buku Catatan A5', $alatTulis->id, 'Lemari A-1', 35, 10, 12000, 'Baik'],
            ['AT-002', 'Pulpen Hitam', $alatTulis->id, 'Lemari A-1', 8, 15, 3500, 'Baik'],
            ['EL-001', 'Lampu Proyektor', $elektronik->id, 'Ruang Rapat', 2, 1, 450000, 'Baik'],
            ['EL-002', 'Kabel HDMI', $elektronik->id, 'Lemari B-2', 4, 3, 65000, 'Perlu Perbaikan'],
            ['PR-001', 'Kursi Lipat', $perlengkapan->id, 'Gudang Utama', 12, 4, 175000, 'Baik'],
            ['PR-002', 'Papan Tulis', $perlengkapan->id, 'Ruang Kelas', 1, 2, 325000, 'Baik'],
        ];

        foreach ($items as [$kode, $nama, $kategoriId, $lokasi, $jumlah, $minimum, $harga, $kondisi]) {
            Barang::create([
                'kode_barang' => $kode,
                'nama' => $nama,
                'kategori_id' => $kategoriId,
                'lokasi' => $lokasi,
                'jumlah' => $jumlah,
                'stok_minimum' => $minimum,
                'harga_satuan' => $harga,
                'kondisi' => $kondisi,
            ]);
        }
    }
}
