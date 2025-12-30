<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-yellow-100 text-gray-800 font-sans">
    {{ $slot }}
    @fluxScripts
</body>
</html>