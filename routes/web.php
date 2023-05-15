<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelUserController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VisitController;
use App\Models\Cars;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;

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

Route::group(['middleware' => ['setLocale']], function () {
    Route::get('/', [MainController::class, 'show'])->name('index');

    Route::get('/panel/users', [PanelUserController::class, 'index'])->name('users.index')->middleware('can:isAdmin');
    Route::get('/panel/users/create', [PanelUserController::class, 'create'])->name('users.create')->middleware('can:isAdmin');
    Route::post('/panel/users/', [PanelUserController::class, 'store'])->name('users.store')->middleware('can:isAdmin');
    Route::delete('/panel/users/destroy/{id}', [PanelUserController::class, 'destroy'])->name('users.destroy')->middleware('can:isAdmin');

    Route::get('/panelServices/services', [ServicesController::class, 'index'])->name('services.index')->middleware('can:isAdmin');
    Route::get('/panelServices/services/create', [ServicesController::class, 'create'])->name('services.create')->middleware('can:isAdmin');
    Route::post('/panelServices/services/', [ServicesController::class, 'store'])->name('services.store')->middleware('can:isAdmin');
    Route::delete('/panelServices/services/destroy/{id}', [ServicesController::class, 'destroy'])->name('services.destroy')->middleware('can:isAdmin');
    Route::post('/panelServices/services/update/{services}', [ServicesController::class, 'update'])->name('services.update')->middleware('can:isAdmin');
    Route::get('/panelServices/services/edit/{services}', [ServicesController::class, 'edit'])->name('services.edit')->middleware('can:isAdmin');

    Route::get('/services/index', [MainController::class, 'index'])->name('services.show')->middleware('can:isUser');

    Route::get('/uslugi/{id}', [VisitController::class, 'store'])->name('visit.store')->middleware('can:isUser');
    Route::get('/visites/information', [VisitController::class, 'index'])->name('information.index')->middleware('can:isAdmin');
    Route::patch('/visites/status/{visit}', [VisitController::class, 'update'])->name('visites.status')->middleware('can:isAdmin');
    Route::get('/visites/notification', [VisitController::class, 'show'])->name('notification.index')->middleware('can:isUser');
    Route::get('/visites/accept/{wizyta}', [VisitController::class, 'edit'])->name('visites.accept')->middleware('can:isUser');

    Route::middleware('auth')->group(function () {
        Route::get('/cars/index', [CarController::class, 'index'])->name('cars.index');
        Route::delete('/cars/destroy/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
        Route::get('/cars/edit/{cars}', [CarController::class, 'edit'])->name('cars.edit');
        Route::post('/cars/update/{cars}', [CarController::class, 'update'])->name('cars.update');
        Route::post('/cars/store/', [CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    });

    Route::get('/opinion/index', [ReviewsController::class, 'index'])->name('opinion.index')->middleware('can:isUser');
    Route::post('/opinion/store', [ReviewsController::class, 'store'])->name('opinion.store')->middleware('can:isUser');


});

    Auth::routes(['verify' => true]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



