@extends('layouts.app')
@section('title', 'Edit Barang')
@section('content')
<div class="heading"><div><h1>Edit Barang</h1><p class="muted">Perbarui informasi untuk {{ $barang->nama }}.</p></div></div>
<section class="panel"><form method="POST" action="{{ route('barang.update', $barang) }}">@csrf @method('PUT') @include('barang._form', ['tombol' => 'Simpan Perubahan'])</form></section>
@endsection
