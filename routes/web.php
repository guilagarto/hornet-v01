<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosticoController;
use App\Models\Project;

// Pagina Inicial simplificada
Route::view('/', 'welcome')->name('home');
Route::view('/solucoes', 'solucoes')->name('solucoes');
Route::view('/cases', 'cases')->name('cases');
Route::view('/blog', 'blog')->name('blog');

// Rota unificada para exibir o formulário de diagnóstico na página Fale Conosco
Route::get('/fale-conosco', [DiagnosticoController::class, 'index'])->name('fale.conosco');

// Rota para processar os dados enviados do formulário
Route::post('/diagnostico/processar', [DiagnosticoController::class, 'processar'])->name('diagnostico.processar');

// Grupo protegido por autenticação
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rota principal de visualização da Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Endpoints de Processamento do Banco de Dados (MVP 8ou80)
    Route::post('/admin/clients', [DashboardController::class, 'storeClient'])->name('admin.clients.store');
    Route::post('/admin/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
    
    // NOVAS ROTAS ADICIONADAS:
    Route::post('/admin/metrics', [DashboardController::class, 'storeMetric'])->name('admin.metrics.store');
    Route::post('/admin/goals', [DashboardController::class, 'storeGoal'])->name('admin.goals.store');
    
    // ROTA ADICIONADA PARA O RELATÓRIO GERAL
    Route::get('/relatorio-geral', [\App\Http\Controllers\Admin\DashboardController::class, 'relatorioGeral'])->name('relatorio.geral');
    
    // Rota exclusiva e totalmente isolada direcionando para o ControllerLeads
Route::get('/admin/diagnosticos', [\App\Http\Controllers\Admin\ControllerLeads::class, 'index'])->name('admin.diagnosticos.index');

});

// Grupo Protegido (Modulo Administrativo Interno)
Route::middleware(['auth', 'verified'])->group(function () {
    // Painel Principal da Dashboard Gerencial
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Processamento do Banco de Dados MySQL
    Route::post('/admin/clients', [DashboardController::class, 'storeClient'])->name('admin.clients.store');
    Route::post('/admin/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
    Route::post('/admin/metrics', [DashboardController::class, 'storeMetric'])->name('admin.metrics.store');
    Route::post('/admin/goals', [DashboardController::class, 'storeGoal'])->name('admin.goals.store');
});


// 1. Rota da listagem de cases
Route::get('/cases', function () {
    $projects = Project::with('metrics')->orderBy('created_at', 'desc')->get();
    return view('cases', compact('projects'));
})->name('cases');

// 2. Rota dinâmica interna mapeada por ID
Route::get('/cases/{id}', function ($id) {
    $project = Project::with(['metrics', 'goals'])->findOrFail($id);
    return view('case-show', compact('project'));
})->name('cases.show');

require __DIR__.'/auth.php';
