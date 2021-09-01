<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [CrudController::class, 'index']);
Route::get('/add', [CrudController::class, 'add'])->name('add');
Route::get('/edit/{estudiante_id}', [CrudController::class, 'edit'])->name('edit');
Route::get('/delete/{estudiante_id}', [CrudController::class, 'delete'])->name('delete');

Route::post('/save', [CrudController::class, 'save'])->name('save');
