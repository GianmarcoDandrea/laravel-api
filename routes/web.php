<?php


use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TrashedController;
use App\Http\Controllers\Admin\TypeController;
use App\Models\Technology;
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


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
        Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
        Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);

        //TRASH ROUTE
        Route::get('trashed', [TrashedController::class, 'index'])->name('projects.trashed');
        Route::get('trashed/{project:slug}', [TrashedController::class, 'restore'])->withTrashed()->name('restore');
        Route::delete('trashed/{project:slug}', [TrashedController::class, 'delete'])->withTrashed()->name('delete');
    });

require __DIR__ . '/auth.php';


