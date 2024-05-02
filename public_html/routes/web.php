<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\MilitaryController;
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

Route::get("/", [MilitaryController::class, "index"])->name("index");
Route::get("/add-soldier", [PersonnelController::class,"showAddSoldier"])->name("add-soldier");
Route::get('/personnel', [PersonnelController::class, 'showPersonnel'])->name('personnel');
Route::get('/search', [PersonnelController::class, 'search'])->name('search');
Route::get("/ranks", [MilitaryController::class, "showRanks"])->name("ranks");
Route::get("/specs", [MilitaryController::class, "showSpecs"])->name("specs");

Route::get('/personnel/rank-types', [PersonnelController::class, 'showRankTypes'])->name('personnel.rank-types');
Route::get('/personnel/{id?}', [PersonnelController::class, 'showPersonnel'])->name('personnel');


Route::post("/send", [PersonnelController::class,"send"])->name("send");

// Route::get('/', function () {
//     return view('welcome');
// });
