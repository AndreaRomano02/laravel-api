<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\TypeController;
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

//! GUEST HOME
Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');

//! ADMIN GROUP
Route::prefix('/admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

  //# HOME
  Route::get('/', [AdminHomeController::class, 'index'])->name('home');

  //# PROJECTS

  //# TRASH
  Route::get('/projects/trash', [ProjectController::class, 'trash'])->name('projects.trash');
  Route::delete('/projects/dropAll', [ProjectController::class, 'dropAll'])->name('projects.dropAll');
  Route::patch('/projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
  Route::delete('/projects/{project}/drop', [ProjectController::class, 'drop'])->name('projects.drop');

  //# RESOURCES
  Route::resource('/projects', ProjectController::class);

  //# Types
  Route::resource('/types', TypeController::class);

  //# Technologies
  Route::resource('/technologies', TechnologyController::class);
});

//! PROFILE CONTROLLER
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//! AUTH
require __DIR__ . '/auth.php';
