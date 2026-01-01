<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthorizedController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use Symfony\Contracts\EventDispatcher\Event;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(AuthorizedController::class)->group(function () {
    Route::get('dashboard', 'index')->middleware(['auth', 'verified'])->name('dashboard');
});

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
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

