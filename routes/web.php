<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportpdfController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{




// auth route for both "ُEmail Verified"
Route::group(['middleware'=>['auth','verified']],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});

// for admin
Route::group(['middleware'=>['auth','role:admin']],function(){
    Route::get('/dashboard/admin',[DashboardController::class,'all_users'])->name('dashboard.alluser');
    Route::post('/create-user', [DashboardController::class, 'createuser'])->name('user.create');
    Route::get('/delete-user/{id}', [DashboardController::class, 'deleteuser']);
    Route::get('/edit-user/{id}', [DashboardController::class, 'edituser']);
    Route::post('/update-user',[DashboardController::class,'updateuser'])->name('post.user');
    Route::get('/exportpdf',[ExportpdfController::class,'pdf'])->name('pdf.user');
    Route::get('/invoices',[InvoicesController::class,'index'])->name('invoices');
    Route::get('/create_invoices',[InvoicesController::class,'create_invoices'])->name('create.invoices');
    Route::post('/invoices', [InvoicesController::class, 'store_invoices'])->name('store.invoices');
    Route::get('/search',DashboardController::class,'search');

});

//for users
Route::group(['middleware'=>['auth','role:user']],function(){
    Route::get('/dashboard/myprofile','App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});



});
require __DIR__.'/auth.php';
