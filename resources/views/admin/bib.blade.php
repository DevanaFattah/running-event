<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            border: 2px solid black;
            padding: 30px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>NOMOR PESERTA</h2>
    <hr>

    <h1>{{ $data->bib }}</h1>

        <h2>NOMOR PESERTA</h2>

        <h1>{{ $pendaftaran->bib }}</h1>
        
        <p>{{ $pendaftaran->event->nama_event }}</p>

</div>

</body>
</html>
