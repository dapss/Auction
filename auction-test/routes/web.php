<?php

use App\Http\Controllers\CRUD;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LelangController;
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

Route::get('/dashboard', [CRUD::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/detail', [DataController::class, 'detail']);
Route::get('/add', [DataController::class, 'add']);
Route::get('/detail', [CRUD::class, 'show']);



Route::post('addCRUD', [CRUD::class, 'addCRUD']);
Route::resource('detail', CRUD::class);
// Route::get('/delete/{id}', [CRUD::class]);
Route::delete('/detail/{id}', [CRUD::class])->name('destroy');




Route::get('/edit/{id}', [CRUD::class, 'edit']);
Route::post('update', [CRUD::class, 'update'])->name('update');

// Route::get('/edit', [DataController::class, 'edit']);
// Route::get('/edit', function () {
//     return view('editPage');
// });



Route::post('start', [LelangController::class, 'create']);
Route::get('/auction', [LelangController::class, 'index'])->name('auction');
// Route::get('/auction', [CRUD::class, 'index'])->name('auction');
Route::get('/start-auction', [DataController::class, 'start']);

Route::post('updateLelang', [LelangController::class, 'update'])->name('updateLelang');
Route::get('/bid/{id}', [LelangController::class, 'bid']);

Route::get('/start-auction/{id}', [LelangController::class, 'index2']);
// Route::get('/auction', [LelangController::class, 'index3']);




Route::get('/test', function () {
    return "test";
});


// Route::resource('/dashboard', DashboardController::class);


require __DIR__.'/auth.php';
