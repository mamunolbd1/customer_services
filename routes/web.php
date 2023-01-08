<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\CRMController;
use App\Http\Controllers\Backend\AdminPagesController;
use App\Http\Controllers\Backend\UserPagesController;

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

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend Routes

Route::get('/',[PagesController::class,'index']);
Route::get('/crms/create',[CRMController::class,'index'])->name('crms.index');

Route::post('/crms/insert',[CRMController::class,'insert'])->name('crms.insert');
Route::post('/crms/delete/{id}',[CRMController::class,'delete'])->name('crms.delete');


Route::get('admin/',[AdminPagesController::class,'index'])->name('admin.index');
Route::get('admin/crm_data',[AdminPagesController::class,'data'])->name('admin.crm_data');
Route::get('admin/export',[AdminPagesController::class,'export'])->name('admin.export');
Route::post('admin/export/post',[AdminPagesController::class,'exportPost'])->name('admin.export.post');
Route::get('admin/create',[AdminPagesController::class,'create'])->name('admin.create');
Route::post('admin/create/user',[AdminPagesController::class,'store'])->name('admin.create.user');
Route::get('admin/create/user',[AdminPagesController::class,'userlist'])->name('admin.userlist');

// Route::post('admin/create',[UserPagesController::class,'insert'])->name('admin.create.user');


Route::get('/test',function(){
    return view('test');
});



