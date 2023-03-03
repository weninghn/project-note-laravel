<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaransiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('template.master');
// });

Route::middleware('guest')->group(function (){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_action'])->name('login.action');
});

// Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function() {
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/tambah-user', [UserController::class, 'add'])->name('tambah-user');
Route::post('/insert-user', [UserController::class, 'store'])->name('insert-user');
Route::get('/edit-user/{user}', [UserController::class, 'edituser'])->name('edit-user');
Route::put('/updateuser/{user}', [UserController::class, 'updateuser'])->name('updateuser');
Route::get('/delete-user/{id}', [UserController::class, 'deleteuser'])->name('delete-user');

//client
Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::get('/client-tambah', [ClientController::class, 'add'])->name('client-tambah');
Route::post('/insert-client', [ClientController::class, 'store'])->name('insert-client');
Route::get('/edit-client/{id}', [ClientController::class, 'edit'])->name('edit-client');
Route::post('/update/{id}', [ClientController::class, 'update'])->name('update');
Route::get('/delete-client/{id}', [ClientController::class, 'deleteclient'])->name('delete-client');

//project
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/tambah-project', [ProjectController::class, 'add'])->name('tambah-project');
Route::post('/insert-project', [ProjectController::class, 'store'])->name('insert-project');
Route::get('/edit-project/{project}', [ProjectController::class, 'edit'])->name('edit-project');
Route::put('/update-project/{project}', [ProjectController::class, 'update'])->name('update-project');
Route::get('/delete-project/{id}', [ProjectController::class, 'deleteproject'])->name('delete-project');
Route::get('/detail-project/{project}', [ProjectController::class, 'detail'])->name('detail-project');
Route::get('/project-pdf/{id}',[ProjectController::class, 'export_pdf'])->name('project_pdf');

//payment
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/tambah-payment', [PaymentController::class, 'add'])->name('tambah-payment');
Route::post('/insert-payment', [PaymentController::class, 'store'])->name('insert-payment');
Route::get('/delete-payment/{id}', [PaymentController::class, 'deletepayment'])->name('delete-payment');
Route::get('/detail-payment/{payment}', [PaymentController::class, 'detail'])->name('detail-payment');
Route::get('/payment-pdf/{id}',[PaymentController::class, 'export_pdf'])->name('payment_pdf');
Route::get('/detail-payment-project/{id}', [PaymentController::class, 'detail'])->name('detail-payment-project');

//garansi
Route::get('/garansi', [GaransiController::class, 'index'])->name('garansi');
Route::get('/tambah-garansi', [GaransiController::class, 'add'])->name('tambah-garansi');
Route::post('/insert-garansi', [GaransiController::class, 'store'])->name('insert-garansi');
Route::get('/edit-garansi/{garansi}', [GaransiController::class, 'edit'])->name('edit-garansi');
Route::put('/update-garansi/{garansi}', [GaransiController::class, 'update'])->name('update-garansi');
Route::get('/delete-garansi/{id}', [GaransiController::class, 'deletegaransi'])->name('delete-garansi');
Route::get('/detail-garansi/{garansi}', [GaransiController::class, 'detail'])->name('detail-garansi');
// Route::get('download-garansi/{garansi}', [GaransiController::class, 'download'])->name('download-garansi');
// Route::get('/view/{id}', [GaransiController::class, 'view']);
Route::get('/export-pdf/{id}',[GaransiController::class, 'export_pdf'])->name('export_pdf');
Route::get('/download/{garansi}', [GaransiController::class, 'download'])->name('garansi.download');
Route::get('/view/{id}', [GaransiController::class, 'view']);
});
