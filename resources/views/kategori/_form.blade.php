<div class="form-grid">
<div class="field full"><label for="nama">Nama Kategori</label><input id="nama" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}" required maxlength="80" placeholder="Contoh: Peralatan Kebersihan">@error('nama')<small>{{ $message }}</small>@enderror</div>
<div class="field full"><label for="deskripsi">Deskripsi</label><textarea id="deskripsi" name="deskripsi" rows="3" maxlength="255" placeholder="Keterangan singkat kategori">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>@error('deskripsi')<small>{{ $message }}</small>@enderror</div>
</div><div class="actions" style="margin-top:22px"><button class="btn" type="submit">{{ $tombol }}</button><a class="btn secondary" href="{{ route('kategori.index') }}">Batal</a></div>
