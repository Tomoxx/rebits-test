<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleOwnershipHistoryController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Vehicle;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/test', function () {

//     $vehicle = Vehicle::find(2);
//     $user = User::find(1);

//     return dd($user->vehicles);
// });

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle.index');
Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/vehicle/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::put('/vehicle/{vehicle}/update', [VehicleController::class, 'update'])->name('vehicle.update');
Route::delete('/vehicle/{vehicle}/destroy', [VehicleController::class, 'destroy'])->name('vehicle.destroy');

Route::get('/vehiclehistory', [VehicleOwnershipHistoryController::class, 'index'])->name('history.index');