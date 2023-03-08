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
        "users" => FormUsers::orderby("firstname", "ASC")->get(),
        "vehicles" => Vehicle::all(),
    ]);
//    [ReportController::class, "index"];
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post("dashboard", [ReportController::class, "reportsave"]);

Route::get("/log", [App\Http\Controllers\ReportController::class, "getLog"])->middleware(["auth", "verified"]);
Route::post("/log", [App\Http\Controllers\ReportController::class, "postLog"])->middleware(["auth", "verified"]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Users
 */

Route::any("manschappen", [FormUsersController::class, "index"])->middleware(['auth', 'verified']);

Route::post('/persoontoevoegen', [FormUsersController::class, "persoonToevoegen"])->middleware(['auth', 'verified']);
Route::get('/persoontoevoegen')->middleware(['auth', 'verified']);

Route::post('/updateperson', [FormUsersController::class, "persoonUpdaten"])->middleware(['auth', 'verified']);
Route::get('/updateperson')->middleware(['auth', 'verified']);

Route::post('/deleteperson', [FormUsersController::class, "persoonverwijderen"])->middleware(['auth', 'verified']);
Route::get('/deleteperson', )->middleware(['auth', 'verified']);


/**
 * Voertuigen
 */

Route::get("/voertuigen", function () {
    return view("vehicle", [
        "vehicles" => Vehicle::all(),
    ]);
})->middleware(['auth', 'verified'])->name('voertuigen');

Route::post("/voertuigtoevoegen", [VehicleController::class, "voertuigtoevoegen"])->middleware(['auth', 'verified']);
Route::get("/voertuigtoevoegen", [VehicleController::class, "postGet"])->middleware(['auth', 'verified']);

Route::post("/voertuigupdaten", [VehicleController::class, "voertuigUpdaten"])->middleware(['auth', 'verified']);
Route::get("/voertuigupdaten", [VehicleController::class, "postGet"])->middleware(['auth', 'verified']);

Route::post("/voertuigverwijderen", [VehicleController::class, "voertuigVerwijderen"])->middleware(['auth', 'verified']);
Route::get("/voertuigverwijderen", [VehicleController::class, "postGet"])->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';


