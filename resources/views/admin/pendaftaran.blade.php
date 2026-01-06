{{-- <h2>Data Pendaftaran</h2>

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
            
        </td>
    </tr>
    @endforeach
</table>

            <a href="/admin/bib/{{ $d->id }}" style="padding: 5px 10px; background-color: blue; color: white; text-decoration: none; display: inline-block;">Cetak BIB</a> --}}