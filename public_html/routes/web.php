<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
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

Route::get("/", [PersonnelController::class,"showAddSoldier"])->name("index");

Route::post("/send", [PersonnelController::class,"send"])->name("send");

// Route::get('/', function () {
//     return view('welcome');
// });
