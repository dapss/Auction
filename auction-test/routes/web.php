<?php

use App\Http\Controllers\CRUD;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/start-auction', [DataController::class, 'start'])->middleware(['auth', 'can:view-petugas-dashboard']);
// Route::get('/detail', [DataController::class, 'detail']);


//Route Barang
Route::get('/add', [CRUD::class, 'create'])->middleware(['auth', 'can:both', 'verified']);
Route::get('/detail', [CRUD::class, 'show'])->middleware(['auth', 'verified']);
Route::post('addCRUD', [CRUD::class, 'store']);
Route::resource('detail', CRUD::class);
// Route::delete('/detail/{id}', [CRUD::class])->name('destroy');
Route::get('/edit/{id}', [CRUD::class, 'edit'])->middleware(['auth', 'can:both', 'verified']);
Route::get('/delete/{id}', [CRUD::class, 'destroy'])->middleware(['auth', 'can:both', 'verified']);
Route::post('update', [CRUD::class, 'update'])->name('update');
Route::get('/dashboard', [CRUD::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


//Route Lelang
Route::resource('auction', CRUD::class);
Route::post('start', [LelangController::class, 'create']);
Route::get('/auction', [LelangController::class, 'index'])->middleware(['auth', 'verified'])->name('auction');
Route::post('updateLelang', [LelangController::class, 'update'])->name('updateLelang');
Route::get('/bid/{id}', [LelangController::class, 'bid'])->middleware(['auth', 'can:view-user-dashboard', 'verified']);
Route::get('/start-auction/{id}', [LelangController::class, 'index2'])->middleware(['auth', 'can:view-petugas-dashboard', 'verified']);
Route::get('/details', [LelangController::class, 'show'])->middleware(['auth', 'verified']);
Route::resource('details', LelangController::class);
Route::get('/test', function () {
    return "test";
});


//Route History
Route::get('/history', [HistoryController::class, 'index'])->middleware(['auth', 'can:both', 'verified'])->name('history');
Route::get('/bid-history', [BidController::class, 'index'])->middleware(['auth', 'verified'])->name('bid-history');
Route::get('close', [HistoryController::class, 'create']);
Route::get('/close/{id}', [HistoryController::class, 'index2'])->middleware(['auth', 'can:view-petugas-dashboard', 'verified']);
// Route::get('/pdf', [HistoryController::class, 'pdf'])->middleware(['auth', 'can:both']);
Route::post('close', [HistoryController::class, 'store']);


//route pdf
Route::get('/export-pdf', [HistoryController::class, 'exportPDF'])->middleware(['auth', 'can:both', 'verified']);



require __DIR__ . '/auth.php';