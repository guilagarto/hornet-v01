<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Página inicial simplificada
Route::view('/', 'welcome');

// Grupo protegido por autenticação
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rota principal de visualização da Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Endpoints de Processamento do Banco de Dados (MVP 8ou80)
    Route::post('/admin/clients', [DashboardController::class, 'storeClient'])->name('admin.clients.store');
    Route::post('/admin/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
    
    // 🔥 NOVAS ROTAS ADICIONADAS:
    Route::post('/admin/metrics', [DashboardController::class, 'storeMetric'])->name('admin.metrics.store');
    Route::post('/admin/goals', [DashboardController::class, 'storeGoal'])->name('admin.goals.store');

    // 🔥 ROTA ADICIONADA PARA O RELATÓRIO GERAL
    Route::get('/relatorio-geral', [\App\Http\Controllers\Admin\DashboardController::class, 'relatorioGeral'])->name('relatorio.geral');


});


require __DIR__.'/auth.php';
