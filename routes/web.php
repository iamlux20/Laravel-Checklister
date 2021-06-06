<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\User\ChecklistController as UserChecklistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    Route::get('welcome', [ControllersPageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [ControllersPageController::class, 'consultation'])->name('consultation');

    Route::get('checklists/{checklist}', [UserChecklistController::class, 'show'])->name('user.checklist.show');

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'is_admin'], function(){

            Route::resource('pages', PageController::class)->only(['edit', 'update']);
            Route::resource('checklist_groups', ChecklistGroupController::class);
            Route::resource('checklist_groups.checklists', ChecklistController::class);
            Route::resource('checklists.tasks', TaskController::class);

            Route::get('users', [UserController::class, 'index'])->name('users.index');
    });
});
