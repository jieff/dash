<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DetailPlanController, PlanController};




Route::prefix('admin')->group(function(){

    /**
     * Routes Details Plans
     */
    Route::post('plans/{url}/details',[DetailPlanController::class, 'store'])->name('details.plans.store');
    Route::get('plans/{url}/details/create',[DetailPlanController::class, 'create'])->name('details.plans.create');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plans.index');

    /**
     * Routes Plans
     */
    Route::post('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans', [PlanController::class,'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    /**
     * Home Dashboard
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');


});


Route::get('/', function () {
    return view('welcome');
});
