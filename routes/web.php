<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Report;
use App\Http\Controllers\ReportController;
use App\Models\FormUsers;
use App\Http\Controllers\FormUsersController;
use App\Models\Vehicle;
use App\Http\Controllers\VehicleController;

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

Route::get('/dashboard', function () {
    return view('dashboard', [
        "users" => FormUsers::all(),
        "vehicles" => Vehicle::all(),
    ]);
//    [ReportController::class, "index"];
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post("dashboard", [ReportController::class, "reportsave"]);

Route::get("/log", function () {
    return view("log",
        [
            "Reportlog" => Report::all()
        ]);
})->middleware(['auth', 'verified'])->name("log");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/manschappen", function () {
    return view("users", [
        "users" => FormUsers::all(),
    ]);
});
Route::post('/manschappen', [FormUsersController::class, "persoonToevoegen"]);
Route::post('/updateperson', [FormUsersController::class, "persoonUpdaten"]);
Route::get('/updateperson', [FormUsersController::class, "index"]);

Route::get("/voertuigen", function () {
    return view("vehicle", [
        "vehicles" => Vehicle::all(),
    ]);
});
Route::post('/voertuigen', [VehicleController::class, "addVehicle"]);


require __DIR__ . '/auth.php';
