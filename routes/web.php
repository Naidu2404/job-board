<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Models\JobApplication;
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

Route::get('', fn() => redirect()->route('jobs.index'));
//we can also redirect like this
// Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs',JobController::class)->only(['index','show']);

Route::get('login', fn() => redirect()->route('auth.create'))->name('login');

Route::resource('auth',AuthController::class)->only(['create','store']);

//for logging out
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');

Route::delete('auth',[AuthController::class,'destroy'])->name('auth.destroy');

//we define the routes which need authentication to access by using the auth middleware
Route::middleware('auth')->group(function () {
    // the group fn is used to group all the internal routes and apply middleware to them
    Route::resource('job.application',JobApplicationController::class)->only(['create','store']);

    Route::resource('my-job-applications',MyJobApplicationController::class)->only(['index','destroy']);

    Route::resource('employer',EmployerController::class)->only(['create','store']);

    Route::middleware('employer')->resource('my-jobs',MyJobController::class);
});