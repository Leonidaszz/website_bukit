<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\ReservationController;
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



/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::group(['middleware' => ['auth']], function () {
    Route::get('/tiket', [TiketController::class, 'showForm'])->name('show_ticket_form');
    Route::post('/tiket', [TiketController::class, 'submitForm'])->name('submit_ticket');
});

Route::get('/success', [TiketController::class, 'showSuccessPage'])->name('tiket_success');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/meja-cafe', [ReservationController::class, 'showForm'])->name('show_reservation_form');
    Route::post('/meja-cafe', [ReservationController::class, 'submitReservation'])->name('submit_reservation');

});


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/area-keluarga', function () {
    return view('pages.area-keluarga');
});



Route::get('/galeri', function () {
    return view('pages.galeri');
});

Route::get('/news', function () {
    return view('pages.news');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
