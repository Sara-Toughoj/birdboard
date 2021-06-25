<?php

use App\Http\Controllers\ProjectsController;
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


Route::middleware('auth')->group(function () {

    Route::prefix('projects')->group(function () {
        Route::post('/', [ProjectsController::class, 'store']);
        Route::get('/', [ProjectsController::class, 'index']);
        Route::get('/create', [ProjectsController::class, 'create']);
        Route::get('/{project}', [ProjectsController::class, 'show']);
    });

    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

