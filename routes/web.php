<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', Illuminate\Support\Facades\App::getLocale());

Route::group(['prefix' => '{language}'], function () {

    Route::get( '/', [ App\Http\Controllers\HomeController::class, 'index' ] )->name( 'home' );

    // Admin route
    Route::prefix( 'admin' )->group( function () {

        Auth::routes();

        Route::middleware( [ 'admin' ] )->group( function () {
            Route::get( '', [ App\Http\Controllers\Admin\SettingsController::class, 'index' ] )->name( 'admin.settings.index' );
            Route::patch('settings', [ App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');

            Route::get('users', [ App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.index');
            Route::get('users/create', [ App\Http\Controllers\Admin\UsersController::class, 'create'])->name('admin.users.create');
            Route::post('users', [ App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.users.store');
            Route::get('user/{user}', [ App\Http\Controllers\Admin\UsersController::class, 'show'])->name('admin.users.show');
            Route::get('user/{user}/edit', [ App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('admin.users.edit');
            Route::patch('user/{user}', [ App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.users.update');
            Route::delete('user/{user}', [ App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('admin.users.destroy');
        } );

    } );

    // User route
    Route::prefix( 'user' )->middleware( 'user' )->group( function () {
        Route::get( 'stand', [ App\Http\Controllers\StandsController::class, 'index' ] )->name( 'user.stand.index' );
        Route::post( 'stand', [ App\Http\Controllers\StandsController::class, 'store' ] )->name( 'user.stand.store' );
        Route::patch( 'stand/{stand}', [ App\Http\Controllers\StandsController::class, 'update' ] )->name( 'user.stand.update' );
    } );

});
