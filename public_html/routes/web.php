<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\MilitaryController;
use App\Models\Rank;
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
Route::get("/ranks/{id}/personnel", [MilitaryController::class, "showRankPersonnel"])->name("ranks.personnel");
Route::get("/specs", [MilitaryController::class, "showSpecs"])->name("specs");
Route::get("/specs/{id}/personnel", [MilitaryController::class, "showSpecPersonnel"])->name("specs.personnel");
Route::get("/bases", [MilitaryController::class, "showBases"])->name("bases");
Route::get("/bases/{id}", [MilitaryController::class, "showBaseDescription"])->name("show-base");

Route::put('/personnel/update/{id}', [PersonnelController::class, 'update'])->name('personnel.update');
Route::get('/personnel/update-form/{id}', [PersonnelController::class, 'showUpdateSoldier'])->name('personnel.update-form');
Route::delete('/personnel/remove/{id}', [PersonnelController::class, 'removeSoldier'])->name('personnel.remove');
Route::get('/personnel/rank-types', [PersonnelController::class, 'showRankTypes'])->name('personnel.rank-types');
Route::get('/personnel/{id?}', [PersonnelController::class, 'showPersonnel'])->name('personnel');


Route::post("/send", [PersonnelController::class,"send"])->name("send");
Route::post("/filter", [MilitaryController::class,"filter"])->name("filter");
Route::post('/filterPersonnel', [PersonnelController::class, 'filterPersonnel'])->name('filterPersonnel');

// Route::get('/', function () {
//     return view('welcome');
// });
