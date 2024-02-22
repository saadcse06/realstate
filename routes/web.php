<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenityController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\GroupController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//realstate admin group middleware
Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'admin_profile_store'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'admin_change_password'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'admin_update_password'])->name('admin.update.password');

});
//end admin group middleware
Route::get('/admin/login', [AdminController::class, 'admin_login'])->name('admin.login');

// agent group middleware
Route::middleware(['auth','role:agent'])->group(function (){
    Route::get('/agent/dashboard', [AgentController::class, 'agent_dashboard'])->name('agent.dashboard');
});
//end agent group middleware

//PropertyTypeController group controller
Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(PropertyTypeController::class)->group(function (){
      Route::get('/type/index','type_list')->name('type.list');
      Route::get('/type/add','add_type')->name('type.add');
      Route::get('/type/edit/{id}','edit_type')->name('type.edit');
      Route::post('/type/store','store_type')->name('type.store');
      Route::post('/type/update','update_type')->name('type.update');
      Route::get('/type/destroy/{id}','destroy_type')->name('type.destroy');
    });
});
//end realstate group controller

//Amenity group controller
Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(AmenityController::class)->group(function (){
        Route::get('/amentiy/list','amentiy_list')->name('amenity.list');
        Route::get('/amentiy/add','add_amentiy')->name('amenity.add');
        Route::get('/amentiy/edit/{id}','edit_amenity')->name('amenity.edit');
        Route::post('/amentiy/store','store_amenity')->name('amenity.store');
        Route::post('/amentiy/update','update_amentiy')->name('amenity.update');
        Route::get('/amentiy/destroy/{id}','destroy_amentiy')->name('amenity.destroy');
    });
});
//end realstate group controller

//Group Route
Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(GroupController::class)->group(function (){
        Route::get('/group/list','group_list')->name('group.list');
        Route::get('/group/add','group_add')->name('group.add');
        Route::post('/group/store','store')->name('group.store');
        Route::get('/group/edit/{id}','group_edit')->name('group.edit');
        Route::post('/group/update/','group_update')->name('group.update');
        Route::get('/group/destroy/{id}','destroy_group')->name('group.destroy');
    });
});

//Permission Type Route
Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(RoleController::class)->group(function (){
        Route::get('/permission/list','permission_list')->name('permission.list');
        Route::get('/permission/add','permission_add')->name('permission.add');
        Route::post('/permission/store','permission_store')->name('permission.store');
        Route::get('/permission/edit/{id}','permission_edit')->name('permission.edit');
        Route::post('/permission/update','permission_update')->name('permission.update');
        Route::get('/permission/destroy/{id}','destroy_permission')->name('permission.destroy');
        Route::get('/permission/import','permission_import')->name('permission.import');
        Route::get('/permission/export','permission_export')->name('permission.export');
    });
});