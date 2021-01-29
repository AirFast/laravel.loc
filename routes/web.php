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

// Default route
Route::redirect('/', Illuminate\Support\Facades\App::getLocale());


// Language route group
Route::group(['prefix' => '{language}'], function () {

    Route::get( '/', [ App\Http\Controllers\HomeController::class, 'index' ] )->middleware('auth')->name( 'home' );

    // Admin route
    Route::prefix( 'admin' )->group( function () {

        // Authentication routes
        Auth::routes(['verify' => true]);

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

            Route::get('territories', [ App\Http\Controllers\Admin\TerritoriesController::class, 'index'])->name('admin.territories.index');
            Route::get('territories/statistic', [ App\Http\Controllers\Admin\TerritoriesController::class, 'statistic'])->name('admin.territories.statistic');
            Route::get('territories/create', [ App\Http\Controllers\Admin\TerritoriesController::class, 'create'])->name('admin.territories.create');
            Route::post('territories', [ App\Http\Controllers\Admin\TerritoriesController::class, 'store'])->name('admin.territories.store');
            Route::get('territory/{territory}', [ App\Http\Controllers\Admin\TerritoriesController::class, 'show'])->name('admin.territories.show');
            Route::get('territory/{territory}/edit', [ App\Http\Controllers\Admin\TerritoriesController::class, 'edit'])->name('admin.territories.edit');
            Route::patch('territory/{territory}', [ App\Http\Controllers\Admin\TerritoriesController::class, 'update'])->name('admin.territories.update');
            Route::delete('territory/{territory}', [ App\Http\Controllers\Admin\TerritoriesController::class, 'destroy'])->name('admin.territories.destroy');

        } );

    } );

    // User route
    Route::prefix( 'user' )->middleware( 'user' )->group( function () {

        Route::get('', [ App\Http\Controllers\User\UserController::class, 'index'])->name('user.index');

        Route::get( 'stand', [ App\Http\Controllers\StandsController::class, 'index' ] )->name( 'user.stand.index' );
        Route::post( 'stand', [ App\Http\Controllers\StandsController::class, 'store' ] )->name( 'user.stand.store' );
        Route::patch( 'stand/{stand}', [ App\Http\Controllers\StandsController::class, 'update' ] )->name( 'user.stand.update' );

        Route::get('territories', [ App\Http\Controllers\User\TerritoriesController::class, 'index'])->name('user.territories.index');
        Route::get('territory/{territory}', [ App\Http\Controllers\User\TerritoriesController::class, 'show'])->name('user.territories.show');
        Route::patch('territory/{territory}', [ App\Http\Controllers\User\TerritoriesController::class, 'update'])->name('user.territories.update');

    } );

});
