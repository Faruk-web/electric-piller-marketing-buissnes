<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RawMaterial;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseInvoiceController;



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [Admincontroller::class, 'dashboard'])->name('/');
    Route::get('/dashboard', [Admincontroller::class, 'dashboard'])->name('dashboard');
    Route::get('/cash-in', [TransactionsController::class, 'create_cash_in'])->name('cash.in');
    Route::post('/cash-in-confirm', [TransactionsController::class, 'store_cash_in'])->name('cash.in.confirm');
    Route::get('/cash-out', [TransactionsController::class, 'create_cash_out'])->name('cash.out');
    Route::post('/cash-out-confirm', [TransactionsController::class, 'store_cash_out'])->name('cash.out.confirm');
    Route::get('/transaction-history', [TransactionsController::class, 'index'])->name('transactions.history');
    Route::get('/transaction-history-data', [TransactionsController::class, 'transactions_data'])->name('all.transactions.data');
    Route::post('/admin/update-print-cost', [SettingsController::class, 'store'])->name('update.print.cost');


    //Begin: crm
    // Route::get('/crm', [CRMcontroller::class, 'index'])->name('admin.crm');
    // Route::post('/create-crm', [CRMcontroller::class, 'store'])->name('admin.create.new.crm');
    // Route::get('/edit-crm/{id}', [CRMcontroller::class, 'edit'])->name('admin.edit.crm');
    // Route::post('/update-crm/{id}', [CRMcontroller::class, 'update']);
    // Route::get('/deactive-crm/{id}', [CRMcontroller::class, 'DeactiveCRM']);
    // Route::get('/active-crm/{id}', [CRMcontroller::class, 'ActiveCRM']);

//Material purchase
Route::get('/raw/material', [RawMaterial::class, 'rawmaterial'])->name('raw.material');
Route::post('/raw/material/store', [RawMaterial::class, 'rawmaterialstore'])->name('raw.material.store');
//suppliers
Route::get('/supplier/create', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

//purchase invoice
Route::get('/purchase/invoice/create', [PurchaseInvoiceController::class, 'Invoice'])->name('purchase.invoice');
Route::get('/purchase/invoice/search-project', [PurchaseInvoiceController::class, 'search_project']);
Route::post('/purchase/invoice/store', [PurchaseInvoiceController::class, 'store'])->name('purchase.store');
    
});
