<?php


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\BibController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use Symfony\Contracts\EventDispatcher\Event;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::post('/daftar', [PendaftaranController::class, 'store']);

/*
| User Dashboard
|--------------------------------------------------------------------------
*/

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::controller(AdminController::class)->group(function () {
    Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('create', 'create')->name('pendaftaran');
        Route::get('create', 'create')->name('admin.create');
    });
});

/*
| Admin Routes (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/pendaftaran', [AdminController::class, 'pendaftaran']);

    Route::post('/pendaftaran/{id}/ambil-bib',
        [AdminController::class, 'ambilBib']
    )->name('pendaftaran.ambilBib');

    Route::get('/bib/{id}', [BibController::class, 'cetak']);

    Route::resource('event', EventController::class);
});

/*
|--------------------------------------------------------------------------
| Settings (Fortify / Volt)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');


Route::resource('event',EventController::class);


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    
    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(
                        Features::twoFactorAuthentication(),
                        'confirmPassword'
                    ),
                    Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

Route::get('/admin/dashboard', 
    [AdminDashboardController::class, 'index']
)->name('admin.dashboard');
});