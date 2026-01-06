<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: #f5f5f5;
        }
        .card {
            border: 3px solid black;
            padding: 50px;
            width: 400px;
            text-align: center;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .card h2 {
            margin: 0 0 20px 0;
            font-size: 14px;
            letter-spacing: 2px;
            color: #333;
        }
        .card .bib-number {
            font-size: 48px;
            font-weight: bold;
            margin: 30px 0;
            color: black;
        }
        .card .nama-peserta {
            font-size: 20px;
            margin: 30px 0;
            color: #333;
        }
        hr {
            border: none;
            border-top: 2px solid black;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>NOMOR PESERTA</h2>
    <div class="bib-number">{{ $pendaftaran->bib }}</div>
    <hr>
    <div class="nama-peserta">{{ $pendaftaran->peserta->nama }}</div>
</div>

</body>
</html>
