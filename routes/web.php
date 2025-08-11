<?php
// routes/web.php
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Main Menu Route
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Store System Routes
Route::prefix('store')->name('store.')->group(function () {
    
    // Index/Welcome Page
    Route::get('/', [StoreController::class, 'index'])->name('index');
    
    // Scan Slot (QR Slot)
    Route::get('/scan-slot', [StoreController::class, 'scanSlot'])->name('scan-slot');

    // Scan Box
    Route::get('/scan-box', [StoreController::class, 'scanBox'])->name('scan-box');

    // API endpoints for store operations
    Route::post('/scan-slot', [StoreController::class, 'processSlotScan'])->name('scan.slot.process');
    Route::post('/scan-box', [StoreController::class, 'processBoxScan'])->name('scan.box.process');
});

// Pull System Routes
Route::prefix('pull')->name('pull.')->group(function () {
    Route::get('/', function () {
        return view('pull.index');
    })->name('index');
});

// Default redirect to login
Route::get('/', function () {
    return redirect()->route('auth.login');
});
