<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::group([
    'middleware' => ['auth', 'verified']
], function () {

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cursos', \App\Http\Controllers\CursosController::class);

    Route::group([
        'prefix' => 'cursos/{curso}',
        'as' => 'posts.'
    ], function () {

        Route::controller(\App\Http\Controllers\PostsController::class)
            ->group(function(){
                Route::get('/posts', 'all')->name('all');
                Route::get('/posts/{type}', 'index')->name('index');
                Route::get('/posts/{type}/create', 'create')->name('create');
                Route::post('/posts/{type}', 'store')->name('store');

                Route::get('/posts/{post}', 'show')->name('show');
                Route::get('/posts/{post}/edit', 'edit')->name('edit');
                Route::match(['patch', 'put'], '/posts/{post}', 'update')->name('update');
                Route::delete('/posts/{post}', 'delete')->name('delete');
            });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
