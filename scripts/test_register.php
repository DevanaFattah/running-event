<?php

// Simple script to bootstrap Laravel and call the PendaftaranService->daftar()
// Run with: php scripts/test_register.php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\PendaftaranService;

$service = app(PendaftaranService::class);

$data = [
    'nama' => 'Test User',
    'nomor_telepon' => '081234567890',
    'email' => 'testuser+' . time() . '@example.com',
    'jenis_kelamin' => 'L',
    'umur' => 30,
    'event_id' => 1,
    'kategori' => '5K'
];

try {
    $service->daftar($data);
    echo "SUCCESS: pendaftaran dibuat untuk {$data['email']}\n";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
