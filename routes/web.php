<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Página inicial simplificada
Route::view('/', 'welcome');

// Grupo protegido por autenticação
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rota principal da Dashboard (Exibição)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Novas Rotas de Processamento do Banco de Dados (MVP 8ou80)
    Route::post('/admin/clients', [DashboardController::class, 'storeClient'])->name('admin.clients.store');
    Route::post('/admin/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
});

require __DIR__.'/auth.php';
