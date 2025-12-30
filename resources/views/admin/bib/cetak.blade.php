<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>BIB {{ $pendaftaran->bib }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .bib-container {
            border: 3px solid black;
            padding: 30px;
            max-width: 400px;
            margin: 0 auto;
            border-radius: 10px;
        }
        .bib-number {
            font-size: 48px;
            font-weight: bold;
            margin: 20px 0;
            color: #000;
        }
        .bib-info {
            font-size: 16px;
            margin: 10px 0;
        }
        .bib-name {
            font-size: 20px;
            font-weight: bold;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="bib-container">
        <h2>NOMOR PESERTA</h2>
        <hr>
        <div class="bib-number">{{ $pendaftaran->bib ?? 'NO BIB' }}</div>
        <div class="bib-name">{{ $pendaftaran->peserta->nama ?? 'NAMA TIDAK ADA' }}</div>
        <div class="bib-info">Status: {{ $pendaftaran->status ?? 'STATUS TIDAK ADA' }}</div>
        
        <!-- Debug: Hapus setelah selesai -->
        <hr style="margin-top: 30px;">
        <p style="font-size: 10px; color: gray;">
            ID: {{ $pendaftaran->id ?? 'NONE' }}<br>
            Peserta ID: {{ $pendaftaran->peserta_id ?? 'NONE' }}<br>
            BIB: {{ $pendaftaran->bib ?? 'NONE' }}<br>
            Peserta Nama: {{ $pendaftaran->peserta->nama ?? 'PESERTA NULL' }}
        </p>
    </div>
</body>
</html>
