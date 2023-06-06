<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\RecordController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TypeController;
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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    // rotta dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // rotta resource dei progetti
    Route::resource('records', RecordController::class)->parameters(['records'=>'record:slug']);

    // rotta resource delle technologies
    Route::resource('technologies', TechnologyController::class)->parameters(['technologies'=>'technology:slug']);

    // rotta resource dei types
    Route::resource('types', TypeController::class)->parameters(['types'=>'type:slug']);

    // rotte di index e delete delle leads
    Route::get('leads', [LeadController::class, 'index'])->name('leads.index');
    Route::delete('leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');

    // rotte profilo
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
