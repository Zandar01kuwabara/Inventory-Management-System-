@extends('layouts.app')
@section('title', 'Tambah Barang')
@section('content')
<div class="heading"><div><h1>Tambah Barang</h1><p class="muted">Masukkan data inventaris baru ke dalam sistem.</p></div></div>
<section class="panel"><form method="POST" action="{{ route('barang.store') }}">@csrf @include('barang._form', ['tombol' => 'Simpan Barang'])</form></section>
@endsection
