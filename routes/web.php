<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RawMaterial;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\ProductInvoiceController;
use App\Http\Controllers\ProductionToProductController;
use App\Http\Controllers\ProductionToProductOutPutController;


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
    Route::get('/raw/material/list', [RawMaterial::class, 'rawmateriallist'])->name('raw.material.list');
    Route::get('/raw/material/list/edit/{id}', [RawMaterial::class, 'rawmateriallistedit'])->name('raw.material.list.edit');
    Route::get('/raw/material/index', [RawMaterial::class, 'rawmaterial_data'])->name('raw.material.data');
    Route::get('/raw/material/edit', [RawMaterial::class, 'rawmaterial_edit'])->name('raw.material.edit');
    Route::post('/raw/material/update/{id}', [RawMaterial::class, 'rawmaterial_update'])->name('raw.material.update');
    Route::post('/raw/material/store', [RawMaterial::class, 'rawmaterialstore'])->name('raw.material.store');

    Route::get('/material/stock', [RawMaterial::class, 'materialstock'])->name('material.stock');
    Route::get('/material/stock/data', [RawMaterial::class, 'materialstockdata'])->name('material.stock.data');
    //suppliers
    Route::get('/supplier/create', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/list', [SupplierController::class, 'list'])->name('supplier.list');
    Route::get('/supplier/list/edit/{id}', [SupplierController::class, 'list_edit'])->name('supplier.list.edit');
    Route::post('/supplier/list/update/{id}', [SupplierController::class, 'list_update'])->name('supplier.list.update');
    Route::get('/supplier/list/data', [SupplierController::class, 'list_data'])->name('supplier.list.data');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

    //purchase invoice
    Route::get('/purchase/invoice/create', [PurchaseInvoiceController::class, 'Invoice'])->name('purchase.invoice');
    Route::get('/purchase/invoice/list', [PurchaseInvoiceController::class, 'Invoice_list'])->name('purchase.invoice.list');
    Route::get('/purchase/invoice/data', [PurchaseInvoiceController::class, 'Invoice_list_data'])->name('purchase.invoice.data');
    Route::get('/purchase/invoice/search-project', [PurchaseInvoiceController::class, 'search_project']);
    Route::post('/purchase/invoice/store', [PurchaseInvoiceController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/material/create', [PurchaseInvoiceController::class, 'purchase_material'])->name('purchase.material');
    Route::get('/purchase/material/list', [PurchaseInvoiceController::class, 'purchase_material_list'])->name('purchase.material.list');
    Route::get('/purchase/material/data', [PurchaseInvoiceController::class, 'purchase_material_data'])->name('purchase.material.data');
    Route::post('/purchase/material/submite', [PurchaseInvoiceController::class, 'purchase_material_submite'])->name('purchase.material.submite');
    Route::get('/search_member', [PurchaseInvoiceController::class, 'search_member']);
    Route::get('/create/search-doner', [PurchaseInvoiceController::class, 'search_doner']);
    //product invoice
    Route::get('/product/create', [ProductInvoiceController::class, 'create'])->name('product.create');
    Route::get('/material/make/product/create', [ProductInvoiceController::class, 'material_product'])->name('material.make.product');
    Route::post('/product/store', [ProductInvoiceController::class, 'productstore'])->name('product.store');
    Route::get('/product/list', [ProductInvoiceController::class, 'product_list'])->name('product.list');
    Route::get('/product/list/data', [ProductInvoiceController::class, 'product_list_data'])->name('product.list.data');
    
    Route::get('/product/material-info-to-make-product/{id}', [ProductInvoiceController::class, 'material_info_to_make_product'])->name('material.info.to.make.product');
    
    Route::get('/search_product', [ProductInvoiceController::class, 'search_product']);
    Route::get('/create/search/material', [ProductInvoiceController::class, 'search_material_to_make_product']);
    Route::get('/create/search/material/product', [ProductInvoiceController::class, 'make_product']);
    Route::post('/material/make/product/submite', [ProductInvoiceController::class, 'material_make_product_submite'])->name('material.make.product.submite');
    Route::get('/material/make/product/list', [ProductInvoiceController::class, 'material_make_product_product_list'])->name('material.make.product.list');
    Route::get('/material/make/product/data', [ProductInvoiceController::class, 'material_make_product_data'])->name('materiak.make.product.data');
    //production to product 
    Route::get('/product/invoice/create', [ProductionToProductController::class, 'create'])->name('invoice.create');
    Route::post('/product/invoice/store', [ProductionToProductController::class, 'invoicestore'])->name('invoice.store');
    Route::get('/product/invoice/list/data', [ProductionToProductController::class, 'invoicelistdata'])->name('invoice.list.data');
    Route::get('/production/material/create', [ProductionToProductController::class, 'production_material'])->name('production.material.create');
    Route::get('/search_member', [ProductionToProductController::class, 'search_member']);
    Route::get('/create/search-doner', [ProductionToProductController::class, 'search_doner']);
   
    Route::post('/production/material/store', [ProductionToProductController::class, 'production_material_store'])->name('production.material.store');
    Route::get('/production/material', [ProductionToProductController::class, 'productionmaterial'])->name('production.material');
    Route::get('/production/material/list', [ProductionToProductController::class, 'productionmateriallist'])->name('production.material.list');
    Route::get('/search_product', [ProductionToProductController::class, 'search_product']);
    Route::get('/production/material/data', [ProductionToProductController::class, 'production_material_data'])->name('production.material.data');

    //
    Route::get('/production/to/product', [ProductionToProductOutPutController::class, 'productiontoproduct'])->name('production.product');
    Route::get('/search/product', [ProductionToProductOutPutController::class, 'productsearch']);
    Route::get('/search//raw/material', [ProductionToProductOutPutController::class, 'rawmaterialsearch']);
    Route::post('/production/to/product/store', [ProductionToProductOutPutController::class, 'productiontoproductstore'])->name('production.product.store');
    Route::get('/production/to/product/list', [ProductionToProductOutPutController::class, 'productiontoproductlist'])->name('production.product.list');
    Route::get('/production/to/product/data', [ProductionToProductOutPutController::class, 'productiontoproductdata'])->name('production.product.data');
    Route::get('/production/product/stock', [ProductionToProductOutPutController::class, 'productstock'])->name('production.product.stock');
    Route::get('/production/product/stock/data', [ProductionToProductOutPutController::class, 'productstockdata'])->name('production.product.stock.data');
});
