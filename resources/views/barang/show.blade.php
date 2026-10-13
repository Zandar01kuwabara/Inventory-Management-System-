@extends('layouts.app')
@section('title', 'Detail Barang')
@section('content')
<div class="heading"><div><h1>Detail Barang</h1><p class="muted">Informasi lengkap salah satu barang inventaris.</p></div><a class="btn secondary" href="{{ route('barang.index') }}">Kembali</a></div>
<section class="panel"><div class="form-grid">
@foreach(['Kode Barang'=>'kode_barang','Nama Barang'=>'nama','Lokasi'=>'lokasi','Jumlah Unit'=>'jumlah','Stok Minimum'=>'stok_minimum','Harga Satuan'=>'harga_satuan','Kondisi'=>'kondisi'] as $label=>$field)
<div class="field"><label>{{ $label }}</label><div>{{ $barang->$field }}</div></div>
@endforeach
<div class="field"><label>Kategori</label><div>{{ $barang->kategori->nama }}</div></div>
</div><div class="actions" style="margin-top:24px"><a class="btn" href="{{ route('barang.edit', $barang) }}">Edit Barang</a></div></section>
@endsection
