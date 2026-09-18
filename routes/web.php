<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosticoController;

// Página inicial simplificada
Route::view('/', 'welcome')->name('home');
Route::view('/solucoes', 'solucoes')->name('solucoes');
Route::view('/cases', 'cases')->name('cases');
Route::view('/blog', 'blog')->name('blog');
Route::view('/fale-conosco', 'fale_conosco')->name('fale.conosco');

// Rota para exibir o formulário na página Fale Conosco
Route::get('/fale-conosco', [DiagnosticoController::class, 'index'])->name('diagnostico.index');

// Rota para processar os dados enviados do formulário
Route::post('/diagnostico/processar', [DiagnosticoController::class, 'processar'])->name('diagnostico.processar');

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
// 🔐 Grupo Protegido (Módulo Administrativo Interno)
Route::middleware(['auth', 'verified'])->group(function () {
    // Painel Principal da Dashboard Gerencial
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Processamento do Banco de Dados MySQL
    Route::post('/admin/clients', [DashboardController::class, 'storeClient'])->name('admin.clients.store');
    Route::post('/admin/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
    Route::post('/admin/metrics', [DashboardController::class, 'storeMetric'])->name('admin.metrics.store');
    Route::post('/admin/goals', [DashboardController::class, 'storeGoal'])->name('admin.goals.store');
});


require __DIR__.'/auth.php';
