<?php

use App\Http\Controllers\CRUD;
use Illuminate\Support\Facades\Route;
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

Route::get('/start-auction', [DataController::class, 'start']);
Route::get('/detail', [DataController::class, 'detail']);


//Route Barang
Route::get('/add', [CRUD::class, 'create']);
Route::get('/detail', [CRUD::class, 'show']);
Route::post('addCRUD', [CRUD::class, 'store']);
Route::resource('detail', CRUD::class);
// Route::delete('/detail/{id}', [CRUD::class])->name('destroy');
Route::get('/edit/{id}', [CRUD::class, 'edit']);
Route::get('/delete/{id}', [CRUD::class, 'destroy']);
Route::post('update', [CRUD::class, 'update'])->name('update');
Route::get('/dashboard', [CRUD::class, 'index'])->name('dashboard');


//Route Lelang
Route::resource('auction', CRUD::class);
Route::post('start', [LelangController::class, 'create']);
Route::get('/auction', [LelangController::class, 'index'])->name('auction');
Route::post('updateLelang', [LelangController::class, 'update'])->name('updateLelang');
Route::get('/bid/{id}', [LelangController::class, 'bid']);
Route::get('/start-auction/{id}', [LelangController::class, 'index2']);
// Route::delete('/detail/{id}', [LelangController::class])->name('destroy');
Route::get('/test', function () {
    return "test";
});


//Route History
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('close', [HistoryController::class, 'create']);
Route::get('/close/{id}', [HistoryController::class, 'index2']);
Route::get('/pdf', [HistoryController::class, 'pdf']);
Route::post('close', [HistoryController::class, 'store']);


// Route::resource('/dashboard', DashboardController::class);


require __DIR__.'/auth.php';
