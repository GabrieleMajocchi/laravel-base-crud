<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeachController as AdminController;
use App\Http\Controllers\Guest\BeachController as GuestController;

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

Route::get('/', [GuestController::class, 'index'])->name('guest.home');

Route::get('admin/beaches/deleted', [AdminController::class, 'trashed'])->name('admin.beaches.trashed');
Route::get('admin/beaches', [AdminController::class, 'index'])->name('admin.beaches.index');
Route::get('admin/beaches/create', [AdminController::class, 'create'])->name('admin.beaches.create');
Route::post('admin/beaches', [AdminController::class, 'store'])->name('admin.beaches.store');
Route::get('admin/beaches/{id}', [AdminController::class, 'show'])->name('admin.beaches.show');

Route::get('/{id}', [GuestController::class, 'show'])->name('guest.show');

Route::get('admin/beaches/{id}/edit', [AdminController::class, 'edit'])->name('admin.beaches.edit');
Route::put('admin/beaches/{id}', [AdminController::class, 'update'])->name('admin.beaches.update');
Route::delete('admin/beaches/{id}', [AdminController::class, 'destroy'])->name('admin.beaches.destroy');
Route::delete('admin/beaches/{id}/hardDelete', [AdminController::class, 'hardDelete'])->name('admin.beaches.hardDelete');
Route::delete('admin/beaches/deleted/{id}', [AdminController::class, 'restore'])->name('admin.beaches.restore');
