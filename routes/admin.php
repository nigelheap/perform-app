<?php

use App\Http\Controllers\Admin;
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


Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');


Route::resource('users', Admin\UsersController::class);
Route::get('/users/{user}/delete', [Admin\UsersController::class, 'delete'])->name('users.delete');
Route::get('/users/{user}/impersonate', [Admin\UsersController::class, 'impersonate'])->name('users.impersonate');


Route::resource('cursos', Admin\CursosController::class);
Route::get('/cursos/{curso}/delete', [Admin\CursosController::class, 'delete'])->name('cursos.delete');
Route::get('/cursos/{curso}/users/{user}/accept', [Admin\UsersController::class, 'accept'])->name('cursos.users.accept');
Route::get('/cursos/{curso}/users/{user}/reject', [Admin\UsersController::class, 'reject'])->name('cursos.users.reject');


Route::controller(Admin\Settings\GeneralSettingsController::class)->group(function (){
    Route::get('/settings', 'index')->name('settings.general');
    Route::post('/settings', 'save')->name('settings.general.save');
});

