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

    <select name="event_id">
        <option value="1">5 KM</option>
        <option value="2">10 KM</option>
    </select>

    <button type="submit">Daftar</button>
</form>