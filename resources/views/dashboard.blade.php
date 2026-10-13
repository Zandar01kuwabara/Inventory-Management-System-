@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="heading"><div><h1>Ringkasan Inventaris</h1><p class="muted">Pantau ketersediaan barang dan kondisi stok dalam satu halaman.</p></div><a class="btn" href="{{ route('barang.create') }}">＋ Tambah Barang</a></div>
<div class="grid">
    <div class="stat"><div class="label">Jenis Barang</div><div class="value">{{ $jumlahBarang }}</div><p class="muted">item terdaftar</p></div>
    <div class="stat"><div class="label">Kategori</div><div class="value">{{ $jumlahKategori }}</div><p class="muted">kelompok barang</p></div>
    <div class="stat"><div class="label">Total Unit</div><div class="value">{{ number_format($totalUnit, 0, ',', '.') }}</div><p class="muted">unit tercatat</p></div>
    <div class="stat"><div class="label">Perlu Perhatian</div><div class="value" style="color:#b76e00">{{ $stokMenipis->count() }}</div><p class="muted">stok mencapai batas minimum</p></div>
</div>
<section class="panel">
    <div class="panel-head"><div><h2>Daftar stok yang perlu diperiksa</h2><p class="muted" style="margin-top:5px">Barang dengan jumlah sama dengan atau di bawah stok minimum.</p></div><a href="{{ route('barang.index') }}" class="btn secondary">Lihat semua</a></div>
    <div class="table-wrap"><table><thead><tr><th>Kode</th><th>Nama barang</th><th>Kategori</th><th>Jumlah</th><th>Status</th></tr></thead><tbody>
    @forelse($stokMenipis as $item)
        <tr><td>{{ $item->kode_barang }}</td><td><strong>{{ $item->nama }}</strong></td><td>{{ $item->kategori->nama }}</td><td>{{ $item->jumlah }} unit</td><td><span class="pill warn">Stok menipis</span></td></tr>
    @empty<tr><td colspan="5" style="text-align:center;color:#667085;padding:26px">Semua stok berada di atas batas minimum.</td></tr>@endforelse
    </tbody></table></div>
</section>
@endsection
