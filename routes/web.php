<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TestingController as tes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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

Route::get('teswa',function(){
 return view('template.app');
});

// Route::middleware(['auth', 'role:fakultas'])->group(function () {
//     Route::get('/tes', [tes::class, 'index'])->name('tes');  
// });

Route::namespace('tes')->group(function(){
    Route::get('/tes', [tes::class, 'coba'])->name('tes');  
});

Route::post('/tes/create', [tes::class, 'create'])->name('tes');


//admin role
Route::get('admin/role',[Admin::class,'indexRole'])->name('admin.role');
Route::get('admin/permission',[Admin::class,'indexPermission'])->name('admin.permission');
Route::get('user/view',[Admin::class,'indexUser'])->name('admin.user');
Route::get('role/edit/{role}',[Admin::class,'editRole'])->name('admin.user');
Route::post('update/{role}/permission',[Admin::class,'updateRolepermission'])->name('roles.permissions');
Route::delete('role/{role}/permission/{izin}',[Admin::class,'revokePermission'])->name('permission.revoke');
Route::get('edit/permission/{permission}',[Admin::class,'editPermission'])->name('edit.permission');
Route::delete('permission/{permission}/role/{role}',[PermissionController::class,'removeRo'])->name('permission.remove');

require __DIR__.'/auth.php';
