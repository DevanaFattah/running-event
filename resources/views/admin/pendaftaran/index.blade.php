@foreach($pendaftarans as $p)
<tr>
    <td>{{ $p->peserta->nama }}</td>
    <td>{{ $p->event->nama_event }}</td>
    <td>{{ $p->bib }}</td>

    <td>
        @if($p->status_bib == 'belum_diambil')
            <span style="color:red">Belum Diambil</span>
        @else
            <span style="color:green">Sudah Diambil</span>
        @endif
    </td>

    <td>
        <form action="{{ route('pendaftaran.ambilBib', $p->id) }}" method="POST" style="display:inline;">
            @csrf
            @if($p->status_bib == 'belum_diambil')
                <button type="submit" style="background-color: green; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                    Tandai Sudah Diambil
                </button>
            @else
                <button type="submit" style="background-color: orange; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                    Tandai Belum Diambil
                </button>
            @endif
        </form>
    </td>
</tr>
@endforeach
