<h2>Buat Event Baru</h2>

@if($errors->any())
<div style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
    <strong>Terjadi Kesalahan:</strong>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<style>
    .input-error { border-color: red !important; }
</style>

<form method="POST" action="/admin/event" style="max-width: 500px;">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Nama Event</label>
        <input name="nama_event" placeholder="Nama Event" value="{{ old('nama_event') }}" class="{{ $errors->has('nama_event') ? 'input-error' : '' }}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        @error('nama_event')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="{{ $errors->has('tanggal') ? 'input-error' : '' }}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        @error('tanggal')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Lokasi</label>
        <input name="lokasi" placeholder="Lokasi" value="{{ old('lokasi') }}" class="{{ $errors->has('lokasi') ? 'input-error' : '' }}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        @error('lokasi')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px;">Deskripsi</label>
        <textarea name="deskripsi" placeholder="Deskripsi" class="{{ $errors->has('deskripsi') ? 'input-error' : '' }}" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; min-height: 100px;">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')<span style="color: red; font-size: 12px;">{{ $message }}</span>@enderror
    </div>
    
    <button type="submit" style="padding: 10px 20px; background: blue; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
    <a href="/admin/event" style="margin-left: 10px; padding: 10px 20px; background: gray; color: white; text-decoration: none; border-radius: 4px; display: inline-block;">Kembali</a>
</form>
