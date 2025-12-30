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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: #f5f5f5;
        }
        .bib-container {
            border: 3px solid black;
            padding: 50px;
            max-width: 400px;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .bib-title {
            font-size: 14px;
            letter-spacing: 2px;
            margin: 0 0 20px 0;
        }
        .bib-number {
            font-size: 48px;
            font-weight: bold;
            margin: 30px 0;
            color: #000;
        }
        hr {
            border: none;
            border-top: 2px solid black;
            margin: 20px 0;
        }
        .bib-name {
            font-size: 20px;
            margin: 30px 0;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="bib-container">
        <div class="bib-title">NOMOR PESERTA</div>
        <hr>
        <div class="bib-number">{{ $pendaftaran->bib }}</div>
        <div class="bib-name">{{ $pendaftaran->peserta->nama }}</div>
    </div>
</body>
</html>
