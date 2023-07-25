<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Support\DefaultPermissions;
use App\Support\DefaultRoles;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        // 'admin' => DefaultPermissions::VIEW_ANY_ROLES,
    ]);
});



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('posts', PostController::class)
        // ->middleware('can:' . DefaultPermissions::VIEW_POST)
    ;

    Route::prefix('admin')
        ->group(function () {
            Route::resource('roles', RoleController::class)
                // ->middleware('can:' . DefaultPermissions::VIEW_ROLE)
            ;
        });
});

// require __DIR__.'/auth.php';
