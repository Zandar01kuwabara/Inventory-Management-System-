<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang', 'nama', 'kategori_id', 'lokasi',
        'jumlah', 'stok_minimum', 'harga_satuan', 'kondisi'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'stok_minimum' => 'integer',
        'harga_satuan' => 'decimal:2',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function getStatusStokAttribute(): string
    {
        return $this->jumlah <= $this->stok_minimum ? 'Menipis' : 'Aman';
    }
}
