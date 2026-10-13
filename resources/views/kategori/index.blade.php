@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
<div class="heading"><div><h1>Kategori Barang</h1><p class="muted">Kelompokkan inventaris agar pencarian dan pengelolaan lebih teratur.</p></div><a class="btn" href="{{ route('kategori.create') }}">＋ Kategori Baru</a></div>
<section class="panel"><div class="panel-head"><h2>Semua kategori</h2><span class="muted">{{ $kategori->total() }} kategori</span></div>
<div class="table-wrap"><table><thead><tr><th>Nama Kategori</th><th>Deskripsi</th><th>Jumlah Barang</th><th>Aksi</th></tr></thead><tbody>
@forelse($kategori as $k)<tr><td><strong>{{ $k->nama }}</strong></td><td>{{ $k->deskripsi ?: '—' }}</td><td>{{ $k->barang_count }} item</td><td><div class="actions"><a class="btn secondary" href="{{ route('kategori.edit', $k) }}">Edit</a><form method="POST" action="{{ route('kategori.destroy', $k) }}" onsubmit="return confirm('Hapus kategori ini?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Hapus</button></form></div></td></tr>
@empty<tr><td colspan="4">Belum ada kategori.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ $kategori->links() }}</div></section>
@endsection
