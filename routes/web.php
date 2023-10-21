<?php

use App\Models\Owner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\TransactionController;
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
//default routes
Auth::routes(['verify' => true]);

Route::get('/home', [TransactionController::class, 'index'])->name('home')->middleware('verified');

Route::get('/', function(){
    return view('auth.login');
})->middleware('guest');

//routes for the service controller
Route::get('/services',[ServiceController::class, 'index'])->middleware('verified');

Route::get('/service/{id}',[ServiceController::class, 'show'])->middleware('verified');
Route::get('/service',[ServiceController::class, 'create'])->middleware('verified');
Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->middleware('verified');

Route::post('/service', [ServiceController::class, 'store'])->middleware('verified');
Route::put('/service/{id}/edit', [ServiceController::class, 'update'])->middleware('verified');
Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->middleware('verified');

//ui and ux stuff
Route::post('/services/search/', [ServiceController::class, 'search'])->middleware('verified');


Route::get('/select-a-role', [RegisterController::class, 'select_a_role']);

Route::get('/register/{id}', [RegisterController::class, 'register_role']);


// Route::get('/service/{id}',[ServiceController::class, 'show'])->middleware('verified');
Route::get('/service/{serviceId}/pet',[PetController::class, 'create'])->middleware('verified');
Route::post('/service/{serviceId}/pet', [PetController::class, 'store'])->middleware('verified');
// Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->middleware('verified');

// Route::post('/service', [ServiceController::class, 'store'])->middleware('verified');
// Route::put('/service/{id}/edit', [ServiceController::class, 'update'])->middleware('verified');
// Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->middleware('verified');
