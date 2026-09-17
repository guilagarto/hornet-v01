<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rota da página inicial
Route::view('/', 'welcome');

// Rota da Dashboard integrada com os dados simulados
Route::get('/dashboard', function () {
    $dadosMarketing = [
        "empresa" => "Hornet Corp",
        "roi" => 4.8,
        "leads" => 450,
        "custo_captacao" => 12.50
    ];
    
    $dadosClientes = [
        "valor_contrato" => 25000.00,
        "faturamento_estimado_mensal" => 4166.66,
        "status" => "Ativo"
    ];
    
    $dadosPessoal = [
        "setembro" => ["entradas" => 5000.00, "saidas" => 1200.00, "saldo" => 3800.00],
        "outubro"  => ["entradas" => 5000.00, "saidas" => 450.00, "saldo" => 4550.00], 
        "novembro" => ["entradas" => 5500.00, "saidas" => 200.00, "saldo" => 5300.00]
    ];
    
    $dadosPython = [
        "marketing" => $dadosMarketing,
        "clientes" => $dadosClientes,
        "pessoal" => $dadosPessoal
    ];

    return view('dashboard', compact('dadosPython'));
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔥 RECONECTA AS ROTAS DE PERFIL QUE ESTAVAM FALTANDO:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
