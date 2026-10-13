@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')
<div class="heading"><div><h1>Edit Kategori</h1><p class="muted">Perbarui kategori {{ $kategori->nama }}.</p></div></div>
<section class="panel"><form method="POST" action="{{ route('kategori.update', $kategori) }}">@csrf @method('PUT') @include('kategori._form', ['tombol' => 'Simpan Perubahan'])</form></section>
@endsection
