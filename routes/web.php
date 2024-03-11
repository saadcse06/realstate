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
Route::middleware(['auth','roles:admin'])->group(function (){
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
Route::middleware(['auth','roles:agent'])->group(function (){
    Route::get('/agent/dashboard', [AgentController::class, 'agent_dashboard'])->name('agent.dashboard');
});
//end agent group middleware

//PropertyTypeController group controller
Route::middleware(['auth','roles:admin'])->group(function (){
    Route::controller(PropertyTypeController::class)->group(function (){
      Route::get('/type/type_list','type_list')->name('type.type_list')->middleware('permission:type.type_list');
      Route::get('/type/type_add','add_type')->name('type.type_add')->middleware('permission:type.type_add');
      Route::get('/type/edit_type/{id}','edit_type')->name('type.edit')->middleware('permission:type.edit');
      Route::post('/type/store','store_type')->name('type.store')->middleware('permission:type.store');
      Route::post('/type/update','update_type')->name('type.update')->middleware('permission:type.update');
      Route::get('/type/destroy/{id}','destroy_type')->name('type.destroy')->middleware('permission:type.destroy');
    });
});
//end realstate group controller

//Amenity group controller
Route::middleware(['auth','roles:admin'])->group(function (){
    Route::controller(AmenityController::class)->group(function (){
        Route::get('/amentiy/amentiy_list','amentiy_list')->name('amenity.amenity_list')->middleware('permission:amenity.amenity_list');
        Route::get('/amentiy/create','add_amentiy')->name('amenity.create')->middleware('permission:amenity.create');
        Route::get('/amentiy/edit_amenity/{id}','edit_amenity')->name('amenity.edit')->middleware('permission:amenity.edit');
        Route::post('/amentiy/store','store_amenity')->name('amenity.store')->middleware('permission:amenity.store');
        Route::post('/amentiy/update','update_amentiy')->name('amenity.update')->middleware('permission:amenity.update');
        Route::get('/amentiy/destroy/{id}','destroy_amentiy')->name('amenity.destroy')->middleware('permission:amenity.destroy');
    });
});
//end realstate group controller

//Group Route
Route::middleware(['auth','roles:admin'])->group(function (){
    Route::controller(GroupController::class)->group(function (){
        Route::get('/group/group_list','group_list')->name('group.group_list');
        Route::get('/group/group_add','group_add')->name('group.group_add');
        Route::post('/group/store','store')->name('group.store');
        Route::get('/group/group_edit/{id}','group_edit')->name('group.edit');
        Route::post('/group/update/','group_update')->name('group.update');
        Route::get('/group/destroy/{id}','destroy_group')->name('group.destroy');
    });
});

//Permission Route
Route::middleware(['auth','roles:admin'])->group(function (){
    Route::controller(RoleController::class)->group(function (){
        Route::get('/permission/permission_list','permission_list')->name('permission.permission_list');
        Route::get('/permission/permission_add','permission_add')->name('permission.permission_add');
        Route::post('/permission/store','permission_store')->name('permission.store');
        Route::get('/permission/permission_edit/{id}','permission_edit')->name('permission.edit');
        Route::post('/permission/update','permission_update')->name('permission.update');
        Route::get('/permission/destroy/{id}','destroy_permission')->name('permission.destroy');
        Route::get('/permission/permission_import','permission_import')->name('permission.import');
        Route::post('/permission/store_import_data','store_import_data')->name('permission.store_import_data');
        Route::get('/permission/export','permission_export')->name('permission.export');
        Route::get('/permission/permission_pdf_download','permission_pdf_download')->name('permission.permission_pdf_download');
    });
});

//roles Route
Route::middleware(['auth','roles:admin'])->group(function (){
    Route::controller(RoleController::class)->group(function (){
        Route::get('/role/role_list','role_list')->name('role.role_list');
        Route::get('/role/role_add','role_add')->name('role.role_add');
        Route::post('/role/store','role_store')->name('role.store');
        Route::get('/role/role_edit/{id}','role_edit')->name('role.edit');
        Route::post('/role/update','role_update')->name('role.update');
        Route::get('/role/destroy/{id}','destroy_role')->name('role.destroy');
        Route::get('/role/all_role_permission','all_role_permission')->name('all.role.permission');
        Route::get('/role/add_role_permission','add_role_permission')->name('role.add.permission');
        Route::post('/role/role_permission_store','role_permission_store')->name('role.permission.store');
        Route::get('/role/edit_role_permission/{id}','edit_role_permission')->name('edit.role.permission');
        Route::post('/role/update_role_permission','update_role_permission')->name('update.role.permission');
        Route::get('/role/destroy_role_permission/{id}','destroy_role_permission')->name('destroy.role.permission');
    });
});

//Admin User Route
//Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin/admin_user_list','admin_user_list')->name('admin.admin_list');
        Route::get('/admin/admin_user_add','admin_user_add')->name('admin.admin_add');
        Route::post('/admin/store','admin_user_store')->name('admin.store');
        Route::get('/admin/admin_user_edit/{id}','admin_user_edit')->name('admin.edit');
        Route::get('/admin/delete/{id}','admin_user_destroy')->name('admin.destroy');
        Route::post('/admin/update','admin_user_update')->name('admin.update');
    });
//});
