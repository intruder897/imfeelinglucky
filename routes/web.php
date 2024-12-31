<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PlayGameController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'auth']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/home', HomeController::class)->name('home');
});

Route::prefix('page')->name('page.')->group(function () {
    Route::get('/{page:uuid}', [PageController::class, 'page'])->name('view');
    Route::post('/{page:uuid}/play', PlayGameController::class)->name('play');
    Route::post('/{page:uuid}/activate', [PageController::class, 'activate'])->name('activate');
    Route::post('/{page:uuid}/update_key', [PageController::class, 'updateKey'])->name('update_key');
    Route::post('/{page:uuid}/deactivate', [PageController::class, 'deactivate'])->name('deactivate');

    Route::post('/{page:uuid}/history', HistoryController::class)->name('history');
});
