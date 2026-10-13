@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
<div class="heading"><div><h1>Tambah Kategori</h1><p class="muted">Buat kelompok inventaris baru.</p></div></div>
<section class="panel"><form method="POST" action="{{ route('kategori.store') }}">@csrf @include('kategori._form', ['tombol' => 'Simpan Kategori'])</form></section>
@endsection
