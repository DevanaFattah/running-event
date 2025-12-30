<h2>Data Pendaftaran</h2>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>No HP</th>
        <th>Event</th>
        <th>BIB</th>
        <th>Status BIB</th>
        <th>Aksi</th>
    </tr>

    @foreach($pendaftarans as $d)
    <tr>
        <td>{{ $d->peserta->nama ?? 'N/A' }}</td>
        <td>{{ $d->peserta->nomor_telepon ?? 'N/A' }}</td>
        <td>{{ $d->event->nama_event ?? 'N/A' }}</td>
        <td>{{ $d->bib }}</td>
        <td>
            @if($d->status_bib == 'belum_diambil')
                <span style="color:red">Belum Diambil</span>
            @else
                <span style="color:green">Sudah Diambil</span>
            @endif
        </td>
        <td>
            <form action="{{ route('pendaftaran.ambilBib', $d->id) }}" method="POST" style="display:inline;">
                @csrf
                @if($d->status_bib == 'belum_diambil')
                    <button type="submit" style="background-color: green; color: white; padding: 5px 10px; border: none; cursor: pointer; margin-right: 5px;">
                        Tandai Sudah Diambil
                    </button>
                @else
                    <button type="submit" style="background-color: orange; color: white; padding: 5px 10px; border: none; cursor: pointer; margin-right: 5px;">
                        Tandai Belum Diambil
                    </button>
                @endif
            </form>
            <a href="/admin/bib/{{ $d->id }}" style="padding: 5px 10px; background-color: blue; color: white; text-decoration: none; display: inline-block;">Cetak BIB</a>
        </td>
    </tr>
    @endforeach
</table>
