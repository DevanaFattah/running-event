<form action="/daftar" method="POST">
    @csrf

    <input type="text" name="nama" placeholder="Nama Lengkap">
    <input type="text" name="nomor_telepon" placeholder="Nomor Telepon">
    <input type="email" name="email" placeholder="Email">
    <input type="number" name="umur" placeholder="Umur">

    <select name="jenis_kelamin">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>

    <label>Kategori Lomba</label>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="5K">5 KM</option>
        <option value="10K">10 KM</option>
    </select>

    <input type="hidden" name="event_id" value="1">

    <button type="submit">Daftar</button>
</form>