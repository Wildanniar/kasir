<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/redirect', function () {
    if (auth()->user()->role->name === 'admin') {  // Diperbaiki: Gunakan ->name karena role sekarang relasi objek
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('kasir.dashboard');
})->middleware('auth');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');  // Izinkan semua user login melihat index products
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('products', ProductController::class)
        ->except(['index', 'show']);  // Admin bisa CRUD kecuali index (yang sudah di atas)
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

// Tambahkan route kasir.dashboard yang direferensikan di redirect
Route::middleware(['auth', 'role:kasir'])
    ->prefix('kasir')
    ->name('kasir.')
    ->group(function () {
        Route::get('/dashboard', fn () => view('kasir.dashboard'))
            ->name('dashboard');
    });

Route::middleware(['auth', 'role:kasir,admin'])->group(function () {
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::post('/sales/add', [SaleController::class, 'add'])->name('sales.add');
    Route::post('/sales/remove', [SaleController::class, 'remove'])->name('sales.remove');
    Route::post('/sales/checkout', [SaleController::class, 'checkout'])->name('sales.checkout');
    Route::resource('sales', SaleController::class);
    Route::get('/sales/{sale}/receipt', [SaleController::class, 'receipt'])
        ->name('sales.receipt');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/reports/sales', [ReportController::class, 'sales'])
        ->name('reports.sales');
    Route::get('/reports/sales/pdf', [ReportController::class, 'salesPdf'])
        ->name('reports.sales.pdf');
    Route::get('/reports/sales/excel', [ReportController::class, 'salesExcel'])
        ->name('reports.sales.excel');
});

Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');

require __DIR__.'/auth.php';