<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Por enquanto, como o banco está vazio, enviamos uma estrutura limpa para a tela não quebrar
        $dadosPython = [
            "marketing" => [
                "empresa" => "8ou80 Soluções Digitais",
                "roi" => 0.0,
                "leads" => 0,
                "custo_captacao" => 0.0
            ],
            "clientes" => [
                "valor_contrato" => 0.0,
                "faturamento_estimado_mensal" => 0.0,
                "status" => "Planejamento"
            ],
            "pessoal" => [
                "setembro" => ["entradas" => 0, "saidas" => 0, "saldo" => 0],
                "outubro"  => ["entradas" => 0, "saidas" => 0, "saldo" => 0],
                "novembro" => ["entradas" => 0, "saidas" => 0, "saldo" => 0]
            ]
        ];

        return view('dashboard', compact('dadosPython'));
    }
}
