<h2>Data Event</h2>

<a href="/admin/event/create" style="margin-bottom: 20px; display: inline-block; padding: 10px 20px; background: blue; color: white; text-decoration: none; border-radius: 5px;">Tambah Event</a>

<table border="1" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <tr>
        <th style="padding: 10px; text-align: left;">Nama Event</th>
        <th style="padding: 10px; text-align: left;">Tanggal</th>
        <th style="padding: 10px; text-align: left;">Lokasi</th>
        <th style="padding: 10px; text-align: left;">Aksi</th>
    </tr>
    @forelse($events as $e)
    <tr>
        <td style="padding: 10px;">{{ $e->nama_event }}</td>
        <td style="padding: 10px;">{{ $e->tanggal }}</td>
        <td style="padding: 10px;">{{ $e->lokasi }}</td>
        <td style="padding: 10px;">
            <a href="/admin/event/{{ $e->id }}/edit" style="color: green; text-decoration: none;">Edit</a> |
            <form action="/admin/event/{{ $e->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin dihapus?')" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline;">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4" style="padding: 10px; text-align: center;">Tidak ada event</td>
    </tr>
    @endforelse
</table>
