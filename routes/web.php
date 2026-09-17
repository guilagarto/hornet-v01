<?php

use Illuminate\Support\Facades\Route;

// Rota da página inicial
Route::view('/', 'welcome');

// Dashboard com o motor de cálculo integrado direto no Laravel
Route::get('/dashboard', function () {
    
    // 3.1.1 Estrutura de dados de Marketing simulando o processamento
    $dadosMarketing = [
        "empresa" => "Hornet Corp",
        "roi" => 4.8,
        "leads" => 450,
        "custo_captacao" => 12.50
    ];
    
    // 3.1.2 Financeiro Clientes (Acompanhamento ADM)
    $dadosClientes = [
        "valor_contrato" => 25000.00,
        "faturamento_estimado_mensal" => 4166.66,
        "status" => "Ativo"
    ];
    
    // 3.1.3 Financeiro Pessoal (Lógica de Projeção e parcelamento automático)
    $dadosPessoal = [
        "setembro" => ["entradas" => 5000.00, "saidas" => 1200.00, "saldo" => 3800.00],
        "outubro"  => ["entradas" => 5000.00, "saidas" => 450.00, "saldo" => 4550.00], 
        "novembro" => ["entradas" => 5500.00, "saidas" => 200.00, "saldo" => 5300.00]
    ];
    
    // Consolida tudo em um único array simulando o antigo retorno do Python
    $dadosPython = [
        "marketing" => $dadosMarketing,
        "clientes" => $dadosClientes,
        "pessoal" => $dadosPessoal
    ];

    // Envia o array estruturado direto para a view do Blade
    return view('dashboard', compact('dadosPython'));
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
