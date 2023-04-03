<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\EtudiantController;




Route::get('/', [EtudiantController::class, 'index'])->name('index');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant/{etudiant}', [EtudiantController::class, 'update']);
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store']);
Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy']);











