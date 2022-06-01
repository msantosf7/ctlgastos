<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\UsersController;

Route::group(['middleware' => ['auth'], 'namespace' => 'admin', 'prefix' => 'admin'], function(){
    //Cadastro Clientes
    Route::get('clientes', [UsersController::class, 'index'])->name('admin.clientes');
    Route::get('cadastro', [UsersController::class, 'cadastro'])->name('clientes.cadastro');
    Route::post('cadastro', [UsersController::class, 'store'])->name('cadastro.store');
    Route::any('clientes-view/{id}', [UsersController::class, 'show'])->name('clientes.view');
    Route::get('clientes/{id}/edit', [UsersController::class, 'edit'])->name('clientes.edit');
    Route::get('clientes/{id}', [UsersController::class, 'update'])->name('clientes.update');
    Route::delete('clientes/{id}', [UsersController::class, 'destroy'])->name('clientes.delete');

    //Perfil Cliente
    Route::post('atualizar-profile', [UsersController::class, 'updateProfile'])->name('profile.update');
    Route::get('profile', [UsersController::class, 'profile'])->name('clientes.profile');
    
    //Meus Clientes
    
       
    //Histórico
    Route::any('historic-search', [BalanceController::class, 'searchHistoric'])->name('historic.search');
    
    //Saque
    Route::post('saque', [BalanceController::class, 'saqueStore'])->name('saque.store');
    Route::get('saque', [BalanceController::class, 'saque'])->name('balance.saque');
       
    //Depósito
    Route::post('deposit', [BalanceController::class, 'depositStore'])->name('deposit.store');
    Route::get('deposit', [BalanceController::class, 'deposit'])->name('balance.deposit');
    
    //Movimentações
    Route::get('balance', [BalanceController::class, 'index'])->name('admin.balance');
    
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
});

Route::get('/', [SiteController::class, 'index'])->name('home');

Auth::routes();

