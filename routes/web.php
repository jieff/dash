<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DetailPlanController, PlanController};
use App\Http\Controllers\Admin\ACL\ProfileController;



Route::prefix('admin')
            ->group(function(){

    /**
     * Routes Profiles
     */
    Route::get('profile', [ProfileController::class, 'index' ])->name('profile.index');
    /**
     * Routes Details Plans
     */
    Route::delete('plans/{url}/details/{idDetail}',[DetailPlanController::class, 'destroy'])->name('details.plans.destroy');
    Route::get('plans/{url}/details/{idDetail}',[DetailPlanController::class, 'show'])->name('details.plans.show');
    Route::put('plans/{url}/details/{idDetail}',[DetailPlanController::class, 'update'])->name('details.plans.update');
    Route::get('plans/{url}/details/{idDetail}/edit',[DetailPlanController::class, 'edit'])->name('details.plans.edit');
    Route::post('plans/{url}/details',[DetailPlanController::class, 'store'])->name('details.plans.store');
    Route::get('plano/{url}/details/create',[DetailPlanController::class, 'create'])->name('details.plano.create');
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
