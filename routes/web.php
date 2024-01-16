<?php

use App\Http\Controllers\Test1Controller;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/',[Test1Controller::class, 'index'])->name('test1.index');
Route::get('test1/create', [Test1Controller::class, 'create'])->name('test1.create');
Route::post('test1/store', [Test1Controller::class, 'store'])->name('test1.store');