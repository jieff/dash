<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DetailPlanController, PlanController};
use App\Http\Controllers\Admin\ACL\{ProfileController, PermissionController, PermissionProfileController};



Route::prefix('admin')
            ->group(function(){


    /**
     *  Permission X Profile
     */
    Route::get('profiles/{idProfile}/permissions/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
    Route::get('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');

    /**
     * Routes Permissions
     */
    Route::get('perission/create', [PermissionController::class, 'create' ])->name('permission.create');
    Route::any('permission/search', [PermissionController::class, 'search'])->name('permission.search');
    Route::delete('permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::get('permission/{id}', [PermissionController::class, 'show'])->name('permission.show');
    Route::put('permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission', [PermissionController::class, 'index' ])->name('permission.index');

    /**
     * Routes Profiles
     */
    Route::get('profile/create', [ProfileController::class, 'create' ])->name('profile.create');
    Route::any('profile/search', [ProfileController::class, 'search'])->name('profile.search');
    Route::delete('profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/store', [ProfileController::class, 'store'])->name('profile.store');
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
