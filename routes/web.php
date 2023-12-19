<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarReturnController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReturnCarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


//ROUTES DISPLAY USER
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/daftar', [CarController::class, 'index_boat'])->name('index_boat');
Route::post('/daftar', [CarController::class, 'add_daftar'])->name('add_daftar');


Route::middleware(['admin'])->group(function () {

    Route::get('/admin/dashboardreturn/edit/{pendaftaran}', [CarController::class, 'edit_pendaftar'])->name('edit_pendaftar');
    Route::patch('/admin/dashboardreturn/{pendaftaran}', [CarController::class, 'update_pendaftar'])->name('update_pendaftar');
    Route::get('/admin/pendaftaran', [CarController::class, 'dashboard_pendaftar'])->name('dashboard_pendaftar');


    Route::get('/admin/dashboardhome', [CarController::class, 'dashboard_home'])->name('dashboard_home');

    Route::get('/admin/dashboarduser', [AdminController::class, 'dashboard_user'])->name('dashboard_user');
    Route::delete('/admin/dashboarduser/{user}/delete', [AdminController::class, 'delete_user'])->name('delete_user');
    Route::get('/admin/dashboarduser/create', [AdminController::class, 'create_user'])->name('create_user');
    Route::post('/admin/dashboarduser/create', [AdminController::class, 'add_user'])->name('add_user');
    Route::get('/admin/dashboarduser/{user}/edit', [AdminController::class, 'edit_user'])->name('edit_user');
    Route::patch('/admin/dashboarduser/{user}/update', [AdminController::class, 'update_user'])->name('update_user');

    // Route::get('/admin/dashboardcategory', [AdminController::class, 'dashboard_category'])->name('dashboard_category');
    // Route::delete('/admin/dashboardcategory/{category}/delete', [AdminController::class, 'delete_category'])->name('delete_category');
    // Route::get('/admin/dashboardcategory/create', [AdminController::class, 'create_category'])->name('create_category');
    // Route::post('/admin/dashboardcategory/create', [AdminController::class, 'add_category'])->name('add_category');
    // Route::get('/admin/dashboardcategory/{category}/edit', [AdminController::class, 'edit_category'])->name('edit_category');
    // Route::patch('/admin/dashboardcategory/{category}/update', [AdminController::class, 'update_category'])->name('update_category');

    // Route::get('/admin/dashboardcar', [AdminController::class, 'dashboard_car'])->name('dashboard_car');
    // Route::get('/admin/dashboardcar/create', [AdminController::class, 'create_car'])->name('create_car');
    // Route::post('/admin/dashboardcar/create', [AdminController::class, 'store_car'])->name('store_car');
    // Route::delete('/admin/dashboardcar/{car}', [AdminController::class, 'delete_car'])->name('delete_car');

    // Route::get('/admin/dashboardcar/{car}/edit', [AdminController::class, 'edit_car'])->name('edit_car');
    // Route::patch('/admin/dashboardcar/{car}/update', [AdminController::class, 'update_car'])->name('update_car');

    // Route::get('/admin/dashboarduser', [AdminController::class, 'dashboard_user'])->name('dashboard_user');
    // Route::delete('/admin/dashboarduser/{user}/delete', [AdminController::class, 'delete_user'])->name('delete_user');
    // Route::get('/admin/dashboarduser/create', [AdminController::class, 'create_user'])->name('create_user');
    // Route::post('/admin/dashboarduser/create', [AdminController::class, 'add_user'])->name('add_user');
    // Route::get('/admin/dashboarduser/{user}/edit', [AdminController::class, 'edit_user'])->name('edit_user');
    // Route::patch('/admin/dashboarduser/{user}/update', [AdminController::class, 'update_user'])->name('update_user');

    // Route::get('/admin/dashboardorder', [OrderController::class, 'dashboard_order'])->name('dashboard_order');
    // Route::get('/admin/dashboardreturn', [CarReturnController::class, 'dashboard_return'])->name('dashboard_return');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/pdf_user/{id}', [PdfController::class, 'bukti_pendaftaran_pdf'])->name('pdf_user');
    Route::get('/profile', [UserController::class, 'index_user'])->name('index_user');
    Route::patch('/profile', [UserController::class, 'edit_user_profile'])->name('edit_user_profile');
    //Car Route
    // Route::get('/car/{car}', [CarController::class, 'show_boat'])->name('show_boat');
    Route::get('/histori', [CarController::class, 'show_history_pendaftaran'])->name('show_history_pendaftaran');
    Route::get('/histori/edit/{pendaftaran}', [CarController::class, 'show_edit'])->name('show_edit');
    Route::patch('/histori/{pendaftaran}', [CarController::class, 'update_pendaftar_user'])->name('update_pendaftar_user');
    Route::delete('/histori/{pendaftar}/delete', [CarController::class, 'delete_pendaftar'])->name('delete_pendaftar');
    // Route::post('/order/{car}', [OrderController::class, 'add_order'])->name('add_order');
    // Route::post('/order/{payment}/pay', [PaymentController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
    // Route::post('/order/{payment}/pay', [PaymentController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
});