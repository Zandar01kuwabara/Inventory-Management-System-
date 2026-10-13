@extends('layouts.app')
@section('title', 'Data Barang')
@section('content')
<div class="heading"><div><h1>Data Barang</h1><p class="muted">Kelola identitas, jumlah, lokasi, dan kondisi inventaris.</p></div><a class="btn" href="{{ route('barang.create') }}">＋ Barang Baru</a></div>
<section class="panel">
    <form class="panel-head" method="GET" action="{{ route('barang.index') }}">
        <div><h2>Daftar inventaris</h2><p class="muted" style="margin-top:5px">{{ $barang->total() }} data terdaftar</p></div>
        <div class="filters"><input name="q" value="{{ request('q') }}" placeholder="Cari kode, nama, lokasi..."><select name="kategori_id"><option value="">Semua kategori</option>@foreach($kategori as $k)<option value="{{ $k->id }}" @selected(request('kategori_id') == $k->id)>{{ $k->nama }}</option>@endforeach</select><button class="btn" type="submit">Cari</button><a class="btn secondary" href="{{ route('barang.index') }}">Reset</a></div>
    </form>
    <div class="table-wrap"><table><thead><tr><th>Kode / Nama</th><th>Kategori</th><th>Lokasi</th><th>Jumlah</th><th>Kondisi</th><th>Aksi</th></tr></thead><tbody>
    @forelse($barang as $item)
        <tr><td><strong>{{ $item->nama }}</strong><div class="muted" style="font-size:12px;margin-top:4px">{{ $item->kode_barang }}</div></td><td>{{ $item->kategori->nama }}</td><td>{{ $item->lokasi }}</td><td>{{ $item->jumlah }} <span class="muted">unit</span><div style="margin-top:5px"><span class="pill {{ $item->status_stok === 'Menipis' ? 'warn' : '' }}">{{ $item->status_stok }}</span></div></td><td>@if($item->kondisi === 'Baik')<span class="pill">Baik</span>@elseif($item->kondisi === 'Rusak')<span class="pill bad">Rusak</span>@else<span class="pill warn">Perlu Perbaikan</span>@endif</td><td><div class="actions"><a class="btn secondary" href="{{ route('barang.show', $item) }}">Detail</a><a class="btn secondary" href="{{ route('barang.edit', $item) }}">Edit</a><form method="POST" action="{{ route('barang.destroy', $item) }}" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Hapus</button></form></div></td></tr>
    @empty<tr><td colspan="6" style="text-align:center;padding:30px;color:#667085">Data tidak ditemukan. Tambahkan barang baru atau ubah kata pencarian.</td></tr>@endforelse
    </tbody></table></div>
    <div class="pagination">{{ $barang->links() }}</div>
</section>
@endsection
