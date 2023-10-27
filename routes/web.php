<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [MovieController::class, 'I'])->middleware('auth');


Route::get('/',[MovieController::class, 'index']);
Route::get('/movies',[MovieController::class, 'movies']);
Route::get('/tv-shows',[MovieController::class, 'tvShows']);
Route::get('/search',[MovieController::class, 'search']);
Route::get('/movie/{id}',[MovieController::class, 'movieDetails']);
Route::get('/tv/{id}',[MovieController::class, 'tvDetails']);

// Route::get('/login', [SessionController::class, 'index']);
// Route::post('/film/login', [SessionController::class, 'login']);
// Route::get('/logout', [SessionController::class, 'logout']);

// Route::get('/register', [SessionController::class, 'register']);
// Route::post('/film/create', [SessionController::class, 'create']);


// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });